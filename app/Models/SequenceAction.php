<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SequenceAction extends Model
{
    public function sequence(): BelongsTo
    {
        return $this->belongsTo(Sequence::class);
    }

    public function action(): BelongsTo
    {
       return $this->belongsTo(Action::class);
    }
}
