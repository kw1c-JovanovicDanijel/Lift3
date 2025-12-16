<x-layouts.app>
    <div class="max-w-4xl mx-auto p-6">

        <div class="mb-6">
            <a href="{{ route('events.index') }}" class="text-blue-600 hover:underline">
                ← Terug naar agenda
            </a>
        </div>

        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-3xl font-bold mb-6">{{ $event->title }}</h1>

            <div class="space-y-4 text-gray-700">
                <div>
                    <span class="block text-sm font-semibold text-gray-500">Datum</span>
                    <span class="text-lg">{{ $event->date->format('d-m-Y') }}</span>
                </div>

                <div>
                    <span class="block text-sm font-semibold text-gray-500">Eigenaar</span>
                    <span class="text-lg">{{ $event->user->name }}</span>
                </div>

                <div>
                    <span class="block text-sm font-semibold text-gray-500">Aangemaakt op</span>
                    <span class="text-lg">{{ $event->created_at->format('d-m-Y H:i') }}</span>
                </div>
            </div>
        </div>

    </div>
</x-layouts.app>
