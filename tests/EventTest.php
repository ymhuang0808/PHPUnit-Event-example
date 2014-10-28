<?php

class EvnetTest extends \PHPUnit_Framework_TestCase
{
    public function testSetAndGetEvent()
    {
        $event = new \PHPUnitEvent\Event();
        $eventArray = [
            [
                'name' => 'PHPUnit', 
                'start_date' => '2014-10-27 09:00', 
                'end_date' => '2014-10-27 12:00',
                'description' => 'PHPUnit tutorial XD',
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

        $event->setEvents($eventArray);
        $this->assertCount(3, $event->getEvents());

        return $event;
    }

    /**
     * @depends testSetAndGetEvent 
     */
    public function testGetValidEvents($event)
    {
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

        $validEvents = $event->getValidEvents(1414421687);
        $this->assertCount(2, $validEvents);
        $this->assertSame($expectedValidEvent, $validEvents);
    }
}