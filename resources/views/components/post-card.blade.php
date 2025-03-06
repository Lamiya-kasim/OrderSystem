<div class="border p-4 rounded shadow mb-4">
    <h2 class="text-xl font-bold">{{ $post->title }}</h2>
    <p class="text-gray-700">{{ $post->content }}</p>
    <small class="text-gray-500">By {{ $post->author ?? 'Unknown' }}</small>
</div>

<div class="post-card" style="border:1px solid #ccc; padding: 15px; margin: 10px 0;">
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->content }}</p>
    <small>Published on {{ $post->created_at->format('d M Y') }}</small>
</div>
