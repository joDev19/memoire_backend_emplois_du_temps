<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ec extends Model
{
    use HasFactory;
    protected $fillable = [
        'label',
        'code',
        'masse_horaire',
        'ue_id',
        'professeur_id',
    ];
    public function ue():BelongsTo{
        return $this->belongsTo(Ue::class);
    }
}
