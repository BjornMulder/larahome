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
            dump("sarah leaving");
            if ($this->entityStateService->checkState('person.bjorn_mulder', "away")) {
                dump("sarah leaving and bjorn not home");
                $this->hassApiService->callService('light', 'light.turn_off', ['entity_id' => 'all'] );
            }
        }

        //  Bjorn Leaves
        if ($entity->entity_id === "person.bjorn_mulder" && $entity->state === "away") {
            dump("bjorn leaving");
            if ($this->entityStateService->checkState('person.sarah', "away")) {
                dump("bjorn leaving and sarah not home");
                $this->hassApiService->callService('light', 'light.turn_off', ['entity_id' => 'all'] );
            }
        }
    }
}
