<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Entity;

class EntityStateService
{
    public function checkState($entity_id, $expectedState) {
        if (Entity::where([['entity_id', $entity_id], ['state', $expectedState]])->count() > 0) {
            return true;
        }
        return false;
    }
}
