<?php

namespace EventLoop;

use React\EventLoop\LoopInterface;
use React\EventLoop\Timer\TimerInterface;

/**
 * @param LoopInterface $loop
 * @throws \Exception
 */
function setLoop(LoopInterface $loop) {
    EventLoop::setLoop($loop);
}

/**
 * @return \React\EventLoop\LibEventLoop
 */
function getLoop() {
    return EventLoop::getLoop();
}

/**
 * Enqueue a callback to be invoked once after the given interval.
 *
 * The execution order of timers scheduled to execute at the same time is
 * not guaranteed.
 *
 * @param int|float $interval The number of seconds to wait before execution.
 * @param callable  $callback The callback to invoke.
 *
 * @return TimerInterface
 */
function addTimer($interval, callable $callback) {
    return getLoop()->addTimer($interval, $callback);
}

/**
 * Enqueue a callback to be invoked repeatedly after the given interval.
 *
 * The execution order of timers scheduled to execute at the same time is
 * not guaranteed.
 *
 * @param int|float $interval The number of seconds to wait before execution.
 * @param callable  $callback The callback to invoke.
 *
 * @return TimerInterface
 */
function addPeriodicTimer($interval, callable $callback) {
    return getLoop()->addPeriodicTimer($interval, $callback);
}

/**
 * Cancel a pending timer.
 *
 * @param TimerInterface $timer The timer to cancel.
 */
function cancelTimer(TimerInterface $timer) {
    getLoop()->cancelTimer($timer);
}
