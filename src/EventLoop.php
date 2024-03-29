<?php

namespace EventLoop;

use React\EventLoop\Factory;
use React\EventLoop\Loop;
use React\EventLoop\LoopInterface;

class EventLoop
{
    /** @var LoopInterface */
    static private $loop;

    static public function setLoop(LoopInterface $loop) {
        if (static::$loop === null) {
            static::$loop = $loop;
        }

        if (static::$loop !== $loop) {
            throw new \Exception("Two different loop instances created. Something is not right.");
        }

        static::registerLoopRunner();
    }

    static public function getLoop() {
        if (static::$loop) {
            return static::$loop;
        }

        static::$loop = class_exists('React\EventLoop\Loop') ? Loop::get() : Factory::create();

        static::registerLoopRunner();

        return static::$loop;
    }

    static private function registerLoopRunner() {
        $hasBeenRun = false;

        register_shutdown_function(function () use (&$hasBeenRun) {
            if (!$hasBeenRun) {
                EventLoop::getLoop()->run();
            }
        });

        static::$loop->futureTick(function () use (&$hasBeenRun) {
            $hasBeenRun = true;
        });
    }
}
