<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Contact') }}
            </h2>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b flex">
                                <th class="border flex-1 px-2 py-1">Name</th>
                                <th class="border flex-1 px-2 py-1">Subject</th>
                                <th class="border flex-1 px-2 py-1">Message</th>
                                <th class="border px-2 py-1 flex-1 ">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($contacts as $contact)
                            <tr class="border-b flex">
                                <td class="border flex-1 px-2 py-1">{{ $contact->name }} <span class="block text-sm">{{ $contact->email }}</span></td>
                                <td class="border flex-1 px-2 py-1">{{ $contact->subject }}</td>
                                <td class="border flex-1 px-2 py-1">{{ $contact->message }}</td>

                                <td class="border px-2 py-1 flex justify-center items-center flex-1">
                                    <a href="{{ route('contact.edit',$contact->id) }}"
                                        class="inline-block px-3 py-2 bg-green-800 text-white rounded-md mx-1">Reply</a>

                                    <form action="{{ route('contact.destroy',$contact->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-block px-3 py-2 bg-red-800 text-white rounded-md mx-1">Delete</button>
                                    </form>

                                </td>
                            </tr>
                            @empty
                            <tr class="border-b flex justify-center">
                                <td colspan="5" class="p-4">No Message Found</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>


                </div>

            </div>
        </div>
    </div>
</x-app-layout>
