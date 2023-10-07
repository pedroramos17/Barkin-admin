<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gateway extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'input',
        'output',
        'permanence',
        'driver_id',
    ];

    protected $casts = [
        'input' => 'datetime',
        'output' => 'datetime',
        'permanence' => 'boolean',
    ];

    public function drivers(): BelongsTo {
        return $this->belongsTo(Driver::class);
    }
}
