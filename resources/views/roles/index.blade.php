<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-between items-center mb-4">
                <!-- Botón para crear un nuevo role -->
                @can('roles.create')
                    <a href="{{ route('roles.create') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crete Role</a>
                @endcan
                </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
        <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created_At
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Updated_At
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $role->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $role->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $role->created_at }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $role->updated_at }}
                                </td>
                                <td class="px-6 py-4">
                                    <x-dropdown>
                                        <x-slot name="trigger">
                                            <button class="text-sm btn-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                                </svg>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            @can('roles.edit')
                                                <x-dropdown-link :href="route('roles.edit', $role)">
                                                    Edit
                                                </x-dropdown-link>
                                            @endcan
                                            @can('roles.destroy')
                                                <form method="POST" action="{{ route('roles.destroy', $role) }}">
                                                    @csrf @method('DELETE')
                                                    <x-dropdown-link :href="route('roles.destroy', $role)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                        Delete
                                                    </x-dropdown-link>
                                                </form>
                                            @endcan
                                        </x-slot>
                                    </x-dropdown>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        </div>
    </div>
</x-app-layout>