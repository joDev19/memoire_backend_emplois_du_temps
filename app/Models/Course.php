<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        "ec_id",
        "day",
        "start",
        "end",
        "classe_id",
        "course_week_id",
    ];
    public function filieres(): BelongsToMany
    {
        return $this->belongsToMany(Filiere::class);
    }
    public function course_week(): BelongsTo{
        return $this->belongsTo(CourseWeek::class);
    }
    public function ec(): BelongsTo{
        return $this->belongsTo(Ec::class);
    }
}
