<?php

namespace App\Console\Commands;

use App\Http\Services\HassApiService;
use App\Models\Timer;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckTimersComand extends Command
{
    protected $signature = 'hass:checktimers';

    protected $description = 'polls for running timers';

    private $hassApiService;
    public function __construct(HassApiService $hassApiService)
    {
        parent::__construct();
        $this->hassApiService = $hassApiService;
    }

    public function handle()
    {
       $timers = Timer::all();
       if (empty($timers)) return;

       foreach ($timers as $timer) {
           if ($timer->updated_at->diffInSeconds(Carbon::now()) > $timer->duration) {
               $this->hassApiService->callService($timer->domain, $timer->service, ['entity_id' => $timer->entity_id] );
               Timer::destroy($timer->id);
           }
       }
    }
}
