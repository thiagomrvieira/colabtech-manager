<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeDetailResource extends JsonResource
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
            'email' => $this->email,
            'cpf' => $this->cpf,
            'phone' => $this->phone,
            'validated' => $this->validated,
            'validated_at' => $this->validated_at,
            'skills' => SkillResource::collection($this->skills)
        ];
    }
}
