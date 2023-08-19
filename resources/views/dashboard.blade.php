<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 m-2 text-gray-300 text-center">
                    <h3 class="font-semibold text-lg">{{ __('Public service announcements') }}</h3>
                </div>
                <div class="pb-4 text-gray-300 mx-auto text-center">
                    {{-- @foreach ($psas as $psa) --}}
                        <div class="p-4 m-2 rounded-md border border-gray-400 max-w-3xl mx-auto">
                            <h4 class="border-b border-b-gray-500 pb-2">$psa->title | $psa->user->name - $psa->department</h4>
                            <div class="pt-4 p-2">
                                $psa->content (small piece)
                            </div>
                            <div class="border-t border-t-gray-500 p-2">
                                route()->to('department.show', $psa->department->id)
                            </div>
                        </div>
                    {{-- @endforeach --}}
                    <div>
                        {{-- {{ $psas->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
