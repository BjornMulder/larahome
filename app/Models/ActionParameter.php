<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActionParameter extends Model
{
    public function action(): BelongsTo
    {
        return $this->belongsTo(Action::class);
    }
}
