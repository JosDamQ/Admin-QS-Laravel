<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Status') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-between items-center mb-4">
                <!-- Botón para crear un nuevo status -->
                <a href="{{ route('status.create') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear Nuevo Status</a>
            
                <!-- Formulario de búsqueda -->
                <form action="{{ route('status.index') }}" method="GET" class="inline-block">
                    <div class="flex">
                        <input type="text" name="search" placeholder="Buscar por nombre" class="border-gray-300 focus:ring-blue-500 focus:border-blue-500 block w-full rounded-md sm:text-sm">
                        <button type="submit" class="ml-2 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Buscar</button>
                    </div>
                </form>
                
                <button>
                    <a href="{{ route('status.index') }}" class="text-white bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded-md text-sm font-semibold">All</a>
                </button>
            </div>
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
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Order
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
                        @foreach ($statuses as $status)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $status->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $status->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $status->description }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $status->order }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $status->created_at }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $status->updated_at }}
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
                                            <x-dropdown-link :href="route('status.edit', $status)">
                                                Edit 
                                            </x-dropdown-link>
                                            <form method="POST" action="{{ route('status.destroy', $status)}}">
                                                @csrf @method('DELETE')
                                                <x-dropdown-link :href="route('status.destroy', $status)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                    Delete 
                                                </x-dropdown-link>
                                            </form>                                          
                                            
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
</x-app-layout>
