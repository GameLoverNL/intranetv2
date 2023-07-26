@props(['user'])

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-100 font-semibold sm:text-lg">{{ $user->name }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl w-full my-auto">
            <div class="p-2 bg-gray-50 ">

            </div>
        </div>
    </div>
</x-app-layout>
