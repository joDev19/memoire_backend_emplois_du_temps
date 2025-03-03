<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Filiere extends Model
{
    use HasFactory;
    protected $fillable = [
        'label',
        'code',
    ];

    public function courses(): BelongsToMany{
        return $this->belongsToMany(Course::class);
    }
    public function ues(): BelongsToMany{
        return $this->belongsToMany(Ue::class);
    }
    public function ecs(): BelongsToMany{
        return $this->belongsToMany(Ec::class);
    }

    //protected $with = ["ecs"];
}
