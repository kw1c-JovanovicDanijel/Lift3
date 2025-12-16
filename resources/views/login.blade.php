<x-layouts.app>
    <div class="min-h-screen flex items-center justify-center bg-gray-50">
        <div class="bg-white shadow-lg rounded-lg p-10 max-w-md w-full">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Login</h1>
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autofocus
                           class="w-full border-2 border-black rounded px-3 py-2 focus:ring focus:ring-blue-200">
                    @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Wachtwoord</label>
                    <input type="password"
                           name="password"
                           required
                           class="w-full border-2 border-black rounded px-3 py-2 focus:ring focus:ring-blue-200">
                    @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit"
                            class="w-full px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
