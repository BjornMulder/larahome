<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Services\HassApiService;

class PersonService
{
    private $hassApiService;
    private $timerService;
    private $entityStateService;
    public function __construct(HassApiService $hassApiService, TimerService $timerService, EntityStateService $entityStateService)
    {
        $this->hassApiService = $hassApiService;
        $this->timerService = $timerService;
        $this->entityStateService = $entityStateService;
    }

    public function handle($entity) {

        // Sarah leaves
        if ($entity->entity_id === "person.sarah" && $entity->state === "away") {
            if ($this->entityStateService->checkState('person.bjorn_mulder', "away")) {
                $this->hassApiService->callService('light', 'turn_off', ['entity_id' => 'all'] );
            }
        }

        //  Bjorn Leaves
        if ($entity->entity_id === "person.bjorn_mulder" && $entity->state === "away") {
            if ($this->entityStateService->checkState('person.sarah', "away")) {
                $this->hassApiService->callService('light', 'turn_off', ['entity_id' => 'all'] );
            }
        }
    }
}
