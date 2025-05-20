<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mejeng Travel Story - Welcome</title>
    <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">Mejeng Travel App Story</h1>
            <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-800 font-medium">Buat Postingan</a>
        </div>
    </nav>

    <!-- Konten utama, fleksibel -->
    <main class="flex-grow">

        <!-- Hero Section -->
        <header class="bg-blue-600 text-white py-20">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Tulis dan Bagikan Ceritamu!</h2>
                <p class="text-lg md:text-xl mb-6">Ceritakan pengalaman terbaik kamu selama berwisata di Sukabumi</p>
            </div>
        </header>

        <!-- Featured Post -->
        @if ($featured)
        <section class="container mx-auto px-4 py-16">
            <h3 class="text-2xl font-semibold mb-6">Post Unggulan</h3>

            <div class="bg-white rounded-lg shadow-lg overflow-hidden grid grid-cols-1 md:grid-cols-2 gap-6">
                <img src="{{ asset('storage/' . $featured->image) }}" alt="Featured Post" class="w-full h-full object-cover" />
                <div class="p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-3xl font-bold mb-2">{{ $featured->title }}</h4>
                        <p class="text-sm text-gray-500 mb-4">Diposting pada: {{ $featured->created_at->format('d M Y') }}</p>
                        <p class="text-gray-700 mb-4">
                            {{ \Illuminate\Support\Str::limit($featured->content, 120, '...') }}
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('post.content.show', $featured->slug) }}" class="text-blue-600 hover:underline font-medium">Baca Selengkapnya →</a>
                    </div>
                </div>
            </div>
        </section>
        @else
        <p class="text-center text-gray-500 py-16">Belum ada postingan.</p>
        @endif

        <!-- Recent Posts -->
        <section class="bg-gray-100 py-16">
            <div class="container mx-auto px-4">
                <h3 class="text-2xl font-semibold mb-6">Artikel Terbaru</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($recentPosts as $post)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">Tidak ada gambar</div>
                            @endif
                            <div class="p-5">
                                <h4 class="text-xl font-semibold mb-2">{{ $post->title }}</h4>
                                <p class="text-sm text-gray-500 mb-3">Dibuat pada: {{ $post->created_at->format('d M Y') }}</p>
                                <p class="text-gray-700 mb-4">
                                    {{ \Illuminate\Support\Str::limit($post->content, 120, '...') }}
                                </p>
                                <a href="{{ route('post.content.show', $post->slug) }}" class="text-blue-600 hover:underline font-medium">Baca Selengkapnya →</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Semua Postingan Kecuali Featured dan Recent -->
        @if ($otherPosts->count() > 0)
        <section class="bg-gray-100 py-16">
            <div class="container mx-auto px-4">
                <h3 class="text-2xl font-semibold mb-6">Postingan Lainnya</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($allPosts as $post)
                        @if ($post->id !== $featured->id && !in_array($post->id, $recentPosts->pluck('id')->toArray()))
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">Tidak ada gambar</div>
                                @endif
                                <div class="p-5">
                                    <h4 class="text-xl font-semibold mb-2">{{ $post->title }}</h4>
                                    <p class="text-sm text-gray-500 mb-3">Dibuat pada: {{ $post->created_at->format('d M Y') }}</p>
                                    <p class="text-gray-700 mb-4">
                                        {{ \Illuminate\Support\Str::limit($post->content, 120, '...') }}
                                    </p>
                                    <a href="{{ route('post.content.show', $post->slug) }}" class="text-blue-600 hover:underline font-medium">Baca Selengkapnya →</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
        @endif
    </main>

    <!-- Footer -->
    <footer class="bg-white py-6 border-t">
        <div class="container mx-auto px-4 text-center text-gray-500">
            &copy; {{ now()->year }} Mejeng Wisata. Semua hak dilindungi.
        </div>
    </footer>

</body>
</html>
