<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\WelcomeComponent;
use App\Http\Livewire\Admin\UsersComponent;
use App\Http\Livewire\Admin\AdmissionRequest;
use App\Http\Livewire\Admin\Translations;
use App\Http\Livewire\Admin\UserInfoComponent;
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

Route::get('/',  WelcomeComponent::class)->name('welcome');


Route::get('/middleware', function(){
    if (auth()->user()->role == 'admin' ) {
        return redirect()->route('admin.users');
    }else{
        return redirect()->route('user.dashboard');
    }
})->middleware(['auth']);

// User routes
Route::get('/user/dashboard', UserDashboardComponent::class)->middleware(['auth'])->name('user.dashboard');
Route::get('/user/studies/profile',  UserAdmissionProfile::class)->middleware(['auth'])->name('studies.profile');
Route::get('/user/studies/admisions',  UserAdmissionRequest::class)->middleware(['auth'])->name('studies.admission');
Route::get('/user/translate-legalize', UserTranslateLegalizeComponent::class)->middleware(['auth'])->name('user.translate_legalize');

// Admin routes
Route::get('/admin/users', UsersComponent::class)->middleware(['auth', 'admin'])->name('admin.users');
Route::get('/admin/{user}/info', UserInfoComponent::class)->middleware(['auth', 'admin'])->name('admin.user.info');
Route::get('/admin/requests/admission', AdmissionRequest::class)->middleware(['auth', 'admin'])->name('admin.requests.admission');
Route::get('/admin/requests/translation', Translations::class)->middleware(['auth', 'admin'])->name('admin.requests.translation');

require __DIR__.'/auth.php';
