<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FiliereRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "id" => $this->id,
            "label" => $this->label,
            "code" => $this->code,
            "ues" => $this->ues,
            "ecs" => $this->ecs,
            "created_at" => $this->created_at,
        ];
    }
}
