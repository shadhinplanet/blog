<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Blogs') }}
            </h2>
            <a href="{{ route('admin-blog-create') }}" class="inline-block px-3 py-2 bg-blue-500 text-white rounded-md hover:bg-indigo-500">Add New</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b flex">
                                <th class="border w-20 px-2 py-1">Image</th>
                                <th class="border flex-1 px-2 py-1">Name</th>
                                <th class="border flex-1 px-2 py-1">Slug</th>

                                <th class="border px-2 py-1 w-40">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                          @forelse ($blogs as $blog)
                          <tr class="border-b flex">
                            <td class="border w-20 px-2 py-1"><img src="{{ $blog->featured_image }}" width="80" alt=""></td>

                              <td class="border flex-1 px-2 py-1">{{ $blog->name }}</td>
                              <td class="border flex-1 px-2 py-1">{{ $blog->slug }}</td>

                              <td class="border px-2 py-1 flex justify-center items-center w-40">
                                  <a href="{{ route('admin-blog-edit', $blog->slug) }}" class="inline-block px-3 py-2 bg-green-800 text-white rounded-md mx-1">Edit</a>
                                  <form action="{{ route('admin-blog-delete', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-block px-3 py-2 bg-red-800 text-white rounded-md mx-1">Delete</button>
                                  </form>

                              </td>
                            </tr>
                          @empty
                          <tr class="border-b flex justify-center">
                              <td colspan="5" class="p-4">No Blogs Found</td>
                          </tr>
                          @endforelse

                        </tbody>
                    </table>


                </div>

            </div>
            <div class="mt-5">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
