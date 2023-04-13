<?php

use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\WaliController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('students', [StudentController::class, 'index']);  
Route::post('students', [StudentController::class, 'store']);  
Route::get('students/{id}', [StudentController::class, 'show']); 

Route::get('students/{id}/edit', [StudentController::class, 'edit']);  
Route::put('students/{id}/edit', [StudentController::class, 'update']); 

Route::delete('students/{id}/delete', [StudentController::class, 'destroy']); 

Route::get('wali', [WaliController::class, 'index']); 
Route::post('wali', [WaliController::class, 'store']); 
Route::get('wali/{id}', [WaliController::class, 'show']);
Route::put('wali/{id}/edit', [WaliController::class, 'update']);  
Route::delete('wali/{id}/delete', [WaliController::class, 'destroy']); 
 
