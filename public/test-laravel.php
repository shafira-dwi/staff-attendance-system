<?php

echo '<h1>ENV TEST</h1>';

echo '<p>SESSION_DRIVER: ';
var_dump(getenv('SESSION_DRIVER'));
echo '</p>';

echo '<p>CACHE_STORE: ';
var_dump(getenv('CACHE_STORE'));
echo '</p>';

echo '<p>QUEUE_CONNECTION: ';
var_dump(getenv('QUEUE_CONNECTION'));
echo '</p>';

echo '<p>APP_KEY exists: ';
var_dump(!empty(getenv('APP_KEY')));
echo '</p>';