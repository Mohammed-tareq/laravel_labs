<x-layouts.guest_layout>

    <div class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-6 space-y-10">

            <!-- Post Info -->
            <section>
                <h2 class="text-xl font-semibold text-indigo-600 mb-4">Post Info</h2>
                <div class="space-y-2">
                    <div>
                        <span class="font-medium text-gray-700">Title:</span>
                        <span class="text-gray-900">{{ $limitPost->title }}</span>
                    </div>
                    <div>
                        <span class="font-medium text-gray-700">Description:</span>
                        <p class="text-gray-700">{{ $limitPost->description }}</p>
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
                        <span class="text-gray-900">{{ $limitPost->user->name }}</span>
                    </div>
                    <div>
                        <span class="font-medium text-gray-700">Email:</span>
                        <span class="text-gray-900">{{ $limitPost->user->email }}</span>
                    </div>
                    <div>
                        <span class="font-medium text-gray-700">Created At:</span>
                        <span class="text-gray-900">{{ $limitPost->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </section>

            <hr class="border-gray-200">

            <section>
                <h2 class="text-xl font-semibold text-indigo-600 mb-4">Add a Comment</h2>
                <form id='commentForm' class="space-y-4">
                    @csrf

                    <div>
                        <label for="comment" class="block text-sm font-medium text-gray-700 mb-1">Your Comment</label>
                        <textarea id="comment" name="comment" rows="3"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                            placeholder="Write your comment..." id="commentText"></textarea>
                    </div>

                    <div>
                        <label for="comment_user" class="block text-sm font-medium text-gray-700 mb-1">Comment
                            As</label>
                        <select id="comment_user" name="user_id"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
                            <option value="" disabled selected>Select User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <button type="submit" id="submit"
                            class="px-5 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">Submit</button>
                    </div>
                </form>
            </section>

            <hr class="border-gray-200">
            <!-- Comments List -->
            <section>
                <h2 class="text-xl font-semibold text-indigo-600 mb-4">Comments</h2>
                <div class="space-y-4" id="comments">
                    @forelse ($comments as $comment)
                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-sm text-gray-600">
                                    <span class="font-medium text-gray-800">{{ $comment->user->name }}</span>
                                    <span class="mx-2">•</span>
                                    <span>{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                            </div>

                            <p class="text-gray-800">{{ $comment->comment }}</p>
                        </div>
                    @empty
                        <p class="text-gray-500">No comments yet. Be the first to comment!</p>
                    @endforelse
                    @if (!empty($comments))
                        <button type="submit" id="ShowMore"
                            class="px-5 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">Show
                            More</button>
                    @endif

            </section>
        </div>
    </div>



    <x-slot name="scripts">

        <script>
            //  get all date

            @php
                $allComments = route('posts.comment.all.comment', $limitPost->id);
            @endphp
            $(document).on('click', '#ShowMore', function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ $allComments }}",
                    method: "GET",
                    success: function(res) {
                        $('#comments').empty();

                        $.each(res.data, function(index, comment) {
                            $('#comments').append(`
                    <div class="border border-gray-200 rounded-lg p-4 mb-2">
                        <div class="flex items-center justify-between mb-2">
                            <div class="text-sm text-gray-600">
                                <span class="font-medium text-gray-800">${ comment.user.name } •</span>
                            </div>
                        </div>
                        <p class="text-gray-800">${ comment.comment }</p>
                    </div>
                `);
                        });
                    }
                });
            });




            // store data
            $(document).on('submit', '#commentForm', function(e) {
                e.preventDefault();
                let dataForm = new FormData(this);
                $.ajax({
                    url: "{{ route('posts.comment.store', $limitPost->id) }}",
                    method: "POST",
                    data: dataForm,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);

                        let comment = response.post; // بدل  خل

                        $('#comments').prepend(`
        <div class="border border-gray-200 rounded-lg p-4">
            <div class="flex items-center justify-between mb-2">
                <div class="text-sm text-gray-600">
                    <span class="font-medium text-gray-800">${comment.user.name} •</span>
                </div>
            </div>
                <p class="text-gray-800">${ comment.comment }</p>

        </div>
    `);

                        $('#comment_user').val('');
                        $('#commentText').val('');
                    }






                });
            });
        </script>
    </x-slot>
</x-layouts.guest_layout>
