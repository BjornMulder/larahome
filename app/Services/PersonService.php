<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Services\HassApiService;

class PersonService
{
    private $hassApiService;
    private $googleHomeService;
    private $timerService;
    private $entityStateService;
    public function __construct(HassApiService $hassApiService, TimerService $timerService, EntityStateService $entityStateService, GoogleHomeService $googleHomeService)
    {
        $this->hassApiService = $hassApiService;
        $this->timerService = $timerService;
        $this->entityStateService = $entityStateService;
        $this->googleHomeService = $googleHomeService;
    }

    public function handle($entity) {

        dump("handlingpersonservice");
        // Sarah leaves
        if ($entity->entity_id === "person.sarah" && $entity->state === "away") {
            if ($this->entityStateService->checkState('person.bjorn_mulder', "away")) {
                //$this->hassApiService->callService('light', 'light.turn_off', ['entity_id' => 'all'] );
                $this->googleHomeService->run("Turn off all lights");
            }
        }

        //  Bjorn Leaves
        if ($entity->entity_id === "person.bjorn_mulder" && $entity->state === "away") {
            if ($this->entityStateService->checkState('person.sarah', "away")) {
                //$this->hassApiService->callService('light', 'light.turn_off', ['entity_id' => 'all'] );
                $this->googleHomeService->run("Turn off all lights");
            }
        }
    }
}
