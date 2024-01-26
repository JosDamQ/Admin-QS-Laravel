<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Status') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="w-full h-full"> <!-- Elimina la clase max-w-xs -->            
                        <form method="POST" action="/status" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full h-full">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                    Name
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="Name">
                                @error('name') <span style="color: rgb(155, 22, 22);">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-6">
                                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">
                                    Description
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" type="text" placeholder="description">
                                @error('description') <span style="color: rgb(155, 22, 22);">{{ $message }}</span> @enderror
                            </div>
                            <div class="flex items-center justify-between">
                                <x-primary-button>
                                    Create
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
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
