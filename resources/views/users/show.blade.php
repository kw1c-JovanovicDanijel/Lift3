<x-layouts.app>
    <x-layouts.nav />

    <div class="max-w-4xl mx-auto p-6">

        <div class="mb-6">
            <a href="{{ route('users.index') }}" class="text-blue-600 hover:underline">
                ← Terug
            </a>
        </div>

        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-3xl font-bold mb-6">
                {{ $user->name }}
            </h1>

            <div class="space-y-6">
                <h2 class="text-xl font-semibold text-gray-700">
                    Evenementen
                </h2>

                @forelse($user->events as $event)
                    <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">
                                    {{ $event->title }}
                                </h3>
                                <p class="text-gray-600">
                                    {{ $event->date->format('d-m-Y') }}
                                </p>
                            </div>

                            <a href="{{ route('events.show', $event) }}"
                               class="px-4 py-2 text-sm text-white bg-blue-600 rounded hover:bg-blue-700">
                                Bekijken
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">
                        Geen evenementen gevonden voor deze gebruiker.
                    </p>
                @endforelse
            </div>
        </div>

    </div>
</x-layouts.app>
