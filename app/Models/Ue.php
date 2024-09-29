<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ue extends Model
{
    use HasFactory;
    protected $fillable = [
        'label',
        'code',
        'filiere_id',
        'semestre_id',
    ];
    public function filiere(): BelongsTo{
        return $this->belongsTo(Filiere::class);
    }
    public function semestre(): BelongsTo{
        return $this->belongsTo(Semestre::class);
    }
    protected $with = ['filiere', 'semestre'];
}
