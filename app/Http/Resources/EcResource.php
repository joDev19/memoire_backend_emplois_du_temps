<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EcResource extends JsonResource
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
            "code" => $this->code,
            "label" => $this->label,
            "filieres" => $this->filieres,
            "ue" => $this->ue,
            "masse_horaire" => $this->masse_horaire,
            "masse_horaire_restante" => $this->remaining_hour,
            "created_at" => $this->created_at,
            "professeur" => $this->professeur->name,
            "semestre" => $this->ue->semestre
        ];
    }
}
