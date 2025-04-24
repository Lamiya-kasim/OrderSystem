<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a Post</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
</head>
<body>

    <h2>Create a Post</h2>

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
    @csrf

    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required>
    <br><br>

    <label for="content">Content:</label>
    <textarea name="content" id="content"></textarea>
    <br><br>

    <!-- ✅ File Upload -->
    <label for="uploaded_file">Upload a File:</label>
    <input type="file" name="uploaded_file" id="uploaded_file">
    <br><br>

    <button type="submit">Submit</button>
</form>


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
