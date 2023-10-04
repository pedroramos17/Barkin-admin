<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'color',
        'plate',
        'observation',
    ];

    public function driver(): HasOne {
        return $this->hasOne(Driver::class);
    }
}
