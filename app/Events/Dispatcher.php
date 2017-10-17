<?php

namespace App\Events;


class Dispatcher {

    protected $actions = [];

    /**
     * Push handler into list of actions
     *
     * @param $event
     * @param $handler
     * @return $this
     */
    public function addAction($event, $handler)
    {
        $this->actions[$event][] = $handler;
        return $this;
    }

    /**
     * Check if the event has actions
     * 
     * @param $event
     * @return bool
     */
    public function hasActions($event)
    {
        return isset($this->actions[$event]);
    }

    /**
     * Get Actions based on the name of Event
     *
     * @param $event
     * @return array
     */
    public function getActionsByEventName($event)
    {
        if(! $this->hasActions($event)){
            return [];
        }

        return $this->actions[$event];
    }

    /**
     * Run the actions
     *
     * @param $event
     */
    public function action($event)
    {
        foreach($this->getActionsByEventName($event) as $action){
            $action->handle();
        }
    }
}