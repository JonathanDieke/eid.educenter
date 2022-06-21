<?php

use App\Http\Livewire\User\UserDashboardComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\WelcomeComponent;

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
// Route::get('/student-profile',  WelcomeComponent::class)->name('student.profile');
// Route::get('/student-admision',  WelcomeComponent::class)->name('student.admission');

Route::get('/dashboard', UserDashboardComponent::class)->middleware(['auth'])->name('user.dashboard');

require __DIR__.'/auth.php';
