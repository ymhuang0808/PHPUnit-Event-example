<?php

namespace PHPUnitEvent;

class Event
{
	private $events = array();

    /**
     * Gets the value of events.
     *
     * @return mixed
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Sets the value of events.
     *
     * @param mixed the events
     *
     */
    public function setEvents($events)
    {
        $this->events = $events;
    }

    /**
     * Get validatedEvents
     * 
     * @return [type] [description]
     */
    public function getValidEvents()
    {

    }
}