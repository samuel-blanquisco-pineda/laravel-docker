<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\FetchWeather;
use App\Models\CronJob;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
    })
    ->withExceptions(function (Exceptions $exceptions) {
    })
    ->booted(function (Application $app) { 
        $schedule = $app->make(Schedule::class);

        $cronJob = CronJob::first();
        $frequency = $cronJob->frequency ?? 'hourly';

        $schedule->command(FetchWeather::class)->$frequency();
    })
    ->create();
