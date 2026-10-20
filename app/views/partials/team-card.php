<?php
/**
 * Expandable team member card (behaviour: initTeamCards() in main.js).
 *
 * @var array $member  Entry from app/data/team.php
 * @var int   $delay   Reveal stagger step (0–4)
 */
?>
<article class="team-card <?= fade_in($delay) ?>" tabindex="0" data-team-card>
    <div class="team-card__media" data-team-toggle>
        <img src="<?= e($member['image']) ?>" alt="<?= e($member['name']) ?>" class="team-card__img" loading="lazy" decoding="async">
    </div>
    <div class="team-card__info" data-team-toggle>
        <div class="team-card__toggle">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M12 5v14M5 12h14"/></svg>
        </div>
        <h3 class="team-card__name"><?= e($member['name']) ?></h3>
        <span class="team-card__role"><?= lines($member['role']) ?></span>
    </div>
    <div class="team-card__bio">
        <div class="team-card__bio-inner">
            <p><?= e($member['bio']) ?></p>
            <?php if (!empty($member['linkedin'])): ?>
                <div class="team-card__links">
                    <a href="<?= e($member['linkedin']) ?>" class="team-card__link" aria-label="LinkedIn Profil von <?= e($member['name']) ?>">LinkedIn</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</article>
