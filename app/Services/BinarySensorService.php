<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Services\HassApiService;

class BinarySensorService
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
        // Closet motion sensor flow
        if ($entity->entity_id === "binary_sensor.tradfri_motion_sensor" && $entity->state === "on") {
            $this->hassApiService->callService('light', 'turn_on', ['entity_id' => 'light.closet'] );
            $this->timerService->set("light.closet", 'light', 'turn_off', 300);
        }

        // Bathroom light flow
        if ($entity->entity_id === "binary_sensor.bathroom_sensor" && $entity->state === "on") {
            $this->hassApiService->callService('light', 'turn_on', ['entity_id' => 'light.bathroom'] );
            $this->timerService->set("light.bathroom", 'light', 'turn_off', 120);
        }
        if ($entity->entity_id === "binary_sensor.bathroom_radar" && $entity->state === "on") {
            $this->entityStateService->checkState('light.bathroom', "on");
            $this->timerService->set("light.bathroom", 'light', 'turn_off', 120);
        }

    }
}
