<?php

$files = [
    __DIR__ . '/../vendor/autoload.php',
    __DIR__ . '/../../vendor/autoload.php',
    __DIR__ . '/../../../vendor/autoload.php',
    __DIR__ . '/../../../../vendor/autoload.php',

];

foreach ($files as $file) {
    if (file_exists($file)) {
        $loader = require_once $file;
        $loader->addPsr4('EventLoop\\Tests\\', __DIR__);
        break;
    }
}