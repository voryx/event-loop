<?php

use Interop\Async\Loop;
use WyriHaximus\React\AsyncInteropLoop\ReactDriverFactory;

Loop::setFactory(ReactDriverFactory::createFactory());

register_shutdown_function(function () {
    Loop::execute(function () {}, Loop::get());
});