<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StateLog extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'id',
        'data',
        'created_at',
        'updated_at',
    ];
}
