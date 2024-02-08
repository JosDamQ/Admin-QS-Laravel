@can('roles.store')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create Role') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form method="POST" action="{{ route('roles.store') }}" class="bg-slate-700 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-white-700 text-sm font-bold mb-2">
                                    Name
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="Name">
                                @error('name') <span style="color: rgb(155, 22, 22);">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block text-white-700 text-sm font-bold mb-2">Permissions</label>
                                <div class="grid grid-cols-2 gap-4">
                                    @foreach($permissions as $permission)
                                        <div class="flex items-center">
                                            <input id="permission{{ $permission->id }}" name="permissions[]" type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" value="{{ $permission->id }}">
                                            <label for="permission{{ $permission->id }}" class="ml-2 text-white-700">{{ $permission->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                @error('permissions') <span style="color: rgb(155, 22, 22);">{{ $message }}</span> @enderror
                            </div>
                            <div class="flex space-x-4">
                                <x-primary-button>
                                    Create
                                </x-primary-button>
                                <a href="{{ route('roles.index') }}" class="text-white bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded-md text-sm font-semibold">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@endcan