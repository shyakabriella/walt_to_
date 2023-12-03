<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\SkeduleController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\PermissionController;
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

  
Route::get('/', [PageController::class, 'homepage'])->name('/');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/service', [PageController::class, 'service'])->name('service');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/event', [PageController::class, 'event'])->name('event');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() {
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('event', EventController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('requirements', RequirementController::class);
Route::resource('skedules', SkeduleController::class);
Route::resource('apply', ApplicationController::class);
});

