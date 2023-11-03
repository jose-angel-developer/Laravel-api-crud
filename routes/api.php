<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EstudianteController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/estudiante/select', [EstudianteController::class, 'selecStudent']);

Route::get ('/estudiante/find/{id}', [EstudianteController::class, 'findStudent']);

Route::post('/estudiante/store', [EstudianteController::class, 'storeStudent']);
Route::put('/estudiante/update/{id}', [EstudianteController::class, 'updateStudent']);
Route::get ('/estudiante/destroy/{id}', [EstudianteController::class, 'destroyStudent']);