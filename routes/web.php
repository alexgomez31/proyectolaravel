<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\ProfesoresController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController; 

use Illuminate\Support\Facades\Route;

Auth::routes(['register' => true]); //para desactivar el registro de usuario.

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource('curso', CursosController::class)->middleware('auth');
Route::resource('profe', ProfesoresController::class)->middleware('auth');
Route::resource('alumno', AlumnosController::class)->middleware('auth');

//usuarios
Route::resource('perfil', UserController::class)->middleware('auth');
Route::get('/vista',  [UserController::class,'vista'])->name('vista')->middleware('auth');
Route::put('/actualizar', [UserController::class,'actualizar'])->name('actualizar')->middleware('auth');


Route::get('excel/exportAlumnos', 'App\Http\Controllers\AlumnosController@exportAlumnos')->name("exportAlumnos")->middleware('auth');


Route::get('/NewPassword',  [SettingsController::class,'NewPassword'])->name('NewPassword')->middleware('auth');
Route::post('/change/password',  [SettingsController::class,'changePassword'])->name('changePassword');


// routes/web.php
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');



Route::get('/clear-cache', function () {
    echo Artisan::call('config:clear');
    echo Artisan::call('config:cache');
    echo Artisan::call('cache:clear');
    echo Artisan::call('route:clear');
 });
 
//Route::get('dashboard', 'AppHttpControllersUserController@dashboard')->middleware('auth');
//Route::get("/gestionarMedicos", [PersonaController::class,"mostrarMedicos"])->name("personaMostrarMedicos")->middleware("auth","firstLogin","role:administrador");


