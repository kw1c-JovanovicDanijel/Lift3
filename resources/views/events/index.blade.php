<x-layouts.app>
    <x-layouts.nav />
    @php
        $user = auth()->user();
        $role = \App\Enums\UserRoles::from($user->role);
        $perms = $role->allowed();
    @endphp
    <div class="max-w-6xl mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Agenda</h1>

            @if($perms['create'])
                <a href="{{ route('events.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Nieuw event
                </a>
            @endif
        </div>

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Titel</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Datum</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Eigenaar</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-700">Acties</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @forelse ($events as $event)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $event->title }}</td>
                        <td class="px-4 py-3">{{ $event->date->format('d-m-Y') }}</td>
                        <td class="px-4 py-3">{{ $event->user->name }}</td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center items-center gap-3">
                                @if($perms['read'])
                                    <a href="{{ route('events.show', $event) }}" class="px-3 py-1 text-sm text-white bg-blue-600 rounded hover:bg-blue-700">
                                        Bekijken
                                    </a>
                                @endif

                                @if($perms['update'])
                                    <a href="{{ route('events.edit', $event) }}" class="px-3 py-1 text-sm text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                        Bewerken
                                    </a>
                                @endif

                                @if($perms['delete'])
                                    <form action="{{ route('events.destroy', $event) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit event wilt verwijderen?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 text-sm text-white bg-red-600 rounded hover:bg-red-700">
                                            Verwijderen
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                            Geen events gevonden
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                {{ $events->links() }}
            </div>
        </div>
    </div>
</x-layouts.app>
