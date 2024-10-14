<?php

namespace App\Models;

use App\Services\EcService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function professeur():BelongsTo{
        return $this->belongsTo(User::class, 'professeur_id');
    }
    public function filieres():BelongsToMany{
        return $this->belongsToMany(Filiere::class);
    }
    public function ecDones():HasMany{
        return $this->hasMany(EcDone::class);
    }

    protected function remainingHour(): Attribute
    {
        $ecService = new EcService();
        return new Attribute(
            get: fn () => $ecService->getRemainingHour($this->id),
        );
    }
    protected $appends = ['remaining_hour'];
}
