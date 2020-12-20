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
        'state',
        'attributes',
        'context',
    ];

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
}

