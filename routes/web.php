<?php

use App\Http\Controllers\CourseWeekController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test/year/{yearId}/week/{weekId}/filiere/{filiereId}', [CourseWeekController::class, 'forward'])->name('test-route');
