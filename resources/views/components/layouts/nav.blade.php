<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- Menu items -->
            <div class="hidden md:flex space-x-6 items-center">
                <a href="{{ route('events.index') }}" class="text-gray-700 hover:text-blue-600 font-medium">
                    Agenda
                </a>

                @auth
                    <span class="text-gray-700">Welkom, {{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                       class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Login
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
