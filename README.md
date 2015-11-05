# Global static wrapper for [React EventLoop](https://github.com/reactphp/event-loop)

This library allows use of [React EventLoop](https://github.com/reactphp/event-loop) statically and globally. Once you
get a reference to the event loop, it will automatically be started at the end of your script.

## Usage Example
```php
\EventLoop\addPeriodicTimer(1, function () {
    echo "Hello\n";
});

\EventLoop\addTimer(5, function () {
    echo "Hello after 5 seconds\n";
});
```
## Installation
```composer require eventloop/eventloop```
