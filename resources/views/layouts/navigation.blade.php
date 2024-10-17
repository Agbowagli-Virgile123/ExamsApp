<nav x-data="{ open: false }" class="bg-white border-b-2 shadow-lg shadow-gray-500 border-violet-900 sticky top-0 ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto  sm:px-6 lg:px-8 bg-blue-500">
        <div class="flex justify-between h-16 ">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/" class="text-white font-bold text-2xl">
                        Home
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                         this.closest('form').submit();">   
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </div>
        </div>
    </div>
</nav>
