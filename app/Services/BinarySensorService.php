<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Services\HassApiService;

class BinarySensorService
{
    private $hassApiService;
    public function __construct(HassApiService $hassApiService)
    {
        $this->hassApiService = $hassApiService;
    }

    public function handle($entity) {
        if ($entity->entity_id === "binary_sensor.tradfri_motion_sensor") {
            $this->hassApiService->callService('light', 'turn_on', ['entity_id' => 'light.closet'] );
            sleep(10);
            $this->hassApiService->callService('light', 'turn_off', ['entity_id' => 'light.closet'] );
        }
    }
}
