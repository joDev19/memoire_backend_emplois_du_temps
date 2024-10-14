<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EcDone extends Model
{
    use HasFactory;
    protected $fillable = ['ec_id', 'day', 'nbr_hour'];
    public function ec():BelongsTo{
        return $this->belongsTo(Ec::class);
    }
}
