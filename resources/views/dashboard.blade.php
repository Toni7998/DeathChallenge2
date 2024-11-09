@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="title">Bienvenido, {{ $user->name }}</h1>

    <div class="dashboard flex flex-col md:flex-row gap-6 justify-center">
        <!-- Tarjeta de Información del Usuario -->
        <div class="card user-info">
            <div class="card-header">
                <h5>Información del Usuario</h5>
            </div>
            <div class="card-body text-center">
                <img src="{{ $user->profile_picture }}" alt="Profile Picture" class="profile-pic">
                <h6>Nombre: <strong>{{ $user->name }}</strong></h6>
                <p>Correo: <strong>{{ $user->email }}</strong></p>
                <a href="{{ route('profile.edit') }}" class="btn">Editar Perfil</a>
            </div>
        </div>

        <!-- Tarjeta de Actividades Recientes -->
        <div class="card activities">
            <div class="card-header">
                <h5>Actividades Recientes</h5>
            </div>
            <div class="card-body">
                @if(empty($recentActivities))
                    <p class="text-center">No hay actividades recientes.</p>
                @else
                    <ul class="activity-list">
                        @foreach($recentActivities as $activity)
                            <li class="activity-item">
                                <span>{{ $activity->description }}</span>
                                <span
                                    class="activity-time">{{ \Carbon\Carbon::parse($activity->created_at)->diffForHumans() }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Estilos CSS -->
<style>
    .title {
        text-align: center;
        color: #333;
        margin-bottom: 40px;
    }

    .dashboard {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 40px;
    }

    .card {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 480px;
        transition: box-shadow 0.3s;
    }

    .card:hover {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .card-header {
        background-color: #007bff;
        color: white;
        padding: 20px;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        text-align: center;
    }

    .card-body {
        padding: 20px;
        text-align: center;
    }

    .profile-pic {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-bottom: 15px;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .activity-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .activity-item {
        padding: 10px;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
    }

    .activity-item:last-child {
        border-bottom: none;
    }

    .activity-time {
        color: #888;
        font-size: 0.9em;
    }
</style>
@endsection