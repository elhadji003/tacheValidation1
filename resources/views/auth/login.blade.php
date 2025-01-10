@extends('base')
@section('title', 'Login')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md bg-white rounded-lg shadow-xl p-6">
            <h2 class="text-2xl font-bold text-gray-700 text-center">Connexion</h2>
            <form action="{{ route('app.login') }}" method="POST" class="mt-6">
                @csrf
                <!-- Email Input -->
                <div class="relative z-0 mb-6 w-full group">
                    <input type="email" name="email" id="email"
                        class="peer block w-full px-2.5 pb-2.5 pt-4 text-sm text-gray-900 bg-transparent border-2 border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500"
                        placeholder=" " required />
                    <label for="email"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-placeholder-shown:translate-y-2.5 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-4 left-2">
                        Email
                    </label>
                    @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="relative z-0 mb-6 w-full group">
                    <input type="password" name="password" id="password"
                        class="peer block w-full px-2.5 pb-2.5 pt-4 text-sm text-gray-900 bg-transparent border-2 border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500"
                        placeholder=" " required />
                    <label for="password"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-placeholder-shown:translate-y-2.5 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-4 left-2">
                        Mot de passe
                    </label>
                    @error('password')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full px-4 py-2 text-white bg-gray-800 hover:bg-gray-700 focus:ring-gray-300 rounded-lg font-semibold">
                    Se connecter
                </button>
            </form>

            <div class="mt-4 text-center">
                <p class="text-sm text-gray-500">
                    Vous n'avez pas encore de compte ? <a href="{{ route('app.registerForm') }}"
                        class="text-gray-500 hover:underline">Créer un compte</a>
                </p>
            </div>
        </div>
    </div>
@endsection
