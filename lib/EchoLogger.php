<?php
namespace phputil;

use \Exception;
use \DateTime;
use \DateTimeZone;

/**
 *  Logs to the standard output.
 *  
 *  @author	Thiago Delgado Pinto
 */
class EchoLogger extends BaseLogger {
	
	private $useFlush;
	private $useObFlush;
	private $dateTimeZone;
	
	function __construct( $useFlush = true, $useObFlush = true, $dateTimeZone = null ) {
		$this->useFlush = $useFlush;
		$this->useObFlush = $useObFlush;
		$this->dateTimeZone = $dateTimeZone;
	}
	
	/** @inheritDoc */
	function log( $type, $message, Exception $e = null, array $context = array() ) {
		$dt = new DateTime();
		$dt->setTimezone( $this->dateTimeZone );
		echo $this->makeData( $dt, $type, $message, $e, $context );
		if ( $this->useObFlush ) {
			ob_flush();
		}
		if ( $this->useFlush ) {
			flush();
		}
		return true;
	}
	
}

?>