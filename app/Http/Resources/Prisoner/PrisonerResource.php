<?php

namespace App\Http\Resources\Prisoner;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PrisonerResource extends JsonResource
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
            'name' => $this->name,
            'date' => $this->date,
            'gender' => $this->gender,
            'citizen_number' => $this->citizen_number,
            'address' => $this->address,
            'permanent_address' => $this->permanent_address,
            'crime' => $this->crime,
            'sentence' => $this->sentence,
            'admitted_at' => $this->admitted_at,
            'status' => $this->status,
            'created_at' => $this->created_at?->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at?->format('d/m/Y - H:i:s'),
        ];
    }
}
