@props(['departments', 'users'])

<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl text-gray-100 font-semibold sm:text-lg">{{ __('Admin dashboard') }}</h2>
    </x-slot>

    <div class="p-10 sm:p-5 box-border">
        <div class="max-w-6xl lg:p-8 sm:p-4 mx-auto max-h-fit">

            <div class="flex flex-row w-full">
                <div class="flex-1 max-w-4xl p-2 w-full mx-2">
                    <div class="flex flex-col max-w-1xl">
                        @foreach ($users as $user)
                            <div class="flex flex-row p-2">
                                <div class="flex-1 bg-gray-200 p-2 m-1 shadow-lg shadow-gray-500 rounded-lg">
                                    <p>{{ $user->id }}</p>
                                    <p>{{ $user->name }}</p>
                                    <p>Department</p>
                                </div>
                                <div class="flex-1 bg-gray-400 p-2 m-1 shadow-lg shadow-gray-500 rounded-lg">
                                    <div class="flex flex-col p-1 flex-wrap">
                                        <a class="rounded-lg text-gray-900 font-semibold bg-blue-300 shadow-md shadow-blue-400 text-center p-1 m-1" href="{{ route('admin.user.show', ['id' => $user->id]) }}">Show</a>
                                        <a class="rounded-lg text-gray-900 font-semibold bg-red-300 shadow-md shadow-red-400 text-center p-1 m-1" href="{{ route('admin.user.edit', ['id' => $user->id]) }}">Delete</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="m-2">{{ $users->links() }}</div>
                </div>
                <div class="flex-1 max-w-3xl p-2 w-full mx-2">
                    <div class="flex flex-col max-w-1xl">
                        @foreach ($departments as $department)
                            <div class="flex flex-row p-2">
                                <div class="flex-1 bg-gray-200 p-2 m-1 shadow-lg shadow-gray-500 rounded-lg">
                                    <p>{{ $department->id }}</p>
                                    <p>{{ $department->name }}</p>
                                    <p>Manager</p>
                                </div>
                                <div class="flex-1 bg-gray-400 p-2 m-1 shadow-lg shadow-gray-500 rounded-lg">
                                    <div class="flex flex-col p-1 flex-wrap">
                                        <a class="rounded-lg text-gray-900 font-semibold bg-blue-300 shadow-md shadow-blue-400 text-center p-1 m-1" href="{{ route('admin.department.edit', ['id' => $department->id]) }}">Show</a>
                                        <a class="rounded-lg text-gray-900 font-semibold bg-red-300 shadow-md shadow-red-400 text-center p-1 m-1" href="{{ route('admin.department.edit', ['id' => $department->id]) }}">Delete</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="m-2">{{ $departments->links() }}</div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
