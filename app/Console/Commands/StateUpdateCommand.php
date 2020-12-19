<?php

namespace App\Console\Commands;

use App\Http\Services\HassApiService;
use App\Models\EntityState;
use Illuminate\Console\Command;

class StateUpdateCommand extends Command
{
    protected $signature = 'hass:updatestate';

    protected $description = 'polls for updated states';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        $service = new HassApiService();

        $results = json_decode($service->get('/api/states'));

        foreach ($results as $result) {
            $state = EntityState::firstOrCreate(
                ['entity_id' => $result->entity_id,],
                [
                    'state' => $result->state,
                ]);
            if ($state->state !== $result->state) {
                EntityState::where('id', $state->id)->update(['state' => $result->state]);
            }
        }
    }
}
