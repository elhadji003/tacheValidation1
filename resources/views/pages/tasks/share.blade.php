@extends('base')
@section('title', 'Partager une tâche')

@section('content')
    @include('components.navbar')

    <div class="container mx-auto p-6">
        <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-lg overflow-hidden">
            <!-- En-tête -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-8 text-center">
                <h2 class="text-4xl font-semibold text-white">Partager une tâche</h2>
                <p class="text-lg text-white mt-2">Partagez cette tâche avec un autre utilisateur</p>
            </div>

            <!-- Corps de la page -->
            <div class="p-8 bg-gray-50">
                <form action="{{ route('taches.share', $tache) }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="user_id" class="block text-gray-700 font-medium mb-2">Sélectionner un
                            utilisateur</label>
                        <select name="user_id" id="user_id" class="w-full p-3 border border-gray-300 rounded-lg">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                            Partager la tâche
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
