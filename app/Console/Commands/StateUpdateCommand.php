<?php

namespace App\Console\Commands;

use App\Http\Services\HassApiService;
use App\Models\Entity;
use App\Models\EntityState;
use Illuminate\Console\Command;

class StateUpdateCommand extends Command
{
    protected $signature = 'hass:updatestate {data}';

    protected $description = 'polls for updated states';

    public function __construct()
    {
        parent::__construct();
        profiler_start('my time metric name');
    }

    public function handle()
    {
        $eventData = $this->input('data');
        dd($eventData);


        Entity::where('entity_id', $eventData->entity_id)->update([
            'attributes' => json_encode($eventData->attributes),
            'context' => json_encode($eventData->context),
            'state' => $eventData->state,
        ]);
    }
}
