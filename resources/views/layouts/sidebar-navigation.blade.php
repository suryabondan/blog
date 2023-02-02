<!-- Sidebar -->
<aside :class="{ '-translate-x-full': !open }"
    class="z-20 bg-white dark:bg-gray-800 w-[16rem] px-2 absolute inset-y-0 left-0 lg:fixed transform lg:translate-x-0 ease-in-out shadow-md overflow-y-auto">
    <!-- Logo -->
    <div class="sticky top-0 px-2 bg-white dark:bg-gray-800">
        <div class="h-6 bg-white dark:bg-gray-800"></div>
        <div class="flex items-center justify-between">

            <div class="flex items-center space-x-2">
                <a href="{{ route('dashboard') }}" class="hidden lg:flex items-center space-x-2">
                    <x-application-logo class="block h-10 w-auto fill-current text-gray-600 dark:text-gray-100" />
                    <span class="font-bold text-2xl dark:text-gray-100">BNDN</span>
                </a>
            </div>
            <button type="button" @click="open = !open">
                <x-heroicon-s-x
                    class="lg:hidden inline-flex p-2 items-center justify-center rounded-md text-gray-600 hover:text-gray-100 hover:bg-red-500 dark:hover:text-white focus:outline-none w-10 h-10" />

            </button>
        </div>
    </div>
    <nav class="py-12">
        <ul class="space-y-2">
            <li>
                <x-side-nav-link class="dark:text-gray-100" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    Dashboard
                </x-side-nav-link>
            </li>
            <li>
                <x-side-nav-link class="dark:text-gray-100" href="{{ route('users.index') }}" :active="request()->routeIs('users.*')">
                    Users
                </x-side-nav-link>
            </li>
            <li>
                <x-side-nav-link class="dark:text-gray-100" href="{{ route('posts.index') }}" :active="request()->routeIs('posts.*')">
                    Posts
                </x-side-nav-link>
            </li>
        </ul>
    </nav>
</aside>
