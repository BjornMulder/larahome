<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Services\HassApiService;

class BinarySensorService
{
    private $hassApiService;
    private $timerService;
    public function __construct(HassApiService $hassApiService, TimerService $timerService)
    {
        $this->hassApiService = $hassApiService;
        $this->timerService = $timerService;
    }

    public function handle($entity) {
        // Closet motion sensor flow
        if ($entity->entity_id === "binary_sensor.tradfri_motion_sensor" && $entity->state === "on") {
            $this->hassApiService->callService('light', 'turn_on', ['entity_id' => 'light.closet'] );
            $this->timerService->set($entity->entity_id, $entity->domain->name, 'turn_off', 300);
        }
    }
}
