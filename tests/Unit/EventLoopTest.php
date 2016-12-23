<?php

namespace EventLoop\Tests\Unit;

use EventLoop\Tests\TestCase;
use Interop\Async\Loop;

class EventLoopTest extends TestCase
{
    public function testAutoStart()
    {
        Loop::defer(function () {
            $this->assertTrue(true);
        });
    }

    public function testDefer()
    {
        $started = false;
        Loop::defer(function () use (&$started) {
            $started = true;
        });

        Loop::get()->run();

        $this->assertTrue($started);
    }
}
