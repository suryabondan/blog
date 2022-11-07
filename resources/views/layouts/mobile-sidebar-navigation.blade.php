<aside class="w-64">
    <div class="fixed overflow-y-auto py-24 px-3 bg-gray-50 dark:bg-gray-900 h-screen">
        <ul class="space-y-2">
            <li>
                <x-side-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    Dashboard
                </x-side-nav-link>
            </li>
        </ul>
    </div>
</aside>
