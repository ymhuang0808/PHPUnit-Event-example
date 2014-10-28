<?php

class EventTest extends \PHPUnit_Framework_TestCase
{
    public function testSetAndGetEvents()
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
     * @depends testSetAndGetEvents 
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

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage The argument is not integer type
     * @expectedExceptionCode 4
     */
    public function testSetEventsException()
    {
        $event = new \PHPUnitEvent\Event();
        $eventArray = $eventArray = [
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
        $event->getValidEvents('2014-10-28 15:30');
    }
}