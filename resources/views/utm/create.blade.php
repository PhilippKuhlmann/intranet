<x-app-layout>

    <div class="p-5 flex flex-col sm:max-w-md">
        <div class="">
            <span class="text-2xl dark:text-gray-100">Neue UTM erstellen</span>
        </div>

        <form method="POST" action="{{ route('utm.store') }}">
            @csrf

            <div class="mt-6 flex flex-col">
                <x-input.label for="customer" value="Kunde" />
                <x-input.text id="customer" class="block mt-1 w-full" type="text" name="customer" autofocus="true" value="{{ old('customer') }}" />
                <x-input.error :messages="$errors->get('customer')" class="mt-2" />
            </div>

            <div class="mt-6 flex flex-col">
                <x-input.label for="location" value="Standort" />
                <x-input.text id="location" class="block mt-1 w-full" type="text" name="location" value="{{ old('location') }}" />
                <x-input.error :messages="$errors->get('location')" class="mt-2"  />
            </div>

            <div class="mt-6 flex flex-col">
                <x-input.label for="url" value="URL" />
                <x-input.text id="url" class="block mt-1 w-full" type="text" name="url" value="{{ old('url') }}" />
                <x-input.error :messages="$errors->get('url')" class="mt-2" />
            </div>

            <div class="mt-4 flex items-center justify-end">
                <x-primary-button>Erstellen</x-primary-button>
            </div>
        </form>


    </div>

</x-app-layout>
