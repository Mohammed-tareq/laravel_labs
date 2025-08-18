
<x-layouts.guest_layout>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto p-4">



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
                    <td class="px-6 py-4">{{$post->id}}</td>
                    <td class="px-6 py-4 font-medium">{{$post->title}}</td>
                    <td class="px-6 py-4">{{$post->user->name}}</td>
                    <td class="px-6 py-4">{{$post->created_at->diffForHumans()}}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('posts.delete', $post->id) }}"class="px-3 py-1 text-sm bg-red-100 text-red-700 rounded hover:bg-red-200">Delete For Ever</a>
                            <a href="{{ route('posts.restore', $post->id) }}"class="px-3 py-1 text-sm bg-red-100 text-red-700 rounded hover:bg-red-200">Restore</a>

                        </div>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-between items-center mt-4">
            <div class="space-x-1">
                <a href="#" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">{{ $posts->links() }}</a>
            </div>
        </div>

    </main>
    </x-layouts.guest_layout>

