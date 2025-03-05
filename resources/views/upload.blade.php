<!DOCTYPE html>
<html>
<head>
    <title>Upload Image</title>
</head>
<body>
<h2>Upload Image</h2>

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="Title (optional)">
    <br><br>
    <input type="file" name="image" required>
    <br><br>
    <button type="submit">Upload</button>
</form>

@if(session('image'))
    <div>
        <p>Uploaded Image:</p>
        <img src="{{ asset('images/' . session('image')) }}" width="300">
    </div>
@endif


<br>
<a href="{{ route('gallery') }}">Back to Gallery</a>

</body>
</html>
