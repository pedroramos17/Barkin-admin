<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gateway extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'input',
        'output',
        'permanence',
    ];

    protected $casts = [
        'input' => 'datetime',
        'output' => 'datetime',
        'permanence' => 'boolean',
    ];

    public function drivers(): BelongsToMany {
        return $this->belongsToMany(Driver::class);
    }
}
