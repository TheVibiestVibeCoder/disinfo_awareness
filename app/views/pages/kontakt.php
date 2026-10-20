<?php
/**
 * Contact page (kontakt.php).
 * Links can preselect the subject, e.g. /kontakt.php?betreff=workshop (keys: contact_subjects()).
 *
 * @var array{sent: bool, error: string, csrf_token: string, values: array{name: string, email: string, subject: string, message: string}} $form
 *      State from contact_form_handle()
 */

$values = $form['values'];

view('partials/hero', [
    'variant' => 'compact',
    'eyebrow' => 'Wir freuen uns auf Sie',
    'title'   => 'Kontakt',
]);
?>

<section class="section section--flush-top">
    <div class="container contact">

        <div class="contact__intro fade-in">
            <h2 class="contact__title">Lass uns sprechen</h2>
            <p class="contact__text">Egal ob Sie einen Workshop buchen möchten, Fragen zu unserer Forschung haben oder Partner werden wollen – wir sind erreichbar.</p>
        </div>

        <div class="contact__card fade-in delay-1" id="formular">
            <?php if ($form['sent']): ?>
                <div class="alert alert--success" role="alert">
                    <?= icon('check') ?>
                    <p><strong>Vielen Dank!</strong> Ihre Nachricht wurde erfolgreich gesendet. Wir melden uns in Kürze.</p>
                </div>
            <?php endif; ?>

            <?php if ($form['error'] !== ''): ?>
                <div class="alert alert--error" role="alert">
                    <p><strong>Fehler:</strong> <?= e($form['error']) ?></p>
                </div>
            <?php endif; ?>

            <form class="form" action="/kontakt.php#formular" method="post" novalidate>
                <input type="hidden" name="csrf_token" value="<?= e($form['csrf_token']) ?>">

                <div class="form__honeypot" aria-hidden="true">
                    <input type="text" name="<?= e(CONTACT_HONEYPOT_FIELD) ?>" tabindex="-1" autocomplete="off">
                </div>

                <fieldset class="chips">
                    <legend class="field__label">Betreff</legend>
                    <div class="chips__list">
                        <?php foreach (contact_subjects() as $key => $subject): ?>
                            <label class="chip">
                                <input type="radio" name="subject" value="<?= e($key) ?>" <?= $key === $values['subject'] ? 'checked' : '' ?>>
                                <span class="chip__text"><?= e($subject) ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </fieldset>

                <div class="form__row">
                    <div class="field">
                        <label for="name" class="field__label">Name</label>
                        <input type="text" id="name" name="name" class="field__control" required placeholder="Ihr Name" maxlength="120" autocomplete="name" value="<?= e($values['name']) ?>">
                    </div>

                    <div class="field">
                        <label for="email" class="field__label">E-Mail</label>
                        <input type="email" id="email" name="email" class="field__control" required placeholder="ihre@email.com" maxlength="254" autocomplete="email" value="<?= e($values['email']) ?>">
                    </div>
                </div>

                <div class="field">
                    <label for="message" class="field__label">Nachricht</label>
                    <textarea id="message" name="message" class="field__control" required placeholder="Wie können wir helfen?" maxlength="5000"><?= e($values['message']) ?></textarea>
                </div>

                <button type="submit" class="btn btn--primary btn--lg btn--block">Nachricht senden <?= icon('arrow-right') ?></button>
            </form>
        </div>

        <dl class="contact__details fade-in delay-2">
            <div class="contact__detail">
                <dt class="label">Standort</dt>
                <dd>Wien, Österreich<br>(Termine nach Vereinbarung)</dd>
            </div>
            <div class="contact__detail">
                <dt class="label">Social</dt>
                <dd><a href="<?= e(config('social.linkedin')) ?>" class="text-link" rel="noopener">LinkedIn <?= icon('arrow-up-right') ?></a></dd>
            </div>
        </dl>

    </div>
</section>
