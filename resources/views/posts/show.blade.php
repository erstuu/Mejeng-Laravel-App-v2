<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="container mx-auto my-auto max-w-4xl">
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar {{ $post->title }}" class="w-full h-64 object-cover">

            <div class="p-6">
                <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>
                <p class="text-gray-500 text-sm mb-6">Dibuat pada: {{ $post->created_at->format('d M Y') }}</p>
                
                <div class="text-gray-800 text-lg leading-relaxed">
                    {!! nl2br(e($post->content)) !!}
                </div>

                <div class="mt-8">
                    <a href="{{ url()->previous() }}"
                       class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Kembali ke Daftar Post
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>