<?php
declare(strict_types=1);

require __DIR__ . '/app/bootstrap.php';

render_page('impressum', [
    'title'        => 'Impressum – Disinfo Awareness',
    'description'  => 'Impressum und rechtliche Angaben von Disinfo Awareness gemäß §5 TMG.',
    'path'         => '/impressum.php',
    'robots'       => 'noindex, follow',
    'twitter_card' => 'summary',
    'stylesheet'   => 'legal',
]);
