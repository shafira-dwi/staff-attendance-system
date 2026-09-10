<?php

try {
    require __DIR__ . '/../vendor/autoload.php';

    $app = require_once __DIR__ . '/../bootstrap/app.php';

    $request = Illuminate\Http\Request::create('/login', 'GET');

    $response = $app->handleRequest($request);

    echo "<h1>Laravel HTTP OK</h1>";
    echo "<p>Status: " . $response->getStatusCode() . "</p>";
    echo "<pre>";
    echo htmlspecialchars($response->getContent());
    echo "</pre>";

} catch (Throwable $e) {
    http_response_code(500);

    echo "<h1>Laravel HTTP Error</h1>";
    echo "<p><strong>Class:</strong> " . htmlspecialchars(get_class($e)) . "</p>";
    echo "<p><strong>Message:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><strong>File:</strong> " . htmlspecialchars($e->getFile()) . "</p>";
    echo "<p><strong>Line:</strong> " . $e->getLine() . "</p>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}