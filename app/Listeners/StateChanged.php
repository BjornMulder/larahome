<?php

namespace App\Listeners;

use App\Events\StateChangedEvent;
use App\Services\EventMappingService;

class StateChanged
{
    private $eventMappingService;
    public function __construct(EventMappingService $eventMappingService)
    {
        $this->eventMappingService = $eventMappingService;
    }


    public function handle(StateChangedEvent $event)
    {
       $entity = $event->entity ;
       $this->eventMappingService->map($entity);
    }
}
