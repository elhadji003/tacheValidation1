<div class="w-full bg-gray-800 text-gray-200">
    <div x-data="{ open: false }"
        class="mx-auto flex max-w-screen-xl flex-col px-4 md:flex-row md:items-center md:justify-between md:px-6 lg:px-8">
        <div class="flex flex-row items-center justify-between p-4">
            <a href="#"
                class="focus:shadow-outline rounded-lg text-lg font-semibold uppercase tracking-widest text-white focus:outline-none">LaravelTuts.com</a>
            <button class="focus:shadow-outline rounded-lg focus:outline-none md:hidden" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                    <path x-show="!open" fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <nav :class="{ 'flex': open, 'hidden': !open }"
            class="hidden flex-grow flex-col pb-4 md:flex md:flex-row md:justify-end md:pb-0">
            <a class="focus:shadow-outline mt-2 rounded-lg bg-gray-700 px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0"
                href="{{ route('taches.index') }}">Mes taches</a>
            <a class="focus:shadow-outline mt-2 rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0 md:ml-4"
                href="{{ route('app.users') }}">Utilisateurs</a>
            <a class="focus:shadow-outline mt-2 rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0 md:ml-4"
                href="#">About</a>
            <a class="focus:shadow-outline mt-2 rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-gray-200 hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0 md:ml-4"
                href="#">Contact</a>
            <a class="focus:shadow-outline mt-2 rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-gray-200 hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0 md:ml-4"
                href="{{ route('taches.all') }}">Les taches</a>
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="focus:shadow-outline mt-2 flex w-full flex-row items-center rounded-lg bg-transparent px-4 py-2 text-left text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0 md:ml-4 md:inline md:w-auto">
                    <span>{{ Auth::user()->name }}</span>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }"
                        class="mt-1 ml-1 inline h-4 w-4 transform transition-transform duration-200 md:-mt-1">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    class="absolute right-0 mt-2 w-full origin-top-right rounded-md shadow-lg md:w-48">
                    <div class="rounded-md bg-gray-800 px-2 py-2 shadow">
                        <a class="focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-gray-200 hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0"
                            href="#">Profile</a>
                        <a class="focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-gray-200 hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0"
                            href="#">Paramétre</a>

                        <form method="POST" action="{{ route('logout') }}"
                            class="focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-gray-200 hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0">
                            @csrf
                            <button>Déconnecter</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
