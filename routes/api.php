<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\InterviewController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('employers', EmployerController::class);
Route::apiResource('job-posts', JobPostController::class);
Route::apiResource('candidates', CandidateController::class);
Route::apiResource('cvs', CVController::class);
Route::apiResource('applications', ApplicationController::class);
Route::apiResource('interviews', InterviewController::class);

Route::get('jobposts', [JobPostController::class, 'index']);
Route::get('jobposts/{id}', [JobPostController::class, 'show']);
Route::post('jobposts', [JobPostController::class, 'store']);
Route::put('jobposts/{id}', [JobPostController::class, 'update']);
Route::delete('jobposts/{id}', [JobPostController::class, 'destroy']);


Route::get('employers', [EmployerController::class, 'index']);
Route::get('employers/{id}', [EmployerController::class, 'show']);
Route::post('employers', [EmployerController::class, 'store']);
Route::put('employers/{id}', [EmployerController::class, 'update']);
Route::delete('employers/{id}', [EmployerController::class, 'destroy']);

Route::get('candidates', [CandidateController::class, 'index']);
Route::get('candidates/{id}', [CandidateController::class, 'show']);
Route::post('candidates', [CandidateController::class, 'store']);
Route::put('candidates/{id}', [CandidateController::class, 'update']);
Route::delete('candidates/{id}', [CandidateController::class, 'destroy']);

Route::get('cvs', [CVController::class, 'index']);
Route::post('cvs', [CVController::class, 'store']);
Route::get('cvs/{id}', [CVController::class, 'show']);
Route::put('cvs/{id}', [CVController::class, 'update']);
Route::delete('cvs/{id}', [CVController::class, 'destroy']);

Route::get('applications', [ApplicationController::class, 'index']);
Route::post('applications', [ApplicationController::class, 'store']);
Route::get('applications/{id}', [ApplicationController::class, 'show']);
Route::put('applications/{id}', [ApplicationController::class, 'update']);
Route::delete('applications/{id}', [ApplicationController::class, 'destroy']);

Route::get('interviews', [InterviewController::class, 'index']);
Route::post('interviews', [InterviewController::class, 'store']);
Route::get('interviews/{id}', [InterviewController::class, 'show']);
Route::put('interviews/{id}', [InterviewController::class, 'update']);
Route::delete('interviews/{id}', [InterviewController::class, 'destroy']);

