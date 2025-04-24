<!DOCTYPE html>
<html>
<head>
    <title>All Posts</title>
</head>
<body>
    <h1>Submitted Posts</h1>

    <h1>All Posts</h1>
@foreach($posts as $post)
    <h2>{{ $post->title }}</h2>
    <div>{!! $post->content !!}</div>
    <hr>
@endforeach

<a href="{{ route('posts.create') }}">Create another post</a>
</body>
</html>
