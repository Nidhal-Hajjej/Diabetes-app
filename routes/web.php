<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\NoteController;
use App\Models\Measurement;
use App\Models\Note;
use App\Models\Patient;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChartJSController;

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


// Route::post('/login', function () {
//     return view('login');
// })->name('login');;

// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/logout', function () {
//     Auth::logout();
//     return redirect('/login');
// })->name('logout');
Route::post('/logout', function () {
    Session::flush();
    Auth::logout();
    return redirect()->route('login');
})->name('logout');




Route::get('/signup', function () {
    return view('signup');
});

Route::post('/signup', [FormController::class, 'processForm'])->name('signup.processForm');

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

Route::get('/clinician/create', function () {
    return view('clinicianCreate');
});

Route::get('/clinicianDashboard', function () {
    return view('clinicianDashboard');
});

Route::get('/clinicianManage', function () { // nel8oha
    return view('clinicianManage');
});

Route::get('/clinicianSupportMessage', function () {
    $patients = Patient::where('doctor_id', 1)->get();

    return view('clinicianSupportMessage', compact('patients'));
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


Route::get('/forgot-password', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/forgot-password', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');


// Route::get('/patientOverview', function () {

//     $notes = Note::latest()->paginate(5);
//     return view('patientOverview',compact('notes'));
// });
Route::resource('/doc', DoctorController::class);

Route::get('/diabetes', 'App\Http\Controllers\DiabetesController@index');
Route::post('/diabetes', 'App\Http\Controllers\DiabetesController@index');

