<?php

namespace EventLoop\Tests\Unit;

use EventLoop\EventLoop;
use PHPUnit\Framework\TestCase;
use React\EventLoop\Factory;

class EventLoopTest extends TestCase
{
    private function resetStaticLoop() {
        $ref = new \ReflectionClass(EventLoop::class);
        $prop = $ref->getProperty('loop');
        $prop->setAccessible(true);
        $prop->setValue(null);
        $prop->setAccessible(false);
    }

    public function setup() : void {
        $this->resetStaticLoop();
    }

    public function testSetLoop()
    {
        $loop = Factory::create();

        \EventLoop\setLoop($loop);

        $this->assertSame($loop, \EventLoop\getLoop());
    }

    public function testSetLoopSameInstance()
    {
        $loop = \EventLoop\getLoop();

        \EventLoop\setLoop($loop);

        $this->assertSame($loop, \EventLoop\getLoop());
    }

    public function testGetLoopWithoutSet() {
        $loop = \EventLoop\getLoop();

        $this->assertSame($loop, \EventLoop\getLoop());
    }

    public function testSettingDifferentInstance() {
        $this->expectException(\Exception::class);
        \EventLoop\getLoop();

        \EventLoop\setLoop(Factory::create());
    }

    public function testGetLoopTwice() {
        $this->assertSame(\EventLoop\getLoop(), \EventLoop\getLoop());
    }
}
