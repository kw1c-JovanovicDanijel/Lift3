<x-layouts.app>
    <div class="max-w-4xl mx-auto p-6">

        <div class="mb-6">
            <a href="{{ route('events.index') }}" class="text-blue-600 hover:underline">
                ← Terug naar agenda
            </a>
        </div>

        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-6">Nieuw event aanmaken</h1>

            <form method="POST" action="{{ route('events.store') }}" class="space-y-6">
                @csrf

                <!-- Hidden user_id -->
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                <!-- Titel -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Titel</label>
                    <input type="text"
                           name="title"
                           value="{{ old('title') }}"
                           placeholder="Bijv. Teamvergadering"
                           class="w-full border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200"
                           required>

                    @error('title')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Datum -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Datum</label>
                    <input type="date"
                           name="date"
                           value="{{ old('date') }}"
                           class="w-full border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200"
                           required>

                    @error('date')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Acties -->
                <div class="flex gap-3 pt-4">
                    <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Opslaan
                    </button>

                    <a href="{{ route('events.index') }}"
                       class="px-6 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                        Annuleren
                    </a>
                </div>
            </form>
        </div>

    </div>
</x-layouts.app>
