<div>
    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'search_users')">Open</button>
    <x-modal name="search_users" class="py-10">
        <div class="mx-auto p-4 m-4">
            <input class="w-full m-2 p-2" type="text" wire:model="search">

            @if ($users)
                <div class="p-2 m-2 border border-gray-500 h-64 overflow-y-scroll">
                    @foreach ($users as $user)
                            <div class="flex">
                                <div class="p-2 rounded-xl border border-gray-600 m-1 flex-1">
                                    <a class="text-gray-200 font-medium p-1 m-1" href="{{ route('admin.user.show', $user->id) }}">{{{ $user->name }}}</a>
                                </div>
                                <div class="p-2 rounded-xl border border-gray-600 m-1 flex-1">
                                    <button wire:click="addUserToDepartment({{ $user->id }})">Click me!</button>
                                    {{-- <button name="user" wire:model="user" value="{{ $user->id }}" wire:click="addUserToDepartment">Select</button> --}}
                                </div>
                            </div>
                    @endforeach
                </div>
            @endif

            @if (session()->has('added'))
                <div class="p-2 m-2 w-full bg-green-400">
                    <p class="text-gray-700 font-semibold">{{ session('added') }}</p>
                </div>
            @endif
        </div>
    </x-modal>
</div>
