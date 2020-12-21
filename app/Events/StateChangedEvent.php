<?php

namespace App\Events;

use App\Models\Entity;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StateChangedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $entity;

    public function __construct(Entity $entity)
    {
        $this->entity = $entity;
    }

}
