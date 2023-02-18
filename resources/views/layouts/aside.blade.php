<aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full text-gray-100 bg-sdarkblue sm:translate-x-0 dark:bg-gray-800 "
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-sdarkblue dark:bg-gray-800">
            <ul class="space-y-2">

                <x-aside.link href="{{ route('dashboard') }}">
                    <x-slot:svg>
                        <x-svg.home class="h-6 w-6" />
                    </x-slot:svg>
                    Dashboard
                </x-aside.link>

                <div class="inline-flex items-center justify-center w-full">
                    <hr class="w-64 h-0.5 my-4 bg-gray-200 border-0 rounded dark:bg-gray-700">
                    <div class="absolute px-2 -translate-x-1/2 font-thin bg-sdarkblue left-1/2 dark:bg-gray-800">
                        Technik
                    </div>
                </div>

                <x-aside.link href="{{ route('utm.index') }}">
                    <x-slot:svg>
                        <x-svg.fire class="h-6 w-6" />
                    </x-slot:svg>
                    UTM's
                </x-aside.link>

            </ul>
        </div>
    </aside>
