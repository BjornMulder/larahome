<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Timer;

class TimerService
{
    public function set($entity_id, $domain, $service, $duration) {
        if (Timer::where('entity_id', $entity_id)->count() > 0) {

            Timer::where('entity_id', $entity_id)->update([
                'duration' => $duration,
            ]);

            return;
        }

        Timer::insert([
            'entity_id' => $entity_id,
            'domain' => $domain,
            'service' => $service,
            'duration' => $duration
        ]);
    }
}
