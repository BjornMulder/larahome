<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Home extends Model
{
    protected $fillable = ['name', 'description'];

    public function user(): BelongsTo
    {
        $this->belongsTo(User::class);
    }

    public function sequences(): HasMany
    {
       return $this->hasMany(Sequence::class);
    }
}
