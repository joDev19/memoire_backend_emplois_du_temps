<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ue extends Model
{
    use HasFactory;
    protected $fillable = [
        'label',
        'code',
        'semestre_id',
    ];
    public function filieres(): BelongsToMany{
        return $this->belongsToMany(Filiere::class);
    }
    public function semestre(): BelongsTo{
        return $this->belongsTo(Semestre::class);
    }
    public function ecs(): HasMany{
        return $this->hasMany(Ec::class);
    }
    //protected $with = ['filieres', 'semestre'];
}
