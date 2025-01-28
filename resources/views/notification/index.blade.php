<!-- resources/views/notifications/index.blade.php -->
@extends('base')

@section('title', 'Notifications')

@section('content')
    @include('components.navbar')

    <h1 class="text-3xl p-2 font-bold mb-4">Mes Notifications</h1>

    @if ($notifications->isEmpty())
        <p class="text-gray-500">Vous n'avez aucune notification.</p>
    @else
        <ul class="space-y-4">
            @foreach ($notifications as $notification)
                <li class="bg-white p-4 rounded shadow-md">
                    <a href="{{ route('taches.show', $notification->data['tache_id']) }}" class="text-blue-600">
                        {{ $notification->data['message'] }}
                    </a>
                    <span class="text-gray-500 text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
