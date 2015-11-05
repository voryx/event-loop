<?php


namespace EventLoop;


use React\EventLoop\Factory;
use React\EventLoop\LibEventLoop;
use React\EventLoop\Timer\Timer;

class EventLoop
{
    /** @var LibEventLoop */
    static private $loop;

    static public function getLoop() {
        if (static::$loop) {
            return static::$loop;
        }

        static::$loop = Factory::create();

        $hasBeenRun = false;

        register_shutdown_function(function () use (&$hasBeenRun) {
            if (!$hasBeenRun) {
                EventLoop::getLoop()->run();
            }
        });

        static::$loop->nextTick(function () use (&$hasBeenRun) {
            $hasBeenRun = true;
        });

        return static::$loop;
    }
}
