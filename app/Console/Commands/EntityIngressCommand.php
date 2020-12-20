<?php

namespace App\Console\Commands;

use App\Http\Services\HassApiService;
use App\Models\Domain;
use App\Models\Entity;
use App\Models\EntityState;
use Illuminate\Console\Command;

class EntityIngressCommand extends Command
{
    protected $signature = 'hass:entities';

    protected $description = 'syncs entities';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $service = new HassApiService();

        $results = json_decode($service->get('/api/states'));

        foreach ($results as $result) {
            $domainName = explode('.', $result->entity_id)[0];
            $domainRecord = Domain::firstOrCreate(['name' => $domainName]);

            $entity = Entity::firstOrCreate(
                ['entity_id' => $result->entity_id,],
                [
                    'domain_id' => $domainRecord->id,
                    'attributes' => json_encode($result->attributes),
                ]);

            EntityState::firstOrCreate([
                'entity_id' => $entity->id,
            ],[
                'state' => $result->state,
            ]);
        }
    }
}
