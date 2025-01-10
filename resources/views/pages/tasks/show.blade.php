@extends('base')
@section('title', 'Détails de la tâche')

@section('content')
    @include('components.navbar')

    <div class="container mx-auto p-6">
        <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-lg overflow-hidden">
            <!-- En-tête -->
            <div class="bg-gradient-to-r from-gray-400 to-gray-600 p-8 text-center">
                <h2 class="text-4xl font-semibold text-white">Détails de la tâche</h2>
                <p class="text-lg text-white mt-2">Informations sur la tâche</p>
            </div>

            <!-- Corps de la page -->
            <div class="p-8 bg-gray-50">
                <!-- Affichage du message de succès, si présent -->
                @if (session('success'))
                    <div class="bg-green-500 text-white p-4 rounded-md mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Informations de la tâche -->
                <div class="flex gap-6 mb-3">
                    <!-- Titre -->
                    <div class="w-1/2 p-6 bg-white shadow-md rounded-lg border border-gray-200">
                        <h3 class="text-xl font-medium text-gray-800">Createur</h3>
                        <p class="text-gray-600">{{ $tache->user->name }}</p>
                        <p class="text-gray-600 font-bold">Crée le {{ $tache->user->created_at }}</p>
                    </div>

                    <!-- Description -->
                    <div class="w-1/2 p-6 bg-white shadow-md rounded-lg border border-gray-200">
                        <h3 class="text-xl font-medium text-gray-800">Titre</h3>
                        <p class="text-gray-600">{{ $tache->title }}</p>
                    </div>
                </div>

                <div class="w-full mb-3 p-6 bg-white shadow-md rounded-lg border border-gray-200">
                    <h3 class="text-xl font-medium text-gray-800">Description</h3>
                    <p class="text-gray-600">{{ $tache->description }}</p>
                </div>

                <div class="p-6 bg-white shadow-md rounded-lg border border-gray-200">
                    <h3 class="text-xl font-medium text-gray-800">Image</h3>
                    @if ($tache->tache_image)
                        <img src="{{ asset('storage/' . $tache->tache_image) }}" alt="Image de la tâche">
                    @endif
                </div>



                <!-- Bouton de retour -->
                <div class="mt-8 text-center">
                    <a href="{{ route('taches.index') }}"
                        class="px-6 py-3 bg-gray-600 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700">
                        Retour à la liste des tâches
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
