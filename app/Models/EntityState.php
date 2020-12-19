<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntityState extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'id',
        'entity_id',
        'state',
    ];

    public function entities()
    {
        return $this->belongsTo(Entity::class);
    }
}
