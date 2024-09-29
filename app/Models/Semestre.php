<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Semestre extends Model
{
    use HasFactory;
    protected $fillable = [
        'label',
        'code',
        'year_id',
    ];
    public function year(): BelongsTo{
        return $this->belongsTo(Year::class);
    }
    // protected $with = ['year'];

}
