<?php
/**
 * Donation page (spenden.php). Bank details come from config('bank').
 */

$bank = config('bank');

// 'copy' = element id the copy button reads from (main.js → initCopyButtons)
$bankFields = [
    ['label' => 'Kontoinhaber',     'value' => $bank['holder']],
    ['label' => 'IBAN',             'value' => $bank['iban'],      'copy' => 'iban'],
    ['label' => 'BIC',              'value' => $bank['bic'],       'copy' => 'bic'],
    ['label' => 'Verwendungszweck', 'value' => $bank['reference'], 'copy' => 'zweck'],
];

view('partials/hero', [
    'eyebrow' => 'Direkt & unkompliziert',
    'title'   => ['Jetzt', 'Spenden'],
    'lead'    => 'Jede Überweisung hilft uns, unabhängig gegen Desinformation aufzuklären.',
]);
?>

<section class="donate-intro fade-in">
    <div class="donate-intro__inner">
        <h2 class="donate-intro__title">Warum Ihre Spende zählt</h2>
        <p>Desinformation unterhöhlt leise Vertrauen und macht Fakten verhandelbar. Als gemeinnütziger Verein ohne staatliche Kernfinanzierung halten uns Spenden wie Ihre unabhängig und handlungsfähig. <strong>Jede Überweisung ist ein direktes Bekenntnis zur Demokratie.</strong></p>
    </div>
</section>

<section class="donate">
    <div class="donate__grid">

        <div class="donate-qr fade-in">
            <span class="donate__label">Per QR-Code</span>
            <img src="<?= e($bank['qr_image']) ?>" alt="QR-Code für Banküberweisung an <?= e($bank['holder']) ?>" class="donate-qr__image">
            <p class="donate-qr__hint">Scanne den Code direkt mit deiner Banking-App</p>
        </div>

        <div class="donate-bank fade-in delay-1">
            <div>
                <span class="donate__label">Bankverbindung</span>
                <h2 class="donate-bank__title">Überweisen</h2>
            </div>
            <div class="bank-fields">
                <?php foreach ($bankFields as $field): ?>
                    <div class="bank-field">
                        <span class="bank-field__label"><?= e($field['label']) ?></span>
                        <div class="bank-field__row">
                            <?php if (isset($field['copy'])): ?>
                                <span class="bank-field__value" id="<?= e($field['copy']) ?>"><?= e($field['value']) ?></span>
                                <button type="button" class="copy-btn" data-copy="<?= e($field['copy']) ?>" aria-label="<?= e($field['label']) ?> kopieren">Kopieren</button>
                            <?php else: ?>
                                <span class="bank-field__value"><?= e($field['value']) ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>
