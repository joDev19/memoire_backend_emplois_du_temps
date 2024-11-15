<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Year extends Model
{
    use HasFactory;
    protected $fillable = ['label', 'year_id', 'code'];
    public function semestres(): HasMany{
        return $this->hasMany(Semestre::class);
    }
    protected $with = ['semestres'];
    public function users(): HasMany{
        return $this->hasMany(User::class);
    }

}
