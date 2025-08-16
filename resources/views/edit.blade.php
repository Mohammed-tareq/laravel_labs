<x-layouts.guest_layout>

    <div class="bg-gray-100 min-h-screen flex items-center justify-center p-4">


        <div class="w-full max-w-lg bg-white rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold text-indigo-600 mb-6">Create Post</h1>

            <form class="space-y-5" method="POST" action="{{ route('posts.update', $post['id']) }}">
                @csrf
                @method('PUT')
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                    <input type="text" id="title" name="title" placeholder="Enter post title"
                           value="{{ $post['title'] }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"/>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea id="description" name="description" rows="4" placeholder="Write the post content..."
                              class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">{{$post['description']}}</textarea>
                </div>


                <!-- Post Creator -->
                <div>
                    <label for="creator" class="block text-sm font-medium text-gray-700 mb-1">Post Creator</label>
                    <select id="creator" name="author"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
                        <option value="Ahmed" {{ $post['author'] == 'Ahmed' ? 'selected' : '' }}>Ahmed</option>
                        <option value="Mohammed" {{ $post['author'] == 'Mohammed' ? 'selected' : '' }}>Mohammed</option>
                        <option value="Ali" {{ $post['author'] == 'Ali' ? 'selected' : '' }}>Ali</option>
                        <option value="salem" {{ $post['author'] == 'salem' ? 'selected' : '' }}>salem</option>
                        <option value="tareq" {{ $post['author'] == 'tareq' ? 'selected' : '' }}>tareq</option>
                        <option value="fofaa" {{ $post['author'] == 'fofaa' ? 'selected' : '' }}>fofaa</option>
                    </select>
                </div>

                <!-- Submit -->
                <div class="pt-2">
                    <button type="submit"
                            class="w-full py-3 bg-indigo-600 text-white rounded shadow hover:bg-indigo-700 transition">
                        Edit
                    </button>
                </div>
            </form>
        </div>


    </div>
</x-layouts.guest_layout>
