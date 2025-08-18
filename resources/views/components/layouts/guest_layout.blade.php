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
            <a href="{{route('posts.index')}}" class="text-gray-600 hover:text-indigo-600 font-medium px-4 py-2 rounded transition duration-200 {{ request()->routeIs('posts.index') ? 'bg-indigo-100' : '' }}">All Posts</a>
            <a href="{{route('posts.deleted')}}" class="text-gray-600 hover:text-indigo-600 font-medium px-4 py-2 rounded transition duration-200 {{ request()->routeIs('posts.deleted') ? 'bg-indigo-100' : '' }}">Deleted Posts</a>
        </nav>
    </div>
</header>

{{ $slot }}

<!-- jQuery (Google CDN) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- أو من jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>



{{ $scripts ?? '' }}
</body>
</html>
