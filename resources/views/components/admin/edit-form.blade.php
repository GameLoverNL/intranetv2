@props(['value'])

{{-- ! Make the component work :D --}}

<div>
    <form {{ $attributes->merge(['action' => '#', 'class' => '', 'value' => '']) }}>
        @csrf


        {{ $slot }}
        {{-- <div class="flex flex-col p-2 m-2">
            <x-input-label class="text-left p-2" for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full rounded-xl" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />

            <x-input-label class="text-left p-2" for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="text" class="mt-1 block w-full rounded-xl" :value="old('name', $user->email)" required autofocus autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            <x-primary-button class="dark:bg-gray-800 dark:text-white hover:dark:bg-gray-700">Submit</x-primary-button>
        </div> --}}
    </form>
</div>
