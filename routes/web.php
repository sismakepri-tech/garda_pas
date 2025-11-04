<?php

use App\Http\Middleware\UPT;
use App\Http\Middleware\Kanwil;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UKEController;
use App\Http\Controllers\UPTController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KanwilController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('auth/login');
});


/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::get('/dashboard', [UserController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth','role:upt')->group(function () {
    Route::get('/upt/dashboard', [UPTController::class, 'dashboard'])->name('upt.dashboard');
    Route::get('/upt/odor', [UPTController::class, 'odor'])->name('upt.odor');
    Route::get('/upt/create',[UPTController::class,'create'])->name('upt.create');
    Route::post('/upt/odor',[UPTController::class,'store']);
    Route::delete('/upt/odor/{odor:id}',[UPTController::class,'destroy']);
    Route::get('/upt/odor/{odor:id}/edit',[UPTController::class,'edit']);
    Route::patch('/upt/odor/{odor:id}',[UPTController::class,'update']);
    Route::get('/upt/odor/{odor:id}',[UPTController::class,'show']);
});

Route::middleware('auth','role:kanwil')->group(function () {
    Route::get('/kanwil/dashboard', [KanwilController::class, 'dashboard'])->name('kanwil.dashboard');
    Route::get('/kanwil/odor', [KanwilController::class, 'odor'])->name('kanwil.odor');
    Route::get('/kanwil/create',[KanwilController::class,'create'])->name('kanwil.create');
    Route::post('/kanwil/odor',[KanwilController::class,'store']);
    Route::delete('/kanwil/odor/{odor:id}',[KanwilController::class,'destroy']);
    Route::get('/odor', [KanwilController::class, 'odor']);
    Route::get('/kanwil/odor/{odor:id}/edit',[KanwilController::class,'edit']);
    Route::patch('/kanwil/odor/{odor:id}',[KanwilController::class,'update']);
    Route::get('/kanwil/odor/{odor:id}',[KanwilController::class,'show']);
});

Route::middleware('auth','role:uke')->group(function () {
    Route::get('/uke/dashboard', [UKEController::class, 'dashboard'])->name('uke.dashboard');
    Route::get('/uke/odor', [UKEController::class, 'odor'])->name('uke.odor');
    Route::get('/uke/odor/{odor:id}',[UkeController::class,'show']);
    Route::get('/uke/users',[UKEController::class,'users'])->name('uke.users');
    Route::get('/uke/users/create',[UKEController::class,'createuser'])->name('uke-user.create');
    Route::post('/uke/users',[UKEController::class,'store'])->name('uke-user.store');
});


require __DIR__.'/auth.php';
