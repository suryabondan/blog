<nav class="fixed top-0 z-10 left-0 bg-white dark:bg-gray-800 px-2 sm:px-4 py-2.5 w-full border-b border-gray-200/10">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="hidden lg:flex items-center space-x-2">
            <x-application-logo class="block h-10 w-auto fill-current text-gray-600 dark:text-gray-100" />
            <span class="font-bold text-2xl dark:text-gray-100">BNDN</span>
        </a>

        <div class="flex lg:hidden">
            <button type="button" @click="open = !open" @click.away="open = false">
                <x-heroicon-s-menu
                    class="items-center justify-center p-2 rounded-md text-gray-600 dark:text-gray-400 hover:text-gray-100 hover:bg-red-500 dark:hover:text-white focus:outline-none w-10 h-10" />

            </button>
        </div>

        <div class="flex">
            <button x-cloak x-on:click="darkMode = !darkMode;">
                <x-heroicon-s-moon x-show="!darkMode"
                    class="p-2 ml-3 w-8 h-8 text-gray-700 bg-gray-100 rounded-md transition cursor-pointer hover:bg-gray-200" />
                <x-heroicon-s-sun x-show="darkMode"
                    class="p-2 ml-3 w-8 h-8 text-gray-100 bg-gray-700 rounded-md transition cursor-pointer dark:hover:bg-gray-600" />
            </button>
        </div>

        <div class="flex">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out dark:text-gray-400 dark:hover:text-gray-100">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content" class="bg-gray-800">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</nav>
