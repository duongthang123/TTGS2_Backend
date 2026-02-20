<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'gender' => $this->gender,
            'citizen_number' => $this->citizen_number,
            'date' => $this->date,
            'old_address' => $this->old_address,
            'new_address' => $this->new_address,
            'email' => $this->email,
            'phone' => $this->phone,
            'rank_id' => $this->rank_id,
            'position_id' => $this->position_id,
            'unit_id' => $this->unit_id,
            'joined_date' => $this->joined_date,
            'unit_assigned_date' => $this->unit_assigned_date,
            'party_joined_date' => $this->party_joined_date,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
