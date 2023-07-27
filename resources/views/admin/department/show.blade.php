@props(['department'])

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-100 font-semibold sm:text-lg">{{ $department->name }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl w-full mx-auto">
            <div class="p-2 rounded-2xl shadow-lg bg-gray-800 shadow-gray-950 ">
                <div class="p-4">
                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-gray-100">{{ $department->name }}</h3>
                        <h4 class="text-lg font-medium text-gray-200">Department</h4>
                    </div>
                    <div class="p-2 border-b-2 border-gray-300"></div>
                    <div class="mx-auto text-center p-2">
                        <h3 class="text-xl font-semibold p-2 text-gray-100">Department information</h3>
                        <div class="max-w-lg mx-auto">
                            {{-- TODO: Make a department editor --}}
                            {{-- * See README file for requirements for the department editor --}}
                            <div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


{{-- <form class="p-2 m-2 shadow-xl shadow-gray-900 rounded-xl border-2 border-gray-700" action="{{ route('admin.user.edit', ['id' => $user->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="flex flex-col max-w-xl gap-6 p-2 m-2 content-center">
        <input type="text" value="{{ old('name', $user->name) }}" class="p-3 dark:bg-gray-700 border-none rounded-xl block shadow-md dark:shadow-gray-800 dark:text-gray-200 dark:placeholder-gray-400" name="name" />
        <input type="text" value="{{ old('email', $user->email) }}" class="p-3 dark:bg-gray-700 border-none rounded-xl block shadow-md dark:shadow-gray-800 dark:text-gray-200 dark:placeholder-gray-400" name="email" />
    </div>
    <div>
        <button class="p-2 m-2 w-full bg-gray-700 rounded-xl max-w-md text-gray-100 shadow-md shadow-gray-800" type="submit">Submit</button>
    </div>
</form> --}}