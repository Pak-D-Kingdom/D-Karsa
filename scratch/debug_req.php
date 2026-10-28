<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Http\Request;
use App\Http\Controllers\InvitationController;

$controller = new InvitationController();

$params = [
    'groom_name' => 'PT Sinarmas Digital Tech',
    'event_heading' => 'GRAND LAUNCHING & ANNUAL PARTNER SUMMIT 2027',
    'events_json' => json_encode([
        [
            'title' => 'Executive Coffee & Networking',
            'venue_name' => 'Foyer Mezzanine',
        ]
    ]),
    'to' => 'Dr. Bambang Sulistyo'
];

$req = Request::create('/demo/formal-corporate?' . http_build_query($params), 'GET');
echo "req->query('event_heading'): " . var_export($req->query('event_heading'), true) . "\n";
echo "req->filled('events_json'): " . var_export($req->filled('events_json'), true) . "\n";
echo "raw events_json: " . var_export($req->query('events_json'), true) . "\n";

$res = $controller->demoTemplate($req, 'formal-corporate');
$html = $res->render();

echo "contains groom_name? " . var_export(str_contains($html, 'PT Sinarmas Digital Tech'), true) . "\n";
echo "contains event_heading? " . var_export(str_contains($html, 'GRAND LAUNCHING & ANNUAL PARTNER SUMMIT 2027'), true) . "\n";
echo "contains Executive Coffee? " . var_export(str_contains($html, 'Executive Coffee & Networking'), true) . "\n";
echo "contains Bambang? " . var_export(str_contains($html, 'Dr. Bambang Sulistyo'), true) . "\n";

if (!str_contains($html, 'Executive Coffee & Networking')) {
    // Print around itinerary in html
    $pos = strpos($html, 'itineraryContainer');
    echo "\nSnippet around itineraryContainer:\n";
    echo substr($html, $pos, 600) . "\n";
}

if (!str_contains($html, 'GRAND LAUNCHING & ANNUAL PARTNER SUMMIT 2027')) {
    $pos = strpos($html, 'previewHeadingCover');
    echo "\nSnippet around previewHeadingCover:\n";
    echo substr($html, $pos, 250) . "\n";
}
