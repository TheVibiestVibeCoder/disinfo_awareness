<?php
declare(strict_types=1);

require __DIR__ . '/app/bootstrap.php';

render_page('spenden', [
    'title'       => 'Jetzt Spenden – Disinfo Awareness',
    'description' => 'Unterstütze Disinfo Awareness mit einer Banküberweisung. Gemeinsam für eine informierte Gesellschaft.',
    'path'        => '/spenden.php',
]);
