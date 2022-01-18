<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add New Category') }}
            </h2>
            <a href="{{ route('admin-categories') }}" class="inline-block px-3 py-2 bg-blue-500 text-white rounded-md hover:bg-indigo-500">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin-category-store') }}" method="POST">
                        @csrf
                        <div class="mt-5">
                            <label for="name" class="inputLabel">Name</label>
                            <input type="text" class="inputField" name="name" id="name" value="{{ old('name') }}">

                            @error('name')
                            <p class="bg-red-100 text-red-500 px-3 py-1 mt-1 text-sm rounded-md">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="px-3 py-2 bg-indigo-500 text-white inline-block">Create</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
