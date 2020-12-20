<?php

namespace App\Console\Commands;

use App\Http\Services\HassApiService;
use App\Models\Entity;
use App\Models\EntityState;
use Illuminate\Console\Command;

class StateUpdateCommand extends Command
{
    protected $signature = 'hass:updatestate';

    protected $description = 'polls for updated states';

    public function __construct()
    {
        parent::__construct();
        profiler_start('my time metric name');
    }

    public function handle()
    {
        $i = 0;
        while ($i < 10) {

            $service = new HassApiService();

            $results = json_decode($service->get('/api/states'));

            $entities = Entity::with('state')->get();

            foreach ($results as $result) {
                $entity = $entities->where('entity_id', $result->entity_id)->first();
                if ($entity->state->state !== $result->state) {
                    EntityState::where('id', $entity->state->id)->update(['state' => $result->state]);
                }
            }
            $i++;
        }
        profiler_finish('my time metric name');
    }
}
