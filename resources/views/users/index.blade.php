<x-layouts.app>
    <x-layouts.nav />

    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Overzicht</h1>

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">
                        Naam
                    </th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">
                        Aantal
                    </th>
                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-700">
                        Bekijken
                    </th>
                </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                @forelse ($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">
                            {{ $user->name }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $user->events->count() }}
                        </td>

                        <td class="px-4 py-3 text-center">
                            <a href="{{ route('users.show', $user) }}"
                               class="inline-block px-3 py-1 text-sm text-white bg-blue-600 rounded hover:bg-blue-700">
                                Bekijken
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-6 text-center text-gray-500">
                            Geen resultaten gevonden
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-layouts.app>
