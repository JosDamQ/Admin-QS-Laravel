<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Packages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('packages.create')}}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md mb-4 inline-block">Create Package</a>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-8 py-3">
                                        Id
                                    </th>
                                    <th scope="col" class="px-8 py-3">
                                        tracking
                                    </th>
                                    <th scope="col" class="px-8 py-3">
                                        weight
                                    </th>
                                    <th scope="col" class="px-8 py-3">
                                        description
                                    </th>
                                    <th scope="col" class="px-8 py-3">
                                        Csutomer
                                    </th>
                                    <th scope="col" class="px-8 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-8 py-3">
                                        Created_At
                                    </th>
                                    <th scope="col" class="px-8 py-3">
                                        Updated_At
                                    </th>
                                    <th scope="col" class="px-8 py-3">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($packages as $package)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $package->id }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $package->tracking }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $package->weight }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $package->description }}
                                        </td>
                                        <td class="px-6 py-4">
                                            
                                            {{ $package->customer->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            
                                            {{ $package->status->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $package->created_at }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $package->updated_at }}
                                        </td>
                                        <td>
                                            <x-dropdown>
                                                <x-slot name="trigger">
                                                    <button class="text-sm btn-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                                        </svg>
                                                    </button>
                                                </x-slot>
                                                <x-slot name="content">
                                                    <x-dropdown-link :href="route('packages.edit', $package)">
                                                        Edit 
                                                    </x-dropdown-link>
                                                    <form method="POST" action="{{ route('packages.destroy', $package)}}">
                                                        @csrf @method('DELETE')
                                                        <x-dropdown-link :href="route('packages.destroy', $package)" onclick="event.preventDefault(); this.closest('form').submit()">
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
        </div>
    </div>
</x-app-layout>