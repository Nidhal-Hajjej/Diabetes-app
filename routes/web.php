<?php


use Illuminate\Support\Facades\Session;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MeasurementController;

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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

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

// Route::get('/patientDashboard',
// });

Route::resource('/notes', NoteController::class);


Route::get('/forgot-password', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/forgot-password', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

Route::get('/diabetes', 'App\Http\Controllers\DiabetesController@index');
Route::post('/diabetes', 'App\Http\Controllers\DiabetesController@index');


Route::resource('/doc', DoctorController::class);

Route::resource('/patientDashboard', PatientController::class);

Route::resource('/patientRecord', MeasurementController::class);

Route::post('/storeMeasurements', [MeasurementController::class, 'store']);

Route::resource('/addNewPatient', InvitationController::class);

Route::post('/invitation/accept/{invitation}', [InvitationController::class, 'accept'])->name('invitation.accept');
Route::post('/invitation/deny/{invitation}', [InvitationController::class, 'deny'])->name('invitation.deny');


Route::get('/prediction', function () {
    return view('prediction');
});
Route::get('/chatbot', function () {
    return view('chatbot');
});
Route::get('/diet', function () {
    return view('diet');
});