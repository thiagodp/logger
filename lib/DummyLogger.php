<?php
namespace phputil;

use \Exception;

/**
 *  A logger implementation that does nothing. It may be useful to "disable" the log by
 *  creating a Logger implementation with an object of this class.
 *  
 *  @author	Thiago Delgado Pinto
 */
final class DummyLogger implements Logger {

	/** @inheritDoc */
	function debug( $message, Exception $e = null, array $context = array() ) {}
	
	/** @inheritDoc */
	function info( $message, Exception $e = null, array $context = array() ) {}
	
	/** @inheritDoc */
	function warn( $message, Exception $e = null, array $context = array() ) {}
	
	/** @inheritDoc */
	function error( $message, Exception $e = null, array $context = array() ) {}
	
	/** @inheritDoc */
	function log( $type, $message, Exception $e = null, array $context = array() ) {}
}

?>