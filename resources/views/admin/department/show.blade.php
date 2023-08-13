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
                        <h4 class="text-lg font-semibold text-gray-400">Member count: <span class="text-gray-300">{{ $department->members }}</span></h4>
                    </div>
                    <div class="p-2 border-b-2 border-gray-300"></div>
                    <div class="mx-auto text-center p-10">
                        <div class="max-w-2xl mx-auto">
                            {{-- TODO: Make a department editor --}}

                            <div class="flex">
                                <div class="max-w-xl flex-1 p-2 m-2">
                                    {{-- Department editor --}}
                                    <form class="p-2 m-2 shadow-xl shadow-gray-900 rounded-xl border-2 border-gray-700"
                                        action="{{ route('admin.department.edit', ['id' => $department->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="flex flex-col max-w-xl gap-6 p-2 m-2 content-center">
                                            <input type="text" x-model="department_name"
                                                value="{{ old('name', $department->name) }}"
                                                class="p-3 dark:bg-gray-700 border-none rounded-xl block shadow-md dark:shadow-gray-800 dark:text-gray-200 dark:placeholder-gray-400"
                                                name="name" />
                                            {{-- <input type="text" value="{{ old('email', $department->manager) }}" class="p-3 dark:bg-gray-700 border-none rounded-xl block shadow-md dark:shadow-gray-800 dark:text-gray-200 dark:placeholder-gray-400" name="email" /> --}}
                                            {{-- * Line 31 should be a search box linked to the user model, maybe using Inertia --}}
                                            {{-- ! TODO: Applications toggle (on/off), with a checkbox --}}
                                            {{-- Manager selection --}}
                                            <div x-data="{ user: '' }">
                                                <input type="text" name="manager" id="user" x-model="user" />
                                                {{-- TODO:  Should get a list of around 3 users per search with the ability to select a user and add them as the department manager --}}
                                            </div>
                                        </div>
                                        <div class="p-2 m-2">
                                            <button
                                                class="p-2 m-2 w-full bg-gray-700 rounded-xl max-w-md text-gray-100 shadow-md shadow-gray-800"
                                                type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                {{-- Members --}}
                                {{-- TODO !: Height of the member list is off, going to have to figure out the correct styling to keep it in the same style --}}
                                <div
                                    class="max-w-xl flex-1 p-2 m-2 shadow-xl shadow-gray-900 rounded-xl border-2 border-gray-700">
                                    <div>
                                        @foreach ($department->members($department) as $member)
                                            <div class="p-2 m-2 rounded-xl border border-gray-900 bg-gray-500">
                                                <a class="p-2 m-2 text-md font-medium text-gray-300"
                                                    href="{{ route('admin.user.show', $member->id) }}"
                                                    target="_blank">{{ $member->name }}</a>
                                            </div>
                                        @endforeach
                                        <div>
                                            {{ $department->members($department)->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
