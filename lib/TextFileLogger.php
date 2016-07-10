<?php
namespace phputil;

use \Exception;
use \DateTime;

/**
 *  Logs to a simple text file.
 *  
 *  @author	Thiago Delgado Pinto
 */
class TextFileLogger extends BaseLogger {
	
	private $fileName;
	private $useIncludePath;
	
	function __construct( $fileName, $useIncludePath = false ) {
		$this->fileName = $fileName;
		$this->useIncludePath = $useIncludePath;
	}
	
	/** @inheritDoc */
	function log( $type, $message, Exception $e = null, array $context = array() ) {
		
		$fp = @fopen( $this->fileName, 'a', $this->useIncludePath );
		if ( false === $fp ) { return false; }
		
		$data = $this->makeData( $type, $message, $e, $context );
		
		$writeResult = @fwrite( $fp, $data );
		$closeResult = @fclose( $fp );
		if ( false === $writeResult ) {
			return false;
		}
		return $closeResult; // true | false
	}
	
	// Complete format is:
	//
	// [type] iso-date-time - message >> exception-message - exception-trace | context
	//
	private function makeData( $type, $message, Exception $e = null, array $context = array() ) {
		$dt = ( new DateTime() )->format( 'Y-m-d\TH:i:sO' ); // ISO-8601
		$s = "[$type] $dt - $message";
		if ( $e !== null ) {
			$msg = $e->getMessage();
			$trace = $e->getTraceAsString();
			$s .= " >> $msg - $trace";
		}
		if ( count( $context ) > 0 ) {
			$s .= ' | ' . http_build_query( $context, '', ', ' ); // key1=value1, ..., keyN=valueN
		}
		$s .= "\n";
		return $s;
	}
}

?>