<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeviceType extends Model
{
    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class);
    }
}
