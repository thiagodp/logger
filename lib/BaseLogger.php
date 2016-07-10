<?php
namespace phputil;

use \Exception;

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
}

?>