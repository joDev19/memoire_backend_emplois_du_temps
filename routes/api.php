<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CourseWeekController;
use App\Http\Controllers\EcController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\HourController;
use App\Http\Controllers\SemestreController;
use App\Http\Controllers\UeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('classes', ClasseController::class);
Route::apiResource('semestres', SemestreController::class);
Route::apiResource('years', YearController::class);
Route::apiResource('ecs', EcController::class);
Route::get('ecs/year/{year}', [EcController::class, 'getByYear']);

Route::apiResource('filieres', FiliereController::class);
Route::apiResource('ues', UeController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('hours', HourController::class);
// course
Route::get('course/create/year/{year}', [CourseController::class, 'create'])->name('courses.create');
Route::apiResource('courses', CourseController::class);
Route::apiResource('courseWeeks', CourseWeekController::class);
Route::post('timetables', [CourseWeekController::class, 'storeTimetables']);
Route::get('timetables/year/{yearId}/week/{weekId}', [CourseWeekController::class, 'getTimetables']);
