<x-layouts.guest_layout>


    <div class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-6 space-y-10">

            <!-- Post Info -->
            <section>
                <h2 class="text-xl font-semibold text-indigo-600 mb-4">Post Info</h2>
                <div class="space-y-2">
                    <div>
                        <span class="font-medium text-gray-700">Title:</span>
                        <span class="text-gray-900">{{ $post->title }}</span>
                    </div>
                    <div>
                        <span class="font-medium text-gray-700">Description:</span>
                        <p class="text-gray-700">{{ $post->description }}</p>
                    </div>
                </div>
            </section>

            <hr class="border-gray-200">

            <!-- Post Creator Info -->
            <section>
                <h2 class="text-xl font-semibold text-indigo-600 mb-4">Post Creator Info</h2>
                <div class="space-y-2">
                    <div>
                        <span class="font-medium text-gray-700">Name:</span>
                        <span class="text-gray-900">{{ $post->user->name }}</span>
                    </div>
                    <div>
                        <span class="font-medium text-gray-700">Email:</span>
                        <span class="text-gray-900">{{ $post->user->email }}</span>
                    </div>
                    <div>
                        <span class="font-medium text-gray-700">Created At:</span>
                        <span class="text-gray-900">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                </div>


            </section>
        </div>
    </div>
</x-layouts.guest_layout>
