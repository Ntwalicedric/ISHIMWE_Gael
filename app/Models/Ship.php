<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    protected $fillable = [
        'name',
        'type',
        'capacity',
    ];

    public function cargos()
    {
        return $this->hasMany(Cargo::class);
    }
}
