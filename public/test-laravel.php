<?php

try {
    require __DIR__ . '/../vendor/autoload.php';

    echo "autoload-ok<br>";

    $app = require_once __DIR__ . '/../bootstrap/app.php';

    echo "bootstrap-ok<br>";
} catch (Throwable $e) {
    http_response_code(500);

    echo "<h1>Laravel Error</h1>";
    echo "<p><strong>Class:</strong> " . htmlspecialchars(get_class($e)) . "</p>";
    echo "<p><strong>Message:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><strong>File:</strong> " . htmlspecialchars($e->getFile()) . "</p>";
    echo "<p><strong>Line:</strong> " . $e->getLine() . "</p>";
}