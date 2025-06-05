<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = [
        'name',
        'description',
        'weight',
        'ship_id',
    ];

    public function ship()
    {
        return $this->belongsTo(Ship::class);
    }
}
