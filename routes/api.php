<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('students', [StudentController::class, 'getAll']);

Route::get('students/{id}', [StudentController::class, 'getStudent']);

Route::get('users', [UsersController::class, 'getAll']);

Route::post('createStudent', [StudentController::class, 'createStudent']);

Route::put('updateStudent/{id}', [StudentController::class, 'updateStudent']);

Route::delete('deleteStudent/{id}', [StudentController::class, 'deleteStudent']);
