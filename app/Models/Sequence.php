<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sequence extends Model
{
    public function actions(): HasMany
    {
        return $this->hasMany(SequenceAction::class);
    }

    public function home(): BelongsTo
    {
       return $this->belongsTo(Home::class);
    }
}
