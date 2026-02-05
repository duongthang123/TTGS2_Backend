<?php

namespace App\Http\Resources\Role;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'display_name' => $this->display_name,
            'group' => $this->group,
            'created_at' => $this->created_at,
            'updated_at' =>$this->updated_at,
            'permissions' => $this->permissions->map->only(['id', 'name']),
        ];
    }
}
