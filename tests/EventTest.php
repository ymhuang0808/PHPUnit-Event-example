<?php

class EventTest extends \PHPUnit_Framework_TestCase
{
    private $event;

    public function setUp()
    {
        $this->event = new \PHPUnitEvent\Event();
    }

    public function tearDown()
    {
        $this->event = null;
    }

    public function eventsProvider()
    {
        // ignore
        return [
            [
                [
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
                    ],
                ]
            ]
        ];
    }

    /**
     * @dataProvider eventsProvider
     */
    public function testSetAndGetEvents($eventArray)
    {
        //$event = new \PHPUnitEvent\Event();
        $this->event->setEvents($eventArray);
        $this->assertCount(3, $this->event->getEvents());
    }

    /**
     * @dataProvider eventsProvider
     */
    public function testGetValidEvents($eventArray)
    {
        $expectedValidEvent = [
            // ...
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

        //$event = new \PHPUnitEvent\Event();
        $this->event->setEvents($eventArray);
        $validEvents = $this->event->getValidEvents(1414421687);
        $this->assertCount(2, $validEvents);
        $this->assertSame($expectedValidEvent, $validEvents);
    }
}