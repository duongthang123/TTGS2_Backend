<?php

namespace App\Http\Resources\SalaryCft;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SalaryCftResource extends JsonResource
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
            'user' => [
                'user_id' => $this->user_id,
                'user_name' => $this->user->name,
                'user_code' => $this->user->code
            ],
            'rank_id' => $this->rank_id,
            'salary' => $this->salary,
            'from_year' => $this->from_year,
            'to_year' => $this->to_year,
            'note' => $this->note,
            'created_at' => $this->created_at?->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at?->format('d/m/Y - H:i:s'),
        ];
    }
}
