<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CronJob;

class CronJobController extends Controller
{
    public function index()
    {
        $cronJob = CronJob::first() ?? new CronJob(['frequency' => 'hourly']);
        return view('cron_jobs.index', compact('cronJob'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'frequency' => 'required|string|in:everyMinute,everyFiveMinutes,hourly,dailyAt'
        ]);

        $cronJob = CronJob::firstOrCreate([]);
        $cronJob->frequency = $request->frequency;
        $cronJob->save();

        return redirect()->route('cron_jobs.index')->with('success', 'Frecuencia actualizada correctamente.');
    }
}