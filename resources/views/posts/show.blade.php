<x-admin-layout>
    <div class="py-12 px-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3">
                    <div class="space-y-4">
                        <div>
                            <p class="text-4xl dark:text-gray-100">Posts</p>
                        </div>

                        <div class="flex flex-col bg-white dark:bg-gray-800 p-4 rounded-lg space-y-4">
                            <div>
                                <p class="text-xl dark:text-gray-100">Show Post</p>
                            </div>
                            <hr>

                            <div class="flex flex-col dark:text-gray-100">
                                <div>
                                    <p>Title : {{ $post->title }}</p>
                                </div>
                                <div>
                                    <p>Content : {{ $post->content }}</p>
                                </div>
                                <div>
                                    <p>Created Date : {{ date('Y-m-d', strtotime($post->created_at)) }}</p>
                                </div>
                            </div>

                            <div class="mt-4 flex justify-between">
                                <a href="{{ route('posts.index') }}"
                                    class="flex items-center rounded-lg p-2 bg-blue-500 text-white hover:bg-blue-300">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
