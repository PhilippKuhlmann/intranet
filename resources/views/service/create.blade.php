<x-app-layout>

    <div class="p-5 flex flex-col sm:max-w-md">
        <div class="">
            <span class="text-2xl dark:text-gray-100">Neuen Dienst anlegen</span>
        </div>

        <form method="POST" action="{{ route('service.store') }}" enctype="multipart/form-data" >
            @csrf

            <div class="mt-6 flex flex-col">

                <x-input.label for="service_category" value="Kategorie" />

                <x-input.select id="service_category" name="service_category_id">
                    <option value="">Kategorie auswählen</option>
                    @foreach ($service_categorys as $service_category)
                        <option value="{{ $service_category->id }}">{{ $service_category->name }}</option>
                    @endforeach
                </x-input.select>

                <x-input.error :messages="$errors->get('service_category_id')" class="mt-2" />

            </div>

            <div class="mt-6 flex flex-col">
                <x-input.label for="name" value="Name" />
                <x-input.text id="name" type="text" name="name" autofocus="true" value="{{ old('name') }}" />
                <x-input.error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-6 flex flex-col">
                <x-input.label for="description" value="Beschreibung" />
                <x-input.text id="description" type="text" name="description" value="{{ old('description') }}" />
                <x-input.error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mt-6 flex flex-col">
                <x-input.label for="url" value="URL" />
                <x-input.text id="url" type="text" name="url" value="{{ old('url') }}" />
                <x-input.error :messages="$errors->get('url')" class="mt-2" />
            </div>

            <div class="mt-6 flex flex-col">
                <x-input.label for="image" value="Bild" />
                <x-input.file id="image" name="image" />
                <x-input.error :messages="$errors->get('image')" class="mt-2" />
            </div>

            <div class="mt-4 flex items-center justify-end">
                <x-input.button label="Erstellen" />
            </div>
        </form>


    </div>

</x-app-layout>
