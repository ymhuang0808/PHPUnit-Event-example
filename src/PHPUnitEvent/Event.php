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
     * Get validated Events
     * 
     * @return mixed validated events
     */
    public function getValidEvents($now)
    {
         if(!is_int($now))
            throw new \InvalidArgumentException("The argument is not integer type", 4);
        
        date_default_timezone_set('Asia/Taipei');
        
        $validEvents = array();

        foreach($this->events as $event) {
            if(strtotime($event['start_date']) > $now) {
                array_push($validEvents, $event);
            }
        }

        return $validEvents;
    }
}