<!DOCTYPE html>
<html>
<head>
    <title>All Posts</title>
    @php use Illuminate\Support\Str; @endphp
</head>
<body>
    <h1>Submitted Posts</h1>

    @foreach($posts as $post)
        <h2>{{ $post->title }}</h2>
        <div>{!! $post->content !!}</div>

        @if ($post->uploaded_file_url)
            <p>Uploaded File:</p>
            @if (Str::endsWith($post->uploaded_file_url, ['jpg', 'jpeg', 'png']))
                <img src="{{ asset($post->uploaded_file_url) }}" alt="Uploaded Image" style="max-width: 300px;">
            @else
                <a href="{{ asset($post->uploaded_file_url) }}" target="_blank">Download File</a>
            @endif
        @endif

        <hr>
    @endforeach

    <a href="{{ route('posts.create') }}">Create another post</a>
</body>
</html>
