<?php

if (class_exists('\Rx\Scheduler\EventLoopScheduler') && class_exists('\Rx\Scheduler')) {
    \Rx\Scheduler::setDefaultFactory(function () {
        return new \Rx\Scheduler\EventLoopScheduler(\EventLoop\getLoop());
    });
}
