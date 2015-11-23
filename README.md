# Global static wrapper for [React EventLoop](https://github.com/reactphp/event-loop)

This library allows use of [React EventLoop](https://github.com/reactphp/event-loop) statically and globally. Once you
get a reference to the event loop, it will automatically be started at the end of your script.

## Usage Example

Note, there is no need to call run() on the loop as it will run automatically at the conclusion of the script.
(You can still run it sooner if you would like, and it will no longer automatically run at the end.)

```php
\EventLoop\addPeriodicTimer(1, function () {
    echo "Hello\n";
});

\EventLoop\addTimer(5, function () {
    echo "Hello after 5 seconds\n";
});

// just get a reference for use in other places
$loop = \EventLoop\getLoop();

// you can also set the loop using
// if you call this more than once with a different loop instance,
// the library will throw an exception as there can only be one loop
// and setting it to a different loop would invalidate all previous "getLoop" calls
\EventLoop\setLoop($myLoop);
```
## Installation
```composer require voryx/event-loop```
