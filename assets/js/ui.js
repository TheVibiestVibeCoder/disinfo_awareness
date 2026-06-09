document.addEventListener('DOMContentLoaded', () => {

    // Fade-in on scroll
    const fadeObserver = new IntersectionObserver(entries => {
        entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
    }, { threshold: 0.1 });
    document.querySelectorAll('.fade-in').forEach(el => fadeObserver.observe(el));

    // Mobile card in-view highlight
    if (window.innerWidth < 900) {
        const cardObserver = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting) e.target.classList.add('is-in-view');
                else e.target.classList.remove('is-in-view');
            });
        }, { threshold: 0.5, rootMargin: '-10% 0px -10% 0px' });
        document.querySelectorAll('.card-item, .funding-section').forEach(el => cardObserver.observe(el));
    }

    // Team card accordion expand (index page only)
    const teamCards = document.querySelectorAll('.team-card');
    teamCards.forEach(card => {
        card.querySelectorAll('.trigger-expand').forEach(trigger => {
            trigger.addEventListener('click', e => {
                e.stopPropagation();
                teamCards.forEach(c => { if (c !== card) c.classList.remove('expanded'); });
                card.classList.toggle('expanded');
            });
        });
        card.addEventListener('keydown', e => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                card.classList.toggle('expanded');
            }
        });
    });

    // Copy-to-clipboard buttons (spenden page only)
    document.querySelectorAll('.copy-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const val = document.getElementById(btn.dataset.copy)?.textContent.trim() ?? '';
            navigator.clipboard.writeText(val).then(() => {
                btn.textContent = 'Kopiert ✓';
                btn.classList.add('copied');
                setTimeout(() => { btn.textContent = 'Kopieren'; btn.classList.remove('copied'); }, 2000);
            });
        });
    });

});
