<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'id',
        'entity_id',
        'domain',
        'service',
        'timeout',
        'created_at',
        'updated_at',
    ];
}
