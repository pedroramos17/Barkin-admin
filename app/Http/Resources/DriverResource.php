<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
{

     /**
     * The "data" wrapper that should be applied.
     *
     * @var string|null
     */
    public static $wrap = 'driver';
    
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'rg' => $this->rg,
            'phone' => $this->phone,
            'vehicles' => VehicleResource::collection($this->vehicles),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
