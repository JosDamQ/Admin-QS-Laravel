@can('customers.store')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create Customer') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form method="POST" action="{{ route('customers.store') }}" class="bg-slate-700 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-white-700 text-sm font-bold mb-2">
                                    Name
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="Name">
                                @error('name') <span style="color: rgb(155, 22, 22);">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-6">
                                <label for="surname" class="block text-white-700 text-sm font-bold mb-2">
                                    Surname
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="surname" name="surname" type="text" placeholder="Surname">
                                @error('description') <span style="color: rgb(155, 22, 22);">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-6">
                                <label for="email" class="block text-white-700 text-sm font-bold mb-2">
                                    Email
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="text" placeholder="Email">
                                @error('email') <span style="color: rgb(155, 22, 22);">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-6">
                                <label for="phone" class="block text-white-700 text-sm font-bold mb-2">
                                    Phone
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" name="phone" type="text" placeholder="Phone">
                                @error('phone') <span style="color: rgb(155, 22, 22);">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-6">
                                <label for="password" class="block text-white-700 text-sm font-bold mb-2">
                                    Password
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="Password">
                                @error('password') <span style="color: rgb(155, 22, 22);">{{ $message }}</span> @enderror
                            </div>
                            <div class="flex space-x-4">
                                <x-primary-button>
                                    Create
                                </x-primary-button>
                                <a href="{{ route('customers.index') }}" class="text-white bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded-md text-sm font-semibold">Back</a>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@endcan