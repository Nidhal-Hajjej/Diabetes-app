<?php

use App\Http\Controllers\InvitationController;
use App\Http\Controllers\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/getChartData/{id}/{attribut}', [NoteController::class, 'getChartData']);
Route::post('/sendDoctorInvitation/{doctor_id}/{patient_id}', [InvitationController::class, 'sendDoctorInvitation']);
