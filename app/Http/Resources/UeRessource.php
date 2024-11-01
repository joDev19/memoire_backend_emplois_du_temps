<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UeRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            "id" => $this->id,
            "label" => $this->label,
            "code" => $this->code,
            "semestre" => $this->semestre,
            "filieres" => $this->filieres,
            "created_at" => $this->created_at,
            "ecs" => $this->ecs,
        ];
    }
}
