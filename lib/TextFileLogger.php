<?php
namespace phputil;

use \Exception;
use \DateTime;
use \DateTimeZone;

/**
 *  Logs to a plain text file.
 *  
 *  @author	Thiago Delgado Pinto
 */
class TextFileLogger extends BaseLogger {
	
	private $fileName;
	private $useIncludePath;
	private $dateTimeZone;
	
	function __construct( $fileName, $useIncludePath = false, $dateTimeZone = null ) {
		$this->fileName = $fileName;
		$this->useIncludePath = $useIncludePath;
		$this->dateTimeZone = $dateTimeZone;
	}
	
	/** @inheritDoc */
	function log( $type, $message, Exception $e = null, array $context = array() ) {
		
		$fp = @fopen( $this->fileName, 'a', $this->useIncludePath );
		if ( false === $fp ) { return false; }
		
		$dt = new DateTime();
		$dt->setTimezone( $this->dateTimeZone );		
		$data = $this->makeData( $dt, $type, $message, $e, $context );
		
		$writeResult = @fwrite( $fp, $data );
		$closeResult = @fclose( $fp );
		if ( false === $writeResult ) {
			return false;
		}
		return $closeResult; // true | false
	}
	
}

?>