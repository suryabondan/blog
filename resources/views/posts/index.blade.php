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

                            @if (session()->has('success'))
                                <div class="bg-green-500 text-white p-4 rounded-xl">
                                    <p class="text-xl">{{ session()->get('success') }}</p>
                                </div>
                            @endif

                            @if (session()->has('info'))
                                <div class="bg-cyan-500 text-white p-4 rounded-xl">
                                    <p class="text-xl">{{ session()->get('info') }}</p>
                                </div>
                            @endif

                            @if (session()->has('danger'))
                                <div class="bg-red-500 text-white p-4 rounded-xl">
                                    <p class="text-xl">{{ session()->get('danger') }}</p>
                                </div>
                            @endif

                            <div class="flex">
                                <a class="flex items-center rounded-lg p-2 bg-blue-500 text-white hover:bg-blue-300"
                                    href="{{ route('posts.create') }}">Create New Posts</a>
                            </div>
                            <div class="overflow-y-auto relative">
                                <table class="w-full text-left table-auto dark:text-gray-100">
                                    <thead class="uppercase bg-gray-100 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col" class="py-3 px-6">No</th>
                                            <th scope="col" class="py-3 px-6">Title</th>
                                            <th scope="col" class="py-3 px-6">Content</th>
                                            <th scope="col" class="py-3 px-6">Author</th>
                                            <th scope="col" class="py-3 px-6">Created Date</th>
                                            <th scope="col" class="py-3 px-6">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td scope="row" class="py-4 px-6">{{ $loop->iteration }}</td>
                                                <td scope="row" class="py-4 px-6">{{ $post->title }}</td>
                                                <td scope="row" class="py-4 px-6">{{ $post->content }}</td>
                                                <td scope="row" class="py-4 px-6">{{ $post->user->name }}</td>
                                                <td scope="row" class="py-4 px-6">
                                                    {{ date('Y-m-d', strtotime($post->created_at)) }}</td>
                                                <td scope="row" class="py-4 px-6">
                                                    <div class="flex justify-center space-x-2">
                                                        <a class="flex items-center rounded-lg p-2 bg-cyan-500 text-white hover:bg-cyan-300"
                                                            href="{{ route('posts.show', $post->id) }}">show</a>
                                                        <a class="flex items-center rounded-lg p-2 bg-green-500 text-white hover:bg-green-300"
                                                            href="{{ route('posts.edit', $post->id) }}">update</a>
                                                        <button type="button"
                                                            class="deletePost flex items-center rounded-lg p-2 bg-red-500 text-white hover:bg-red-300"
                                                            value="{{ $post->id }}">delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.deletePost', function() {
                var id = $(this).val();
                var link = 'posts/';
                deleteData(link, id);
            });
        });
    </script>
</x-admin-layout>
