<?php
namespace phputil;

use \Exception;

/**
 *  A fake logger implementation that does nothing.
 * 
 *  It may be used for "disabling" the log by creating a Logger implementation
 *  with an object of this class.
 *  
 *  @author	Thiago Delgado Pinto
 */
final class FakeLogger implements Logger {

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