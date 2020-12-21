<?php

namespace App\Console\Commands;

use App\Events\StateChangedEvent;
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
        $eventData = json_decode($this->argument('data'))->event->data;

        Entity::where('entity_id', $eventData->entity_id)->update([
            'attributes' => json_encode($eventData->new_state->attributes),
            'context' => json_encode($eventData->new_state->context),
            'state' => $eventData->new_state->state,
            'old_attributes' => json_encode($eventData->old_state->attributes),
            'old_context' => json_encode($eventData->old_state->context),
            'old_state' => $eventData->old_state->state,
        ]);

        $entity = Entity::where('entity_id', $eventData->entity_id)->first();


        StateChangedEvent::dispatch($entity);
    }
}
