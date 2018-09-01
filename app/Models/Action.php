<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Action extends Model
{
    public function parameters(): HasMany
    {
        return $this->hasMany(ActionParameter::class);
    }

   public function sequenceActions(): HasMany
   {
       return $this->hasMany(SequenceAction::class);
   }
}
