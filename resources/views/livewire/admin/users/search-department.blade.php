<div>
    <x-modal name="search_users">
        {{-- TODO: Be able to close the modal with someting else than `ESC`, maybe an SVG cross? --}}
        <div class="mx-auto p-4 m-4">
            <input placeholder="Search users" class="w-full m-2 p-2 rounded-xl bg-gray-500 text-gray-200 focus:border focus:border-gray-400 focus:shadow-md focus:shadow-gray-700 placeholder:text-gray-300" type="text" wire:model="search">

            @if ($users)
                <div class="p-2 m-2 border border-gray-500 h-full overflow-y-scroll">
                    @foreach ($users as $user)
                            <div class="flex">
                                <div class="p-2 rounded-xl border border-gray-600 m-1 flex-1">
                                    <a class="text-gray-200 font-medium p-1 m-1" href="{{ route('admin.user.show', $user->id) }}">{{{ $user->name }}}</a>
                                </div>
                                <div class="p-2 rounded-xl border-2 border-gray-400 bg-gray-500 m-1 flex-1">
                                    <button class="p-1 text-gray-100 font-medium" wire:click.prevent="addUserToDepartment({{ $user->id }}, {{ $department->id }})">Set manager</button>
                                </div>
                            </div>
                    @endforeach
                </div>
            @endif

            @if (session()->has('added'))
                <div class="p-4 m-2 w-full bg-green-500 rounded-xl shadow-lg">
                    <p class="text-gray-800 font-semibold">{{ session('added') }}</p>
                </div>
            @endif
        </div>
    </x-modal>
</div>

