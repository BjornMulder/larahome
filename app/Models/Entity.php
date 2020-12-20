<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'id',
        'domain_id',
        'entity_id',
        'attributes',
    ];

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function state()
    {
        return $this->hasOne(EntityState::class);
    }

}

