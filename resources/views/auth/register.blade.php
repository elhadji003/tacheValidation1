@extends('base')

@section('title', 'Register')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-2xl bg-white rounded-lg shadow-xl p-6">
            <h2 class="text-2xl font-bold text-gray-700 text-center">Créer un compte</h2>
            <form action="{{ route('app.register') }}" method="POST" enctype="multipart/form-data" class="mt-6">
                @csrf

                <!-- Name Input -->
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" name="name" id="name"
                        class="peer block w-full px-2.5 pb-2.5 pt-4 text-sm text-gray-900 bg-transparent border-2 border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500"
                        placeholder=" " required />
                    <label for="name"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-placeholder-shown:translate-y-2.5 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-4 left-2">
                        Nom complet
                    </label>
                    @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email and Phone Inline -->
                <div class="flex gap-4">
                    <!-- Email Input -->
                    <div class="relative z-0 mb-6 w-1/2 group">
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

                    <!-- Phone Input -->
                    <div class="relative z-0 mb-6 w-1/2 group">
                        <input type="text" name="phone" id="phone"
                            class="peer block w-full px-2.5 pb-2.5 pt-4 text-sm text-gray-900 bg-transparent border-2 border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500"
                            placeholder=" " required />
                        <label for="phone"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-placeholder-shown:translate-y-2.5 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-4 left-2">
                            Téléphone
                        </label>
                        @error('phone')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Address Input -->
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" name="address" id="address"
                        class="peer block w-full px-2.5 pb-2.5 pt-4 text-sm text-gray-900 bg-transparent border-2 border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500"
                        placeholder=" " required />
                    <label for="address"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-placeholder-shown:translate-y-2.5 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-4 left-2">
                        Adresse
                    </label>
                    @error('address')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password and Confirmation Inline -->
                <div class="flex gap-4">
                    <!-- Password Input -->
                    <div class="relative z-0 mb-6 w-1/2 group">
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

                    <!-- Password Confirmation Input -->
                    <div class="relative z-0 mb-6 w-1/2 group">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="peer block w-full px-2.5 pb-2.5 pt-4 text-sm text-gray-900 bg-transparent border-2 border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500"
                            placeholder=" " required />
                        <label for="password_confirmation"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-placeholder-shown:translate-y-2.5 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-4 left-2">
                            Confirmez le mot de passe
                        </label>
                        @error('password_confirmation')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Profile Image Input -->
                <div class="relative z-0 mb-6 w-full group">
                    <input type="file" name="profile_image" id="profile_image"
                        class="peer block p-2 w-full text-sm text-gray-900 border-2 border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500"
                        placeholder=" " />
                    @error('profile_image')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full px-4 py-2 text-white bg-gray-800 hover:bg-gray-700 focus:ring-gray-300 rounded-lg font-semibold">
                    S'inscrire
                </button>
            </form>

            <div class="mt-4 text-center">
                <p class="text-sm text-gray-500">
                    Vous avez déjà un compte ? <a href="{{ route('app.loginForm') }}"
                        class="text-gray-500 hover:underline">Connectez-vous</a>
                </p>
            </div>
        </div>
    </div>
@endsection
