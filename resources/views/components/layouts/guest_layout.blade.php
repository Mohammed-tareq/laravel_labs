<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ITI Blog - All Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

<!-- Header -->
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-indigo-600">ITI Blog</h1>
        <nav>
            <a href="{{route('posts.index')}}" class="text-gray-600 hover:text-indigo-600 font-medium">All Posts</a>
        </nav>
    </div>
</header>

{{ $slot }}
</body>
</html>