<?php
namespace phputil;

use \Exception;

/**
 *  Logger
 *  
 *  @author	Thiago Delgado Pinto
 */
interface Logger {
	
	const DEBUG = 'DEBUG';
	const INFO = 'INFO';
	const WARN = 'WARN';
	const ERROR = 'ERROR';

	function debug( $message, Exception $e = null, array $context = array() );
	function info( $message, Exception $e = null, array $context = array() );
	function warn( $message, Exception $e = null, array $context = array() );
	function error( $message, Exception $e = null, array $context = array() );
	
	/**
	 *  Logs a message and other data.
	 *  
	 *  @param string $type		Log type.
	 *  @param string $message	Message.
	 *  @param Exception $e		Exception (OPTIONAL).
	 *  @param array $context	Map with additional context (OPTIONAL).
	 *  
	 *  @return bool			Success?
	 */
	function log( $type, $message, Exception $e = null, array $context = array() );
}

?>