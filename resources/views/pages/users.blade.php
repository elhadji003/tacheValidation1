@extends('base')

@section('title', 'Users')

@section('content')
    @include('components.navbar')

    <div class="min-h-screen bg-gray-100 py-10">
        <div class="container mx-auto px-6">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Liste des Utilisateurs</h1>
                <p class="text-gray-600 mt-2">Vous pouvez voir les détails des utilisateurs ou les ajouter en tant qu'amis.
                </p>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded-lg">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Nom</th>
                            <th class="py-3 px-6 text-left">Email</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm">
                        @foreach ($users as $user)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            @if (Auth::user()->profile_image)
                                                <img class="w-8 h-8 rounded-full"
                                                    src="{{ asset('storage/' . Auth::user()->profile_image) }}"
                                                    alt="Avatar">
                                            @else
                                                👤
                                            @endif

                                        </div>
                                        <span>{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    {{ $user->email }}
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center space-x-4">
                                        <!-- Bouton Voir Détails -->
                                        <button onclick="alert('cette fonctionnalité n\'est pas encore disponible')"
                                            class="text-blue-500
                                            hover:text-blue-600 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12h.01M12 12h.01M9 12h.01M7 16h10M5 8h14m-7 0v8m0-8l4 4m-4-4L8 12" />
                                            </svg>
                                            <span class="ml-2">Voir</span>
                                        </button>

                                        <!-- Bouton Ajouter Ami -->
                                        <button onclick="alert('Ajouté comme ami !')"
                                            class="text-green-500 hover:text-green-600 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                            </svg>
                                            <span class="ml-2">Ajouter</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
