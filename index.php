<?php
declare(strict_types=1);

require __DIR__ . '/app/bootstrap.php';

render_page('home', [
    'title'       => 'Disinfo Awareness – Gegen Desinformation im ländlichen Raum',
    'description' => 'Disinfo Awareness bekämpft Desinformation in ländlichen Regionen durch Aufklärung, innovative Strategien und nachhaltige Bildungsprojekte. Jetzt mehr erfahren!',
    'path'        => '/',
    'schema'      => schema_organization(),
], [
    'projects' => data('projects'),
    'team'     => data('team'),
    'event'    => upcoming_event(),
]);
