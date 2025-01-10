@extends('base')

@section('title', 'Créer une Tâche')

@section('content')
    @include('components.navbar')

    <div class="max-w-4xl mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-6">Modifier la Tâche</h1>

        <!-- Affiche les erreurs de validation -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulaire de création -->
        <form action="{{ route('taches.update', $tache->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded shadow-md">
            @csrf

            @method('PUT')

            <!-- Champ Titre -->
            <div class="mb-4">
                <label for="title" class="">Titre de la Tâche</label>
                <input type="text" name="title" id="title" value="{{ $tache->title }}"
                    class="peer block w-full px-2.5 pb-2.5 pt-2 text-sm text-gray-900 bg-transparent border-2 border-gray-300 rounded-lg appearance-none focus:outline-none">
            </div>

            <!-- Champ Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="peer block w-full px-2.5 pb-2.5 pt-2 text-sm text-gray-900 bg-transparent border-2 border-gray-300 rounded-lg appearance-none focus:outline-none">{{ $tache->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="is_complete" class="inline-flex items-center">
                    <input type="checkbox" name="is_complete" id="is_complete" class="form-checkbox text-blue-500"
                        value="1" {{ $tache->is_complete ? 'checked' : '' }}>
                    <span class="ml-2 text-gray-700">Marquer comme complétée</span>
                </label>
            </div>


            <!-- Champ Image -->
            <div class="mb-4">
                <label for="tache_image" class="block text-gray-700 font-medium mb-2">Image de la Tâche (Optionnel)</label>
                <input type="file" name="tache_image" id="tache_image"
                    class="w-full border-gray-300 rounded-lg shadow-sm">
            </div>

            <!-- Boutons -->
            <div class="flex items-center justify-between">
                <a href="{{ route('taches.index') }}"
                    class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">Annuler</a>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Modifier la
                    Tâche</button>
            </div>
        </form>
    </div>
@endsection
