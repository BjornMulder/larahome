<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'id',
        'name',
        'description',
    ];

    public function entities()
    {
        return $this->hasMany(Entity::class);
    }
}
