<?php

class EvnetTest extends \PHPUnit_Framework_TestCase
{
	public function testSetAndGetEvent()
	{
		$event = new \PHPUnitEvent\Event();
		$eventArray1 = array(
							[
								"name" => 'PHPUnit', 
								"start_date" => '2014-10-27 09:00', 
								"end_date" => '2014-10-27 12:00',
								"description" => 'PHPUnit 教學 XD'
							]
						);
		$event->setEvents($eventArray1);
		$this->assertCount(1, $event->getEvents());
	}
}