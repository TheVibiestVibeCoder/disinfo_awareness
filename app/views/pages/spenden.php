<?php
/**
 * Donation page (spenden.php). Bank details come from config('bank').
 * The card shows everything at once: bank details with copy buttons (first on phones,
 * where scanning one's own screen is impossible) and the QR code (left on wide screens).
 */

$bank = config('bank');

// 'copy' = element id the copy button reads from (main.js → initCopyButtons)
$bankFields = [
    ['label' => 'Kontoinhaber',     'value' => $bank['holder']],
    ['label' => 'IBAN',             'value' => $bank['iban'],      'copy' => 'iban'],
    ['label' => 'BIC',              'value' => $bank['bic'],       'copy' => 'bic'],
    ['label' => 'Verwendungszweck', 'value' => $bank['reference'], 'copy' => 'zweck'],
];
?>

<section class="donate-stage" aria-labelledby="donate-title">
    <div class="container">
        <div class="donate-stage__inner" style="--photo: url('<?= e(asset('img/hintergrund/blur-gruppe.webp')) ?>')">
            <header class="donate-stage__head">
                <p class="label label--on-dark">Direkt &amp; unkompliziert</p>
                <h1 class="donate-stage__title" id="donate-title">Jetzt <span class="accent">Spenden</span></h1>
                <p class="donate-stage__lead">Jede Überweisung hilft uns, unabhängig gegen Desinformation aufzuklären.</p>
            </header>

            <div class="donate-card">
                <div class="donate-card__bank">
                    <h2 class="donate-card__heading">Bankverbindung</h2>
                    <dl class="bank-fields">
                        <?php foreach ($bankFields as $field): ?>
                            <div class="bank-field">
                                <dt class="bank-field__label"><?= e($field['label']) ?></dt>
                                <dd class="bank-field__value" <?= isset($field['copy']) ? 'id="' . e($field['copy']) . '"' : '' ?>><?= e($field['value']) ?></dd>
                                <?php if (isset($field['copy'])): ?>
                                    <dd class="bank-field__action">
                                        <button type="button" class="copy-btn" data-copy="<?= e($field['copy']) ?>">
                                            <span class="visually-hidden"><?= e($field['label']) ?>:</span>
                                            <span data-copy-label aria-live="polite">Kopieren</span>
                                        </button>
                                    </dd>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </dl>
                </div>

                <div class="donate-card__qr">
                    <h2 class="donate-card__heading">Per QR-Code</h2>
                    <img src="<?= e(asset($bank['qr_image'])) ?>" alt="QR-Code für eine Banküberweisung an <?= e($bank['holder']) ?>" class="donate-card__qr-image" width="480" height="480">
                    <p class="donate-card__hint">Scanne den Code direkt mit deiner Banking-App</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section donate-why" aria-labelledby="donate-why-title">
    <div class="container donate-why__inner fade-in">
        <h2 class="donate-why__title" id="donate-why-title"><?= accent('Warum Ihre Spende zählt', 'zählt') ?></h2>
        <p class="donate-why__text">Desinformation unterhöhlt leise Vertrauen und macht Fakten verhandelbar. Als gemeinnütziger Verein ohne staatliche Kernfinanzierung halten uns Spenden wie Ihre unabhängig und handlungsfähig. <strong>Jede Überweisung ist ein direktes Bekenntnis zur Demokratie.</strong></p>
    </div>
</section>
