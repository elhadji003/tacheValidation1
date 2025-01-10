@extends('base')

@section('title', 'Tâches')

@section('content')
    @include('components.navbar')

    <h1 class="text-3xl p-2 font-bold mb-4">Liste des Tâches</h1>
    <a href="{{ route('taches.create') }}" class="bg-gray-600 text-white m-2 py-2 px-4 rounded">Ajouter une tâche</a>

    <table class="table-auto w-full mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Titre</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Propriétaire</th>
                <th class="px-4 py-2">Actions</th>
                <th class="px-4 py-2">Partager</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($taches as $tache)
                <tr class="border-t text-center">
                    <td class="px-4 py-2">{{ $tache->title }}</td>
                    <td class="px-4 py-2">{{ $tache->description }}</td>
                    <td class="px-4 py-2">{{ $tache->user->name }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('taches.show', $tache) }}" class="text-blue-500">Voir</a>
                        @can('update', $tache)
                            <a href="{{ route('taches.edit', $tache) }}" class="text-green-500 ml-2">Modifier</a>
                        @endcan
                        @can('delete', $tache)
                            <form action="{{ route('taches.delete', $tache) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-2">Supprimer</button>
                            </form>
                        @endcan
                    </td>
                    <td class="px-4 py-2"><a href="{{ route('taches.share.form', $tache) }}">Partager</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
