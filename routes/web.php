<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\WelcomeComponent;
use App\Http\Livewire\User\UserAdmissionProfile;
use App\Http\Livewire\User\UserAdmissionRequest;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserTranslateLegalizeComponent;

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

Route::get('/php-info', function(){
    return phpinfo();
})->name('phpinfo');

Route::get('/',  WelcomeComponent::class)->name('welcome'); 

Route::get('/dashboard', UserDashboardComponent::class)->middleware(['auth'])->name('user.dashboard');
Route::get('/studies/profile',  UserAdmissionProfile::class)->middleware(['auth'])->name('studies.profile');
Route::get('/studies/admisions',  UserAdmissionRequest::class)->middleware(['auth'])->name('studies.admission');
Route::get('/translate-legalize', UserTranslateLegalizeComponent::class)->middleware(['auth'])->name('user.translate_legalize');

require __DIR__.'/auth.php';
