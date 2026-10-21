/**
 * Site-wide UI behaviour. Each feature only runs if its markup is on the page,
 * and the page stays fully usable without JavaScript.
 *
 * JavaScript hooks (kept separate from styling classes):
 *   .fade-in             reveal on scroll                → adds .is-visible
 *   [data-site-header]   sticky header                   → toggles .is-scrolled
 *   [data-nav-menu]      "Projekte" dropdown             → toggles aria-expanded on its button
 *   [data-mobile-menu]   menu dialog, opened by [data-menu-open], closed by [data-menu-close]
 *   [data-team-gallery]  capsule gallery                 → moves .is-active between [data-member]
 *   [data-carousel]      swipeable row                   → adds a .pager of dots after it
 *   [data-parallax]      drifts while scrolling          → sets --parallax (0 … 1)
 *   [data-copy="id"]     copies the text of #id          → adds .is-copied briefly
 */

const DESKTOP_QUERY = window.matchMedia('(min-width: 900px)');
const REDUCED_MOTION = window.matchMedia('(prefers-reduced-motion: reduce)');

function initReveal() {
    const elements = document.querySelectorAll('.fade-in');
    if (!('IntersectionObserver' in window)) {
        elements.forEach((el) => el.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -5% 0px' });

    elements.forEach((el) => observer.observe(el));
}

/** A hairline under the header once the page has scrolled. */
function initHeader() {
    const header = document.querySelector('[data-site-header]');
    if (!header) return;

    const update = () => header.classList.toggle('is-scrolled', window.scrollY > 8);
    window.addEventListener('scroll', update, { passive: true });
    update();
}

/** "Projekte" dropdown: hover opens it (CSS); click, Enter and Escape are handled here. */
function initNavMenu() {
    document.querySelectorAll('[data-nav-menu]').forEach((item) => {
        const button = item.querySelector('button[aria-expanded]');
        const setOpen = (open) => button.setAttribute('aria-expanded', String(open));

        button.addEventListener('click', () => setOpen(button.getAttribute('aria-expanded') !== 'true'));

        item.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && button.getAttribute('aria-expanded') === 'true') {
                setOpen(false);
                button.focus();
            }
        });

        // Close when focus or a click leaves the item.
        item.addEventListener('focusout', (event) => {
            if (!item.contains(event.relatedTarget)) setOpen(false);
        });
        document.addEventListener('click', (event) => {
            if (!item.contains(event.target)) setOpen(false);
        });
    });
}

/** Full-screen menu on small screens, built on <dialog> (focus trap and Escape for free). */
function initMobileMenu() {
    const dialog = document.querySelector('[data-mobile-menu]');
    const openButton = document.querySelector('[data-menu-open]');
    if (!dialog || !openButton || typeof dialog.showModal !== 'function') return;

    openButton.addEventListener('click', () => dialog.showModal());
    dialog.querySelectorAll('[data-menu-close]').forEach((button) => {
        button.addEventListener('click', () => dialog.close());
    });

    // Links to sections of the current page (e.g. /#team) must close the menu themselves.
    dialog.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => dialog.close());
    });

    // The menu belongs to small screens only.
    DESKTOP_QUERY.addEventListener('change', (event) => {
        if (event.matches && dialog.open) dialog.close();
    });
}

/**
 * Team gallery: on wide screens one capsule is open at a time. Hover, keyboard
 * focus and tap open a capsule; it stays open until another one takes over.
 */
function initTeamGallery() {
    document.querySelectorAll('[data-team-gallery]').forEach((gallery) => {
        const members = [...gallery.querySelectorAll('[data-member]')];

        const activate = (member) => {
            members.forEach((other) => other.classList.toggle('is-active', other === member));
        };

        members.forEach((member) => {
            member.addEventListener('mouseenter', () => activate(member));
            member.addEventListener('focusin', () => activate(member));
            member.addEventListener('click', () => activate(member));
        });
    });
}

/**
 * Swipeable rows: dots below the row show that more cards follow and which one
 * is in view; a tap scrolls to that card. They only appear while the row is
 * wider than its box (on wide screens the same rows are grids). The dots are a
 * visual aid, so screen readers and the Tab key skip them: the cards themselves
 * are reachable either way.
 */
function initCarousels() {
    document.querySelectorAll('[data-carousel]').forEach((list) => {
        const items = [...list.children];
        if (items.length < 2) return;

        const pager = document.createElement('div');
        pager.className = 'pager';
        pager.setAttribute('aria-hidden', 'true');

        const dots = items.map((item) => {
            const dot = document.createElement('button');
            dot.type = 'button';
            dot.className = 'pager__dot';
            dot.tabIndex = -1;
            dot.addEventListener('click', () => {
                item.scrollIntoView({ behavior: REDUCED_MOTION.matches ? 'auto' : 'smooth', block: 'nearest', inline: 'start' });
            });
            pager.append(dot);
            return dot;
        });
        list.after(pager);

        // The card closest to the start of the row is the current one; at the
        // very end of the row it is the last card, which can't scroll further.
        let frame = 0;
        const update = () => {
            frame = 0;
            const atEnd = list.scrollLeft + list.clientWidth >= list.scrollWidth - 2;
            const step = items[1].offsetLeft - items[0].offsetLeft;
            const current = atEnd ? items.length - 1 : Math.round(list.scrollLeft / step);
            dots.forEach((dot, i) => dot.classList.toggle('is-active', i === current));
        };

        list.addEventListener('scroll', () => {
            if (!frame) frame = requestAnimationFrame(update);
        }, { passive: true });

        new ResizeObserver(() => {
            pager.hidden = list.scrollWidth <= list.clientWidth + 1;
            update();
        }).observe(list);
    });
}

/**
 * Parallax for elements at the top of the page: --parallax runs from 0 (page
 * not scrolled) to 1 (element scrolled out of view); the stylesheet decides
 * what moves with it. Nothing moves with reduced motion.
 */
function initParallax() {
    const elements = [...document.querySelectorAll('[data-parallax]')];
    if (!elements.length || REDUCED_MOTION.matches) return;

    // Where each element ends on the page, measured once per layout change.
    let ends = [];
    const measure = () => {
        ends = elements.map((el) => el.getBoundingClientRect().bottom + window.scrollY);
    };

    let frame = 0;
    const update = () => {
        frame = 0;
        elements.forEach((el, i) => {
            const progress = Math.min(Math.max(window.scrollY / ends[i], 0), 1);
            el.style.setProperty('--parallax', progress.toFixed(4));
        });
    };
    const request = () => {
        if (!frame) frame = requestAnimationFrame(update);
    };

    window.addEventListener('scroll', request, { passive: true });
    new ResizeObserver(() => {
        measure();
        request();
    }).observe(document.body);
}

function initCopyButtons() {
    document.querySelectorAll('[data-copy]').forEach((button) => {
        const label = button.querySelector('[data-copy-label]') ?? button;
        const text = label.textContent;
        let timer;

        button.addEventListener('click', async () => {
            const source = document.getElementById(button.dataset.copy);
            if (!source) return;

            try {
                await navigator.clipboard.writeText(source.textContent.trim());
            } catch {
                return; // Clipboard blocked (e.g. insecure context): leave the button as is.
            }

            label.textContent = 'Kopiert ✓';
            button.classList.add('is-copied');
            clearTimeout(timer);
            timer = setTimeout(() => {
                label.textContent = text;
                button.classList.remove('is-copied');
            }, 2000);
        });
    });
}

initReveal();
initHeader();
initNavMenu();
initMobileMenu();
initTeamGallery();
initCarousels();
initParallax();
initCopyButtons();
