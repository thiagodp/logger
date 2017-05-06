<?php
namespace phputil;

use \Exception;
use \DateTime;

/**
 *  Provides an initial implementation. All the methods call the log method.
 *  
 *  @author	Thiago Delgado Pinto
 */
abstract class BaseLogger implements Logger {

	/** @inheritDoc */
	function debug( $message, Exception $e = null, array $context = array() ) {
		return $this->log( Logger::DEBUG, $message, $e, $context );
	}
	
	/** @inheritDoc */
	function info( $message, Exception $e = null, array $context = array() ) {
		return $this->log( Logger::INFO, $message, $e, $context );
	}
	
	/** @inheritDoc */
	function warn( $message, Exception $e = null, array $context = array() ) {
		return $this->log( Logger::WARN, $message, $e, $context );
	}
	
	/** @inheritDoc */
	function error( $message, Exception $e = null, array $context = array() ) {
		return $this->log( Logger::ERROR, $message, $e, $context );
	}
	
	// Complete format is:
	//
	// [type] iso-date-time - message >> exception-message - exception-trace | context
	//
	protected function makeData(
			DateTime $date, $type, $message, Exception $e = null, array $context = array()
			) {
		$now = $date->format( 'Y-m-d\TH:i:sO' ); // ISO-8601
		$s = "[$type] $now - $message";
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