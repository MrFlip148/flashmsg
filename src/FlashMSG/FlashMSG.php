<?php
	
namespace flip\FlashMSG;
	
class FlashMSG
{
	// types of messages that are valid
	public $valid = ['info', 'success', 'warning', 'error'];
	function __construct()
	{
		// setup session
		if(!isset($_SESSION['flash']))
		{
		$_SESSION['flash'] = array();
		}
	}
	/**
	* Clear the session of messages
	*
	*/
	public function clear()
	{
		$_SESSION['flash'] = null;
	}
	/**
	* Set mesage and type
	*	
	* @param string $type the message type (info, success, warning, error)
	* @param string $message the message
	*/
	public function message($type = 'info', $message)
	{
		// check if type chosen is valid
		if(!in_array($type, $this->valid))
		{
			$type = $this->valid[0];
		}
		// add message to session
		$_SESSION['flash'][] = [
			'type' => $type,
			'message' => $message,
			];
	}
	/**
	* Sets a message of type notice
	*
	* @param string $message the message
	*/
	public function info($message)
	{
		$this->message('info', $message);
	}
	/**
	* Sets a message of type error
	*
	* @param string $message the message
	*/
	public function success($message)
	{
		$this->message('success', $message);
	}
	/**
	* Sets a message of type success	
	*
	* @param string $message the message
	*/
	public function warning($message)
	{
		$this->message('warning', $message);
	}
	/**
	* Sets a message of type warning
	*
	* @param string $message the message
	*/
	public function error($message)
	{
		$this->message('error', $message);
	}
	/**
	* Get messages
	*
	* @return string messages in HTML
	*/
	public function getMessages()
	{
		$messages = null;
		if(isset($_SESSION['flash'])) 
		{
			foreach($_SESSION['flash'] as $flashes => $flash)
			{
				$type = $flash['type'];
				$message = $flash['message'];
				$messages .= "<div class='flash_{$type}'>\n";
				$messages .= "  " . $message . "\n</div>\n";
			}
			// done, clear messages
			$_SESSION['flash'] = null;
		}
		return $messages;
	}
}