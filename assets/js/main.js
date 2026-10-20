/**
 * Site-wide UI behaviour. Each feature only runs if its markup is on the page.
 *
 * JavaScript hooks (kept separate from styling classes):
 *   .fade-in            reveal on scroll        → adds .is-visible
 *   [data-inview]       highlight on mobile     → toggles .is-in-view
 *   [data-team-card]    expandable team card    → toggles .is-expanded
 *   [data-team-toggle]  click target inside a team card
 *   [data-copy="id"]    copies the text of #id  → adds .is-copied briefly
 */

const DESKTOP_BREAKPOINT = 900;

function initReveal() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.fade-in').forEach((el) => observer.observe(el));
}

/** On touch-sized screens there is no hover, so image cards light up while centred instead. */
function initInViewHighlight() {
    if (window.innerWidth >= DESKTOP_BREAKPOINT) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => entry.target.classList.toggle('is-in-view', entry.isIntersecting));
    }, { threshold: 0.5, rootMargin: '-10% 0px -10% 0px' });

    document.querySelectorAll('[data-inview]').forEach((el) => observer.observe(el));
}

/** Team cards: one open at a time, operable by click or Enter/Space. */
function initTeamCards() {
    const cards = [...document.querySelectorAll('[data-team-card]')];

    const toggle = (card) => {
        cards.forEach((other) => {
            if (other !== card) other.classList.remove('is-expanded');
        });
        card.classList.toggle('is-expanded');
    };

    cards.forEach((card) => {
        card.querySelectorAll('[data-team-toggle]').forEach((trigger) => {
            trigger.addEventListener('click', () => toggle(card));
        });

        card.addEventListener('keydown', (event) => {
            // Only when the card itself has focus, so links inside still work.
            if (event.target !== card || (event.key !== 'Enter' && event.key !== ' ')) return;
            event.preventDefault();
            toggle(card);
        });
    });
}

function initCopyButtons() {
    document.querySelectorAll('[data-copy]').forEach((button) => {
        const label = button.textContent;

        button.addEventListener('click', async () => {
            const source = document.getElementById(button.dataset.copy);
            if (!source) return;

            try {
                await navigator.clipboard.writeText(source.textContent.trim());
            } catch {
                return; // Clipboard blocked (e.g. insecure context): leave the button as is.
            }

            button.textContent = 'Kopiert ✓';
            button.classList.add('is-copied');
            setTimeout(() => {
                button.textContent = label;
                button.classList.remove('is-copied');
            }, 2000);
        });
    });
}

initReveal();
initInViewHighlight();
initTeamCards();
initCopyButtons();
