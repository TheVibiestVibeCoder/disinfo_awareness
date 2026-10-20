<?php
declare(strict_types=1);

require __DIR__ . '/app/bootstrap.php';

$form = contact_form_handle();

render_page('kontakt', [
    'title'        => 'Kontakt – Disinfo Awareness',
    'description'  => 'Nehmen Sie Kontakt mit Disinfo Awareness auf. Wir freuen uns auf Ihre Fragen, Anregungen oder Kooperationsanfragen im Kampf gegen Desinformation.',
    'path'         => '/kontakt.php',
    'og_image_alt' => 'Kontaktieren Sie Disinfo Awareness',
], [
    'form' => $form,
]);
