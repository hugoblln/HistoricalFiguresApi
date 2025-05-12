<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FigureResource extends JsonResource
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
            'birth_name' => $this->birth_name,
            'birth_date' => $this->birth_date,
            'birth_place' => $this->birth_place,
            'death_date' => $this->death_date,
            'death_place' => $this->death_place,
            'nationality' => $this->nationality,
            'short_description' => $this->short_description,    
            'gender' => $this->gender,
            'portrait_url' => $this->portrait_url,
            'biography' => $this->biography,
            'isVerified' => $this->isVerified,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
