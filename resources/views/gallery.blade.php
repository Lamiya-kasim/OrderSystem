<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .gallery { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 10px; padding: 20px; }
        .gallery img { width: 100%; height: auto; border-radius: 5px; }
        .btn { padding: 10px; background: #007bff; color: white; border: none; cursor: pointer; margin-top: 10px; }
        .btn:hover { background: #0056b3; }
    </style>
</head>
<body>

    <h2>Upload Image</h2>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <button type="submit" class="btn">Upload</button>
    </form>

    <button onclick="window.location.href='{{ route('gallery') }}'" class="btn">Back to Gallery</button>

    <h2>Image Gallery</h2>
    <div class="gallery">
        @foreach($images as $image)
            <img src="{{ asset('storage/' . $image->path) }}" alt="Image">
        @endforeach
    </div>

</body>
</html>

