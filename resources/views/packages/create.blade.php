<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Package') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('packages.store') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        @csrf
                        <div class="mb-4">
                            <label for="tracking" class="block text-gray-700 text-sm font-bold mb-2">
                                Tracking
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tracking" name="tracking" type="text" placeholder="Tracking">
                            @error('tracking') <span style="color: rgb(155, 22, 22);">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-6">
                            <label for="weight" class="block text-gray-700 text-sm font-bold mb-2">
                                Weight
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="weight" name="weight" type="text" placeholder="Weight">
                            @error('weight') <span style="color: rgb(155, 22, 22);">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-6">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">
                                Description
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" type="text" placeholder="Description">
                            @error('description') <span style="color: rgb(155, 22, 22);">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-6">
                            <label for="customer_id" class="block text-gray-700 text-sm font-bold mb-2">
                                Customer
                            </label>
                            <select name="customer_id" id="customer_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                            @error('customer_id') <span style="color: rgb(155, 22, 22);">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="mb-6">
                            <label for="status_id" class="block text-gray-700 text-sm font-bold mb-2">
                                Status
                            </label>
                            <select name="status_id" id="status_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                            @error('status_id') <span style="color: rgb(155, 22, 22);">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="flex space-x-4">
                            <x-primary-button>
                                Create
                            </x-primary-button>
                            <a href="{{ route('packages.index') }}" class="text-white bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded-md text-sm font-semibold">Back</a>    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>