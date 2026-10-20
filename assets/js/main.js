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
 *   [data-copy="id"]     copies the text of #id          → adds .is-copied briefly
 */

const DESKTOP_QUERY = window.matchMedia('(min-width: 900px)');

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
initCopyButtons();
