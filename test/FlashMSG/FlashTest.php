<?php

namespace flip\FlashMSG;

require_once(__DIR__ . '/../../src/FlashMSG/FlashMSG.php');

class FlashTest //extends \PHPUnit_Framework_TestCase
{
	public function setup()
	{
		$this->flash = new FlashMSG();
	}
	public function testClear()
	{
		$this->flash->message('info', 'Info type message');
		$this->assertEquals('info', $_SESSION['flash'][0]['type']);
		$this->flash->clear();
		$this->assertEquals(null, $_SESSION['flash']);
	}
	public function testMessage()
	{
		$this->flash->message('info', 'Info example message');
		$this->flash->message('success', 'Success example message');
		$this->flash->message('warning', 'Warning example message');
		$this->flash->message('error', 'Error example message');
		$this->assertEquals('info', $_SESSION['flash'][0]['type']);
		$this->assertEquals('success', $_SESSION['flash'][1]['type']);
		$this->assertEquals('warning', $_SESSION['flash'][2]['type']);
		$this->assertEquals('error', $_SESSION['flash'][3]['type']);
		$this->assertEquals('Info example message', $_SESSION['flash'][0]['message']);
		$this->assertEquals('Success example message', $_SESSION['flash'][1]['message']);
		$this->assertEquals('Warning example message', $_SESSION['flash'][2]['message']);
		$this->assertEquals('Error example message', $_SESSION['flash'][3]['message']);
	}
	public function testSpecificMessageFunctions()
	{
		$this->flash->info('Info example message');
		$this->flash->success('Success example message');
		$this->flash->warning('Warning example message');
		$this->flash->error('Error example message');
		$this->assertEquals('info', $_SESSION['flash'][0]['type']);	
		$this->assertEquals('success', $_SESSION['flash'][1]['type']);
		$this->assertEquals('warning', $_SESSION['flash'][2]['type']);
		$this->assertEquals('error', $_SESSION['flash'][3]['type']);
		$this->assertEquals('Info example message', $_SESSION['flash'][0]['message']);
		$this->assertEquals('Success example message', $_SESSION['flash'][1]['message']);
		$this->assertEquals('Warning example message', $_SESSION['flash'][2]['message']);
		$this->assertEquals('Error example message', $_SESSION['flash'][3]['message']);
	}
	public function testGetMessages()
	{
		$this->flash->clear();
		$this->flash->message('info', 'Info example message');
		$expectedResult = "<div class='flash_info'>\n";
		$expectedResult .= "  " . "Info example message" . "\n</div>\n";
		$this->assertEquals($expectedResult, $this->flash->getMessages());
	}
	public function testEmptyGetMessages()
	{
		$this->flash->clear();
		$this->assertEquals(null, $this->flash->getMessages());
	}
}