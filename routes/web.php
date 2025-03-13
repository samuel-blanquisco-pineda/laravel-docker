<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CronJobController; 

Route::get('/', function () {
    return "hello world";
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cron-jobs', [CronJobController::class, 'index'])->name('cron_jobs.index');
Route::put('/cron-jobs', [CronJobController::class, 'update'])->name('cron_jobs.update');
