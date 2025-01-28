@extends('base')

@section('title', 'Dashboard')

@section('content')
    @include('components.navbar')

    <div class="min-h-screen bg-gray-100 py-10">
        <div class="container mx-auto px-6">
            <!-- Dashboard Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Bienvenue sur votre Dashboard</h1>
                <p class="text-gray-600 mt-2">Gérez vos informations et suivez vos activités ici.</p>
            </div>

            <!-- Stats Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Utilisateurs Totaux</p>
                        <h2 class="text-3xl font-bold text-gray-800">{{ $userCount }}</h2>
                    </div>
                    <div class="bg-blue-100 p-4 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Nouveaux Messages</p>
                        <h2 class="text-3xl font-bold text-gray-800">45</h2>
                    </div>
                    <div class="bg-green-100 p-4 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 17l4-4m0 0l-4-4m4 4H3"></path>
                        </svg>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Nombre de tâches créées</p>
                        <h2 class="text-3xl font-bold text-gray-800">13</h2>
                    </div>
                    <div class="bg-yellow-100 p-4 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-yellow-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 17l4-4m0 0l-4-4m4 4H3"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Notifications Section -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Notifications</h3>
                @if (auth()->user()->notifications->count() > 0)
                    <ul class="space-y-4">
                        @foreach (auth()->user()->notifications as $notification)
                            <li class="flex items-center justify-between">
                                <p class="text-gray-700">{{ $notification->data['message'] }}</p>
                                <div class="flex items-center space-x-4">
                                    <a href="{{ route('taches.show', $notification->data['task_id']) }}"
                                        class="text-sm text-blue-500">
                                        Voir la tâche
                                    </a>
                                    <form method="POST" action="{{ route('notifications.read', $notification->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-sm text-gray-500">Marquer comme lu</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-600">Aucune nouvelle notification.</p>
                @endif
            </div>

            <!-- Recent Activity Section -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Activités Récentes</h3>
                <ul class="space-y-4">
                    <li class="flex items-center justify-between">
                        <p class="text-gray-700">Connexion de l'utilisateur à 10:45 AM</p>
                        <span class="text-sm text-gray-500">Aujourd'hui</span>
                    </li>
                    <li class="flex items-center justify-between">
                        <p class="text-gray-700">Changement de mot de passe à 9:30 AM</p>
                        <span class="text-sm text-gray-500">Hier</span>
                    </li>
                    <li class="flex items-center justify-between">
                        <p class="text-gray-700">Création d'un nouveau projet à 4:15 PM</p>
                        <span class="text-sm text-gray-500">Il y a 2 jours</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
