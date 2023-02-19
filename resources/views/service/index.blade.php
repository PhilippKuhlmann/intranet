<x-app-layout>
    <div class="p-4 w-full">

        <div class="flex flex-wrap justify-center">

            <div class="w-full">
                <x-input.linkbutton label="Neu" link="{{ route('service.create') }}" />
            </div>

            @foreach ($service_categorys as $service_category)
                @if (!$service_category->services->isEmpty())
                    <div class="flex-col p-4">
                        <div class="text-3xl mb-4 dark:text-gray-100">
                            {{ $service_category->name }}
                        </div>

                        @foreach ($service_category->services as $service)
                            <div class="w-80 sm:w-96 mt-1 flex flex-row justify-between rounded-md shadow-md bg-white text-gray-900 hover:bg-gray-300 dark:bg-gray-800 hover:dark:bg-gray-700 dark:text-gray-100">
                                <a href="{{ $service->url }}" target="_blank" class="w-full group p-3">
                                    <div class="flex flex-row">
                                        <div class="flex items-center w-14">
                                            <img src="{{ $service->image }}" class="w-10" />
                                        </div>
                                        <div class="">
                                            <div
                                                class="text-xl group-hover:text-blue-600 group-hover:dark:text-blue-700">
                                                {{ $service->name }}
                                            </div>
                                            <div class="dark:text-gray-500">
                                                {{ $service->description }}
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <div class="p-3">
                                    <button id="{{ 'dropdown' . $service->id }}"
                                        data-dropdown-toggle="{{ 'dropdownDotsHorizontal' . $service->id }}"
                                        class="inline-flex items-center text-sm font-medium text-center text-gray-900 rounded-lg dark:text-white  "
                                        type="button">
                                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                            </path>
                                        </svg>
                                    </button>

                                    <!-- Dropdown menu -->
                                    <div id="{{ 'dropdownDotsHorizontal' . $service->id }}"
                                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="{{ 'dropdown' . $service->id }}">
                                            <li>
                                                <a href="{{ route('service.edit', $service) }}"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Bearbeiten</a>
                                            </li>
                                            <li>
                                                <form method="POST" action="{{ route('service.destroy', $service) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Löschen</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        @endforeach



                    </div>
                @endif
            @endforeach





        </div>

    </div>
</x-app-layout>
