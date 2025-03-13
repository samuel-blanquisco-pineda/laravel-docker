@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Configuración del Cron Job</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('cron_jobs.update') }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="frequency">Frecuencia de ejecución:</label>
            <select name="frequency" class="form-control">
                <option value="everyMinute" {{ $cronJob->frequency == 'everyMinute' ? 'selected' : '' }}>Cada minuto</option>
                <option value="everyFiveMinutes" {{ $cronJob->frequency == 'everyFiveMinutes' ? 'selected' : '' }}>Cada 5 minutos</option>
                <option value="hourly" {{ $cronJob->frequency == 'hourly' ? 'selected' : '' }}>Cada hora</option>
                <option value="dailyAt" {{ $cronJob->frequency == 'dailyAt' ? 'selected' : '' }}>Diario a las 08:00</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection