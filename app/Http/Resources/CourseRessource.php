<?php

namespace App\Http\Resources;

use App\Models\Ec;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseRessource extends JsonResource
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
            "title" => $this->ec_id,
            "salle" => $this->classe_id,
            "start" => $this->day.'T'.$this->start,
            "end" => $this->day.'T'.$this->end,
            "prof" => Ec::findOrFail($this->ec_id)->professeur->name,
            "filieres" => $this->filieres()->pluck('filiere_id')
        ];
    }
}
