<?php

use App\Http\Controllers\NoteController;
use App\Models\Note;
use App\Models\Patient;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::get('/login', function () {
    return view('login');
});

Route::get('/diabetes', function () {
    return view('diabetes');
});

Route::get('/aboutWebsite', function () {
    return view('aboutWebsite');
});

Route::get('/account', function () {
    return view('account');
});

Route::get('/clinicianAccount', function () {
    return view('clinicianAccount');
});

Route::get('/clinicianDashboard', function () {
    return view('clinicianDashboard');
});

Route::get('/clinicianManage', function () {
    return view('clinicianManage');
});

Route::get('/clinicianSupportMessage', function () {
    $patients = Patient::all();

    return view('clinicianSupportMessage',compact('patients'));
});

Route::get('/newPatient', function () {
    return view('newPatient');
});

Route::get('/individualSupportMessage', function () {

    return view('individualSupportMessage');
});

Route::get('/notFound', function () {
    return view('notFound');
});

Route::get('/patientComments', function () {
    return view('patientComments');
});

Route::get('/patientDashboard', function () {
    return view('patientDashboard');
});

Route::resource('/notes', NoteController::class);

// Route::get('/patientOverview', function () {
    
//     $notes = Note::latest()->paginate(5);
//     return view('patientOverview',compact('notes'));
// });