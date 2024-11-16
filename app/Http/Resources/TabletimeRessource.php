<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TabletimeRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        //dd($this->id);
        return [
            "id" => $this->id,
            "status" => $this->status,
            "start" => $this->start,
            "end" => $this->end,
            "courses" => CourseRessource::collection($this->courses),
        ];
    }
}
