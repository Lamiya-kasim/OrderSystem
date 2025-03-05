<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
</head>
<body>
    <h1>User Profile</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <!-- Update the form method to POST and include enctype for file uploads -->
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Other profile fields -->

        <label for="profile_picture">Profile Picture:</label>
        <input type="file" name="profile_picture" id="profile_picture" accept="image/*">

        <button type="submit">Update Profile</button>
    </form>

    <!-- Display the profile picture if it exists -->
    @if(Auth::user()->profile_picture)
        <img src="{{ asset('storage/profile_pictures/' . Auth::user()->profile_picture) }}" alt="Profile Photo" width="150">
    @else
        <p>No profile picture uploaded.</p>
    @endif

</body>
</html>

