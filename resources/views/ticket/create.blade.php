
<x-app-layout>
    <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0 dark:bg-gray-900">
       <h1 class="text-lg font-bold">Create new Ticket</h1>
        <div class="w-full p-8 px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-xl dark:bg-gray-800 sm:rounded-lg">
            <form method="POST">
                @csrf

                <!-- Title -->
                <div class="mt-4">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input placeholder="Enter title" id="title" class="block w-full mt-1" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- Description -->
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-area placeholder="Add description" name="description" id="description"/>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <!-- file -->
                <div class="mt-4">
                    <x-input-label for="attachment" :value="__('Attachment')" />
                    <x-input-file id="attachment" name="attachment"/>
                </div>

                <div class="mt-4 text-right">
                    <x-primary-button class="ms-4">
                        {{ __('CREATE') }}
                    </x-primary-button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
