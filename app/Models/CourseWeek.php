<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseWeek extends Model
{
    use HasFactory;
    protected $fillable = [
        'start',
        'end',
        'status',
        'year_id',
    ];
    public function courses(): HasMany{
        return $this->hasMany(Course::class);
    }
    public function coursesByFiliere($filiereId){
        // dd($filiereId);
        return $this->courses()->whereHas('filieres', function($query) use($filiereId){
            $query->where('filieres.id', $filiereId);
        });
    }
}
