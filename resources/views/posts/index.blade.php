<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
</head>
<body>
    <h1>Blog Posts</h1>

    @foreach ($posts as $post)
        <x-post-card :post="$post" />
    @endforeach

</body>
</html>

