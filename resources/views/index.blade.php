
<x-layouts.guest_layout>

<!-- Main Content -->
<main class="max-w-7xl mx-auto p-4">

    <!-- Create Post Button -->
    <div class="flex justify-end mb-4">
        <a href="{{route('posts.create')}}" class="px-4 py-2 bg-indigo-600 text-white rounded shadow hover:bg-indigo-700 transition">
            Create Post
        </a>
    </div>

    <!-- Posts Table -->
    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="w-full border-collapse">
            <thead>
            <tr class="bg-gray-50">
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Author</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Created At</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            @foreach ($posts as $post)
            <tr>
                <td class="px-6 py-4">{{$post["id"]}}</td>
                <td class="px-6 py-4 font-medium">{{$post["title"]}}</td>
                <td class="px-6 py-4">{{$post["author"]}}</td>
                <td class="px-6 py-4">{{$post["created_at"]}}</td>
                <td class="px-6 py-4 text-right space-x-2">
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('posts.show', $post['id']) }}" class="px-3 py-1 text-sm bg-green-100 text-green-700 rounded hover:bg-green-200">View</a>
                        <a href="{{ route('posts.edit', $post['id']) }}" class="px-3 py-1 text-sm bg-blue-100 text-blue-700 rounded hover:bg-blue-200">Edit</a>
                        <form action="{{ route('posts.destroy', $post['id']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 text-sm bg-red-100 text-red-700 rounded hover:bg-red-200">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-between items-center mt-4">
        <a href="#" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">Previous</a>
        <div class="space-x-1">
            <a href="#" class="px-3 py-1 bg-indigo-600 text-white rounded">1</a>
            <a href="#" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">2</a>
            <a href="#" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">3</a>
        </div>
        <a href="#" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">Next</a>
    </div>

</main>
</x-layouts.guest_layout>

