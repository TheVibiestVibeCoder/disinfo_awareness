<?php
/**
 * Team member as a capsule of the team gallery (behaviour: initTeamGallery() in main.js).
 * Small screens: a swipeable card with everything visible.
 * Wide screens: a narrow capsule that opens up when hovered, focused or tapped.
 *
 * @var array $member  Entry from app/data/team.php
 * @var bool  $active  Whether the capsule starts open
 */
?>
<li class="<?= e(class_names('member', $active ? 'is-active' : null)) ?>" tabindex="0" data-member>
    <?= image($member['image'], '', '(min-width: 1200px) 40rem, 22rem', ['class' => 'member__photo']) ?>
    <div class="member__info">
        <h3 class="member__name"><?= e($member['name']) ?></h3>
        <p class="member__role"><?= e(implode(' ', $member['role'])) ?></p>
        <p class="member__bio"><?= e($member['bio']) ?></p>
        <?php if (!empty($member['linkedin'])): ?>
            <a href="<?= e($member['linkedin']) ?>" class="member__link" rel="noopener">
                LinkedIn <?= icon('arrow-up-right') ?>
                <span class="visually-hidden">– Profil von <?= e($member['name']) ?></span>
            </a>
        <?php endif; ?>
    </div>
</li>
