<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Blog') }}
            </h2>
            <a href="{{ route('admin-blogs') }}"
                class="inline-block px-3 py-2 bg-blue-500 text-white rounded-md hover:bg-indigo-500">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @php
                    function getFileUrl($name){
                    if(str_starts_with($name, 'http')){
                    return $name;
                    }
                    return url('storage/uploads/'.$name);
                    }
                    @endphp
                    <form action="{{ route('admin-blog-update', $blog->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mt-5">
                            <label for="name" class="inputLabel">Name</label>
                            <input type="text" class="inputField" name="name" id="name" value="{{ $blog->name }}">

                            @error('name')
                            <p class="bg-red-100 text-red-500 px-3 py-1 mt-1 text-sm rounded-md">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-5">
                            <label for="description" class="inputLabel">Description</label>
                            <textarea class="inputField" name="description" id="description"
                                rows="4">{{ $blog->description }}</textarea>
                            @error('description')
                            <p class="bg-red-100 text-red-500 px-3 py-1 mt-1 text-sm rounded-md">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-5">
                            <div class="flex items-baseline">
                                <div class="">
                                    <label for="featured_image" class="inputLabel">Fetured Image</label>
                                    <input type="file" name="featured_image" id="featured_image"
                                        value="{{ old('featured_image') }}">
                                    @error('featured_image')
                                    <p class="bg-red-100 text-red-500 px-3 py-1 mt-1 text-sm rounded-md">{{ $message }}
                                    </p>
                                    @enderror
                                    <div class="w-28 mt-5">
                                        <img src="{{ getFileUrl($blog->featured_image) }}" alt="">
                                    </div>
                                </div>

                                <div class="ml-10">
                                    <label for="category_id" class="inputLabel">Category</label>
                                    <div class="grid grid-cols-2 gap-x-4">
                                        @foreach ($categories as $category)
                                        <label for="category-{{ $category->id  }}" class="inputLabel inline-block">
                                            <input type="checkbox" @foreach ($blog->categories as $item)
                                            {{ $category->id == $item->id ? 'checked':'' }}
                                            @endforeach
                                            name="category_id[]" id="category-{{ $category->id }}" value="{{
                                            $category->id }}">
                                            {{ $category->name }}</label>
                                        @endforeach
                                    </div>
                                    {{-- <select name="category_id" id="category_id" class="inputField">
                                        <option value="none">Select Category</option>
                                        @foreach ($categories as $category)
                                        <option {{ $category->id == old('category_id') || $category->id ==
                                            $blog->category_id ? 'selected' :'' }} value="{{
                                            $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <p class="bg-red-100 text-red-500 px-3 py-1 mt-1 text-sm rounded-md">{{ $message }}
                                    </p>
                                    @enderror --}}
                                </div>
                            </div>

                        </div>

                        <div class="mt-5">
                            <button type="submit"
                                class="px-3 py-2 bg-indigo-500 text-white inline-block">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
