<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        return $this->belongsToMany(Driver::class)->using(DriverGateway::class);
    }
}
