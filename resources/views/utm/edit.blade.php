<x-app-layout>

    <div class="p-5 flex flex-col sm:max-w-md">
        <div class="">
            <span class="text-2xl dark:text-gray-100">UTM bearbeiten</span>
        </div>

        <form method="POST" action="{{ route('utm.update', $utm) }}">
            @method('PATCH')
            @csrf

            <div class="mt-6 flex flex-col">
                <x-input.label for="customer" value="Kunde" />
                <x-input.text id="customer" type="text" name="customer" autofocus="true" value="{{ old('customer') ?? $utm->customer }}" />
                <x-input.error :messages="$errors->get('customer')" class="mt-2" />
            </div>

            <div class="mt-6 flex flex-col">
                <x-input.label for="location" value="Standort" />
                <x-input.text id="location" type="text" name="location" value="{{ old('location') ?? $utm->location }}" />
                <x-input.error :messages="$errors->get('location')" class="mt-2"  />
            </div>

            <div class="mt-6 flex flex-col">
                <x-input.label for="url" value="URL" />
                <x-input.text id="url" type="text" name="url" value="{{ old('url') ?? $utm->url }}" />
                <x-input.error :messages="$errors->get('url')" class="mt-2" />
            </div>

            <div class="mt-4 flex items-center justify-end">
                <x-input.button label="Ändern" />
            </div>
        </form>


    </div>

</x-app-layout>
