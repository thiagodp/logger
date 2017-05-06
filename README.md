# Logger

A very simple logger for PHP. No magic configuration required. Just the basic features you need most.

Provided interfaces and classes:

* [phputil\Logger](https://github.com/thiagodp/logger/blob/master/lib/Logger.php) interface
* [phputil\BaseLogger](https://github.com/thiagodp/logger/blob/master/lib/BaseLogger.php) abstract class
* [phputil\TextFileLogger](https://github.com/thiagodp/logger/blob/master/lib/TextFileLogger.php) class
* [phputil\FakeLogger](https://github.com/thiagodp/logger/blob/master/lib/FakeLogger.php) class (v1.1+)
* [phputil\EchoLogger](https://github.com/thiagodp/logger/blob/master/lib/EchoLogger.php) class (v1.3+)

Available log methods:

* `bool debug( string $message, Exception $e = null, array $context = array() );`
* `bool info( string $message, Exception $e = null, array $context = array() );`
* `bool warn( string $message, Exception $e = null, array $context = array() );`
* `bool error( string $message, Exception $e = null, array $context = array() );`
* `bool log( string $logType, string $message, Exception $e = null, array $context = array() );`

### Installation

```command
composer require phputil/logger
```

### Example 1

```php
<?php
require_once 'vendor/autoload.php'; // composer

use phputil\TextFileLogger;

// It is recommended to set the DateTimeZone when using TextFileLogger.
$logger = new TextFileLogger( 'log.txt', false, new \DateTimeZone( 'America/Sao_Paulo' ) );

$logger->info( 'Something will happen' );
$logger->debug( 'Something happened.' );
$logger->warn( 'Wait!' );
$logger->error( 'Ouch.' );

$logger->log( Logger::DEBUG, "That's awesome!" );
?>
```

### Example 2

```php
<?php
require_once 'vendor/autoload.php'; // composer

use phputil\Logger;
use phputil\TextFileLogger;
use phputil\FakeLogger;

$inDebugMode = true;

$logger = $inDebugMode
	? new TextFileLogger( 'log.txt', false, new \DateTimeZone( 'America/Sao_Paulo' ) )
	: new FakeLogger();

$logger->info( 'Something will happen' );
try {
	throw new \Exception( 'Hummm... something bad happened.' );
} catch ( \Exception $e ) {
	// Logs message and trace
	$logger->error( 'Ouch, I did not expect that!', $e );
}

$logger->log( Logger::DEBUG, "That's awesome!" );
?>
```

### Example 3

```php
<?php
require_once 'vendor/autoload.php'; // composer

use phputil\EchoLogger;

$logger = new EchoLogger();
$logger->info( 'It can log to the console too!' );
?>
```