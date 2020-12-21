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
        'old_state',
        'old_attributes',
        'old_context',
    ];

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
}

