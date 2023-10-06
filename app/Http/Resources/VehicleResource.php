<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{

    /**
     * The "data" wrapper that should be applied.
     *
     * @var string|null
     */
    public static $wrap = 'vehicle';

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'brand' => $this->brand,
            'color' => $this->color,
            'plate' => $this->plate,
            'observation' => $this->observation,
            'driver' => VehicleResource::collection($this->driver),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
