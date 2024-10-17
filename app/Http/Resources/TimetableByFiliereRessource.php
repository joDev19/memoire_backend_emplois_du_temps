<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TimetableByFiliereRessource extends JsonResource
{
    public function __construct($resource, private $filiereId){
        parent::__construct($resource);
    }
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
            "start" => $this->start,
            "end" => $this->end,
            "courses" => CourseRessource::collection($this->coursesByFiliere($this->filiereId)->with('filieres')->get()),
        ];
    }
}
