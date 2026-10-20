<?php
declare(strict_types=1);

require __DIR__ . '/app/bootstrap.php';

render_page('datenschutz', [
    'title'        => 'Datenschutzerklärung – Disinfo Awareness',
    'description'  => 'Datenschutzerklärung von Disinfo Awareness: Informationen zur Verarbeitung personenbezogener Daten gemäß DSGVO.',
    'path'         => '/datenschutz.php',
    'robots'       => 'noindex, follow',
    'twitter_card' => 'summary',
    'stylesheet'   => 'legal',
]);
