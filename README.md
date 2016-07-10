# Logger

A very simple logger for PHP. No magic configuration required. Just the basic features you need most.

Provided interfaces and classes:

* [phputil\Logger](https://github.com/thiagodp/logger/blob/master/lib/Logger.php) interface
* [phputil\BaseLogger](https://github.com/thiagodp/logger/blob/master/lib/BaseLogger.php) abstract class
* [phputil\TextFileLogger](https://github.com/thiagodp/logger/blob/master/lib/TextFileLogger.php) class

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

### Example

```php
<?php
require_once 'vendor/autoload.php'; // composer
use phputil\TextFileLogger;

$logger = new TextFileLogger( 'log.txt' );

$logger->info( 'Hello world' );
try {
	throw new \Exception( 'something bad happened' );
} catch ( \Exception $e ) {
	// Logs message and trace
	$logger->error( 'Ops, I did not expect that!', $e );
}
?>
```