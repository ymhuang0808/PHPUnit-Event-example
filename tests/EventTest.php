<?php

class EvnetTest extends \PHPUnit_Framework_TestCase
{
    public function testSetAndGetEvent()
    {
        $event = new \PHPUnitEvent\Event();
        $eventArray1 = array(
            [
                'name' => 'PHPUnit', 
                'start_date' => '2014-10-27 09:00', 
                'end_date' => '2014-10-27 12:00',
                'description' => 'PHPUnit 教學 XD',
            ]
        );
        $event->setEvents($eventArray1);
        $this->assertCount(1, $event->getEvents());
    }

    public function testGetValidEvents()
    {
        $event = new \PHPUnitEvent\Event();
        $eventArray = [
            [
                'name' => 'PHPUnit', 
                'start_date' => '2014-10-27 09:00', 
                'end_date' => '2014-10-27 12:00',
                'description' => 'PHPUnit 教學 XD',
            ],
            [
                'name' => 'Learning Ruby on Rails',
                'start_date' => '2014-11-02 09:30',
                'end_date' => '2014-11-02 16:00',
                'description' => 'RoR basic',
            ],
            [
                'name' => 'Git tutorial',
                'start_date' => '2014-11-08 14:00',
                'end_date' => '2014-11-08 17:00',
                'description' => 'How to use Git in your development?',
            ]
        ];
        $expectedValidEvent = [
            [
                'name' => 'Learning Ruby on Rails',
                'start_date' => '2014-11-02 09:30',
                'end_date' => '2014-11-02 16:00',
                'description' => 'RoR basic',
            ],
            [
                'name' => 'Git tutorial',
                'start_date' => '2014-11-08 14:00',
                'end_date' => '2014-11-08 17:00',
                'description' => 'How to use Git in your development?',
            ]
        ];
        $event->setEvents($eventArray);
        $validEvents = $event->getValidEvents(1414421687);
        $this->assertCount(2, $validEvents);
        $this->assertSame($expectedValidEvent, $validEvents);
    }
}