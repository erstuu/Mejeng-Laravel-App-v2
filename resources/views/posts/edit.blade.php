<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-8 gap-4 p-5">
                    <div class="col-span-4 mt-2">
                        <h1 class="text-3xl font-bold">
                            Edit Postingan
                        </h1>
                    </div>
                    <div class="col-span-4"></div>
                </div>
                <div class="bg-white p-5 rounded shadow-sm">
                    <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-5">
                            <label for="title">Judul</label>
                            <input type="text" name="title" value="{{ old('title', $post->title) }}" required
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            @error('title')
                                <div class="bg-red-400 p-2 shadow-sm rounded mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="status">Publish Status</label>
                            <select name="status" required
                                class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                <option value="1" {{ old('status', $post->status) == 1 ? 'selected' : '' }}>Publish</option>
                                <option value="0" {{ old('status', $post->status) == 0 ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-700">Unggah Gambar</label>
                            <input type="file" name="image" id="image" accept="image/jpeg, image/jpg, image/png"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            @error('image')
                                <div class="bg-red-400 p-2 shadow-sm rounded mt-2 text-white">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="content">Konten</label>
                            <textarea name="content" id="content" cols="30" rows="10" required
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">{{ old('content', $post->content) }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="category">Kategori</label>
                            <select name="category" id="category" required
                                class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                <option value="" disabled>-- Select Category --</option>
                                <option value="pantai" {{ old('category', $post->category) == 'pantai' ? 'selected' : '' }}>Pantai</option>
                                <option value="gunung" {{ old('category', $post->category) == 'gunung' ? 'selected' : '' }}>Gunung</option>
                                <option value="air-terjun" {{ old('category', $post->category) == 'air-terjun' ? 'selected' : '' }}>Air Terjun</option>
                                <option value="goa" {{ old('category', $post->category) == 'goa' ? 'selected' : '' }}>Goa</option>
                                <option value="camping" {{ old('category', $post->category) == 'camping' ? 'selected' : '' }}>Camping</option>
                                <option value="perbukitan" {{ old('category', $post->category) == 'perbukitan' ? 'selected' : '' }}>Perbukitan</option>
                                <option value="danau" {{ old('category', $post->category) == 'danau' ? 'selected' : '' }}>Danau</option>
                                <option value="kuliner" {{ old('category', $post->category) == 'kuliner' ? 'selected' : '' }}>Wisata Kuliner</option>
                                <option value="budaya" {{ old('category', $post->category) == 'budaya' ? 'selected' : '' }}>Wisata Budaya</option>
                                <option value="keluarga" {{ old('category', $post->category) == 'keluarga' ? 'selected' : '' }}>Wisata Keluarga</option>
                            </select>
                            @error('category')
                                <div class="bg-red-400 p-2 shadow-sm rounded mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="location">Lokasi</label>
                            <input type="text" name="location" value="{{ old('location', $post->location) }}" required
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            @error('location')
                                <div class="bg-red-400 p-2 shadow-sm rounded mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <button type="submit"
                                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                Update
                            </button>
                            <a href="{{ route('post.index') }}"
                                class="inline-block px-6 py-2.5 bg-gray-200 text-gray-700 font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">
                                Back
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>