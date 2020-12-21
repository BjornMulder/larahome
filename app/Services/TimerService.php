<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Timer;

class TimerService
{
    public function set($entity_id, $domain, $service, $duration) {
        Timer::updateOrCreate([
            'entity_id' => $entity_id,
            'domain' => $domain,
            'service' => $service,
        ], ['duration' => $duration]);
    }
}
