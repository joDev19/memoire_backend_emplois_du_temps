<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CourseWeekController;
use App\Http\Controllers\EcController;
use App\Http\Controllers\EcDoneController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\HourController;
use App\Http\Controllers\SemestreController;
use App\Http\Controllers\UeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('classes', ClasseController::class);
Route::get('semestres/create', [SemestreController::class, 'create'])->name('semestres.create');
Route::apiResource('semestres', SemestreController::class);
Route::apiResource('years', YearController::class)->middleware('auth:sanctum');
Route::Resource('ecs', EcController::class);
Route::post('ecs/assign-teacher/{teacherId}/', [EcController::class, 'assignTeacher'])->name('assign-teacher-to-ec');
Route::get('ecs/year/{year}', [EcController::class, 'getByYear']);
Route::get('ecs/year/{year}/filiere/{filiere}', [EcController::class, 'getByYearAndByFiliere']);
// Route::get('/ecs/create', [EcController::class, 'create'])->name('ecs.create');

Route::apiResource('filieres', FiliereController::class);
Route::get('ues/create', [UeController::class, 'create']);
Route::apiResource('ues', UeController::class);
Route::get('users/create', [UserController::class, 'create']);
Route::apiResource('users', UserController::class);
Route::apiResource('hours', HourController::class);
// courselabel
Route::get('course/create/year/{year}', [CourseController::class, 'create'])->name('courses.create');
Route::apiResource('courses', CourseController::class);
Route::apiResource('courseWeeks', CourseWeekController::class);
Route::get('courseWeeks/year/{year_id}', [CourseWeekController::class, 'getWeekByYear'])->whereNumber('year_id');
Route::post('timetables', [CourseWeekController::class, 'storeTimetables']);
Route::get('timetables/year/{yearId}/week/{weekId}', [CourseWeekController::class, 'getTimetables']);
Route::get('timetables/forward/year/{yearId}/week/{weekId}/filiere/{filiereId}', [CourseWeekController::class, 'forward']);
Route::post('courses/get-old-courses', [CourseWeekController::class, 'getOldCourses']);
Route::get('dashboard/create', [CourseWeekController::class, 'createDashboard']);
Route::post('showBanner', [CourseWeekController::class, 'showBanner']);
//EcDone
Route::apiResource('ec-dones', EcDoneController::class);
