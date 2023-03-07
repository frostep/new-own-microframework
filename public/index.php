<?php

declare(strict_types=1);

$name = $_GET['name'] ?? 'Guest';

// header('X-Developer: frostell');

echo 'Hello!'.$name;
