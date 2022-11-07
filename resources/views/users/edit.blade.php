<x-admin-layout>
    <div class="py-12 px-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3">
                    <div class="space-y-4">
                        <div>
                            <p class="text-4xl dark:text-gray-100">Users</p>
                        </div>

                        <div class="flex flex-col bg-white dark:bg-gray-800 p-4 rounded-lg space-y-4">
                            <div>
                                <p class="text-xl dark:text-gray-100">Create New User</p>
                            </div>
                            <hr>

                            @if (count($errors) > 0)
                                <div class="dark:text-gray-100 bg-red-500 rounded-xl p-4">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" enctype="multipart/form-data"
                                action="{{ route('users.update', $user->id) }}">
                                @csrf
                                @method('PUT')
                                <!-- Name -->
                                <div>
                                    <x-label class="dark:text-gray-100" for="name" :value="__('Name')" />

                                    <x-input id="id"
                                        class="block mt-1 w-full dark:bg-gray-700 dark:text-gray-100" type="hidden"
                                        name="id" :value="$user->id ?? old('id')" required />

                                    <x-input id="name"
                                        class="block mt-1 w-full dark:bg-gray-700 dark:text-gray-100" type="text"
                                        name="name" :value="$user->name ?? old('name')" required autofocus />
                                </div>

                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-label class="dark:text-gray-100" for="email" :value="__('Email')" />

                                    <x-input id="email"
                                        class="block mt-1 w-full dark:bg-gray-700 dark:text-gray-100" type="email"
                                        name="email" :value="$user->email ?? old('email')" required />
                                </div>

                                <!-- Password -->
                                <div class="mt-4">
                                    <x-label class="dark:text-gray-100" for="password" :value="__('Password')" />

                                    <x-input id="password"
                                        class="block mt-1 w-full dark:bg-gray-700 dark:text-gray-100" type="password"
                                        name="password" autocomplete="new-password" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="mt-4">
                                    <x-label class="dark:text-gray-100" for="password_confirmation" :value="__('Confirm Password')" />

                                    <x-input id="password_confirmation"
                                        class="block mt-1 w-full dark:bg-gray-700 dark:text-gray-100" type="password"
                                        name="password_confirmation" />
                                </div>

                                <div class="mt-4 flex justify-between">
                                    <a href="{{ route('users.index') }}"
                                        class="flex items-center rounded-lg p-2 bg-blue-500 text-white hover:bg-blue-300">Back</a>
                                    <button type="submit"
                                        class="flex items-center rounded-lg p-2 bg-blue-500 text-white hover:bg-blue-300">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
