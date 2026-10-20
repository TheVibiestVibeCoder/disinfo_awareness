<?php
/**
 * Contact page (kontakt.php).
 *
 * @var array{sent: bool, error: string, csrf_token: string} $form  State from contact_form_handle()
 */

view('partials/hero', [
    'variant' => 'contact',
    'eyebrow' => 'Wir freuen uns auf Sie',
    'title'   => 'Kontakt',
]);
?>

<section class="split contact">

    <div class="contact-info fade-in">
        <div class="contact-info__bg" style="background-image: url('https://images.unsplash.com/photo-1545285446-ff15b9e9b9b9?q=80&amp;w=1170&amp;auto=format&amp;fit=crop');" aria-hidden="true"></div>
        <div class="contact-info__content">
            <h3 class="contact-info__title">Lass uns sprechen</h3>
            <p>Egal ob Sie einen Workshop buchen möchten, Fragen zu unserer Forschung haben oder Partner werden wollen – wir sind erreichbar.</p>
            <div class="contact-details">
                <div class="contact-details__item">
                    <span class="contact-details__label">Standort</span>
                    <span class="contact-details__value">Wien, Österreich<br>(Termine nach Vereinbarung)</span>
                </div>
                <div class="contact-details__item">
                    <span class="contact-details__label">Social</span>
                    <div class="contact-details__links">
                        <a href="<?= e(config('social.linkedin')) ?>">LinkedIn</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-form fade-in delay-1">

        <?php if ($form['sent']): ?>
            <div class="alert alert--success" role="alert">
                <strong>Vielen Dank!</strong> Ihre Nachricht wurde erfolgreich gesendet. Wir melden uns in Kürze.
            </div>
        <?php endif; ?>

        <?php if ($form['error'] !== ''): ?>
            <div class="alert alert--error" role="alert">
                <strong>Fehler:</strong> <?= e($form['error']) ?>
            </div>
        <?php endif; ?>

        <form class="form" action="/kontakt.php" method="post" novalidate>
            <input type="hidden" name="csrf_token" value="<?= e($form['csrf_token']) ?>">

            <div class="form__honeypot" aria-hidden="true">
                <input type="text" name="<?= e(CONTACT_HONEYPOT_FIELD) ?>" tabindex="-1" autocomplete="off">
            </div>

            <div class="form__group">
                <label for="name" class="form__label">Name</label>
                <input type="text" id="name" name="name" class="form__control" required placeholder="Ihr Name" maxlength="120" autocomplete="name">
            </div>

            <div class="form__group">
                <label for="email" class="form__label">Email</label>
                <input type="email" id="email" name="email" class="form__control" required placeholder="ihre@email.com" maxlength="254" autocomplete="email">
            </div>

            <div class="form__group">
                <label for="subject" class="form__label">Betreff</label>
                <select id="subject" name="subject" class="form__control">
                    <?php foreach (config('contact.subjects') as $subject): ?>
                        <option value="<?= e($subject) ?>"><?= e($subject) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form__group">
                <label for="message" class="form__label">Nachricht</label>
                <textarea id="message" name="message" class="form__control" required placeholder="Wie können wir helfen?" maxlength="5000"></textarea>
            </div>

            <button type="submit" class="form__submit">Nachricht Senden</button>
        </form>
    </div>

</section>
