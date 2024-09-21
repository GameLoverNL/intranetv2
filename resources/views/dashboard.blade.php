@props(['psas'])

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center gap-4">
                @foreach ($psas as $psa)
                    {{-- @if ($psa->department == auth()->user()->department) --}}
                        <div class="p-4 bg-gray-300 rounded-md">
                            <h4 class="p-1 text-center text-lg font-medium border-b-2 border-b-gray-500">{{ $psa->title }} | {{ $psa->user->name }}</h4>
                            <div class="pt-2 text-md max-w-md">
                                {{ substr($psa->content, 0, 256)  }}
                            </div>
                        </div>
                    {{-- @endif --}}
                @endforeach
                <div class="p-2 m-2">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
