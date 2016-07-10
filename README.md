# Logger

A very simple logger for PHP. No magic configuration required. Just the basic features you need most.

Provided interfaces and classes:

* [phputil\Logger] interface (https://github.com/thiagodp/logger/blob/master/lib/Logger.php)
* [phputil\BaseLogger] abstract class (https://github.com/thiagodp/logger/blob/master/lib/BaseLogger.php)
* [phputil\TextFileLogger] class (https://github.com/thiagodp/logger/blob/master/lib/TextFileLogger.php)

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