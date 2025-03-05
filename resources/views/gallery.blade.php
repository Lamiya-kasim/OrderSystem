<!DOCTYPE html>
<html>
<head>
    <title>Image Gallery</title>
    <style>
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
        .gallery img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<h2>Image Gallery</h2>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('upload.form') }}">Upload New Image</a>

<div class="gallery">
    @foreach ($images as $image)
        <div>
            <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title }}">
            <p>{{ $image->title }}</p>
        </div>
    @endforeach
</div>

</body>
</html>
