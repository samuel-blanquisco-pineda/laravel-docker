<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Weather;

class FetchWeather extends Command
{
    protected $signature = 'weather:fetch';
    protected $description = 'Obtiene el clima actual desde una API pública';

    public function handle()
    {
        $lat = 40.4168;
        $lon = -3.7038;

        $url = "https://wttr.in/Madrid?format=j1";
        $response = Http::get($url);

        if ($response->successful()) {
            $weatherData = $response->json()['current_condition'][0];
        
            Weather::create([
                'temperature' => $weatherData['temp_C'],
                'windspeed' => $weatherData['windspeedKmph'],
                'timestamp' => now()
            ]);
        
            Log::info('Clima actualizado:', $weatherData);
            $this->info('Clima actualizado correctamente.');
        }
        else {
            $this->error('Error al obtener el clima.');
        }
    }
}
