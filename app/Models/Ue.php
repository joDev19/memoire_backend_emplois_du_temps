<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ue extends Model
{
    use HasFactory;
    protected $fillable = [
        'label',
        'code',
        'filiere_id',
        'semestre_id',
    ];
    public function filieres(): BelongsToMany{
        return $this->belongsToMany(Filiere::class);
    }
    public function semestre(): BelongsTo{
        return $this->belongsTo(Semestre::class);
    }
    //protected $with = ['filieres', 'semestre'];
}
