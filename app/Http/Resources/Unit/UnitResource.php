<?php

namespace App\Http\Resources\Unit;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UnitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'leader_id' => $this->leader_id,
            'leader_name' => $this->leader?->name,
            'created_at' => $this->created_at?->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at?->format('d/m/Y - H:i:s'),
        ];
    }
}
