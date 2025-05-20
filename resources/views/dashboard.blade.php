<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="grid grid-cols-8 gap-4 mb-4 p-5">
                    <div class="col-span-4 mt-2">
                        <h2 class="text-3xl font-bold">
                            Daftar Post
                        </h2>
                    </div>
                    <div class="col-span-4 mt-2">
                        <div class="flex justify-end">
                            <a href="{{ route('post.create') }}"
                               class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                               id="add-post-btn">Buat Postingan</a>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-5 rounded shadow-sm">
                    <!-- Notifikasi menggunakan flash session data -->
                    @if (session('success'))
                        <div class="p-3 rounded bg-green-500 text-green-100 mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="min-w-full table-auto border">
                        <thead class="border-b">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Title</th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Image</th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Status</th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Create At</th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                            <tr class="border-b">
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $post->title }}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="Image" class="w-20 h-20 object-cover">
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">{{ $post->status == 0 ? 'Draft':'Publish' }}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">{{ $post->created_at->format('d-m-Y') }}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">

                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('post.destroy', $post->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('post.edit', $post->id) }}" id="{{ $post->id }}-edit-btn"
                                        class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">Edit</a>

                                        <button type="submit"
                                                class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                                                id="{{ $post->id }}-delete-btn">Delete
                                        </button>

                                        <a href="{{ route('post.content.show', $post->slug) }}" id="{{ $post->id }}-view-btn"
                                        class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">View</a>
                                    </form>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center text-sm text-gray-900 px-6 py-4 whitespace-nowrap" colspan="4">Kamu belum bikin post apapun</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
