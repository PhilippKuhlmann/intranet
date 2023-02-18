<div class="flex flex-wrap mt-20 justify-center gap-5 max-w-7xl   mx-auto sm:px-6 lg:px-8">
    <div class="w-full flex text-center justify-between">

        <div class="">
            <input wire:model.debounce.300ms="search" type="search" name="search" placeholder="Suche"
                class="rounded-md w-64 px-4 text-sm
            bg-gray-800 text-gray-100 dark:bg-gray-200 dark:text-gray-900 dark:border-gray-500
                focus:ring-0 focus:border-blue-600"
                autofocus />
        </div>


        <div class="flex justify-center items-center">
            <x-input.linkbutton link="{{ route('utm.create') }}" label="Neu" />
        </div>

    </div>

    <div class="w-full">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-200 uppercase bg-gray-800 dark:bg-gray-100 dark:text-gray-700">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Kunde
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Standort
                        </th>
                        <th scope="col" class="py-3 px-6">
                            URL
                        </th>
                        <th scope="col" class="py-3 px-6">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($utms as $utm)
                        <tr class="bg-white border-t dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="py-3 px-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $utm->customer }}
                            </th>
                            <td class="py-3 px-4">
                                {{ $utm->location }}
                            </td>
                            <td class="py-3 px-4">
                                <a href="{{ $utm->url }}" target="_blank" class="hover:text-blue-600">
                                    {{ $utm->url }}</a>
                            </td>
                            <td class="py-3 px-4 flex flex-row gap-5 justify-end">

                                <a href="{{ route('utm.edit', $utm) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 ">
                                    <x-svg.edit class="h-5 w-5" />
                                </a>
                                <form method="POST" action="{{ route('utm.destroy', $utm) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 ">
                                        <x-svg.trash class="h-5 w-5" />
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>
        </div>






    </div>





</div>
