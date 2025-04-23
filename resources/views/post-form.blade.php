<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a Post</title>

    <!-- ✅ CKEditor CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <!-- ✅ CSRF Token (Laravel) -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <h2>Create a Post</h2>

    <form method="POST" action="{{ route('post.store') }}">
        @csrf
        <label for="content">Content:</label>
        <textarea name="content" id="content"></textarea>

        <br>
        <button type="submit">Submit</button>
    </form>

    <!-- ✅ CKEditor Init with Image Upload and CSRF -->
    <script>
        ClassicEditor
            .create(document.querySelector('#content'), {
                ckfinder: {
                    uploadUrl: '/upload/image?_token=' + document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>

</body>
</html>
