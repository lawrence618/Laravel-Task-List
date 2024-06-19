<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create new  task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                    <div class="min-w-full align-middle">
                        <form action="{{ route('tasks.store') }}" method="POST">
                            @csrf

                            <table class="min-w-full divide-y divide-gray-200 border mt-6 mb-6 ">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-50 text-left">
                                            <span
                                                class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Task Name</span>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            <input class="border-0 border-b-2 border-gray-200" type="text"
                                                id="title" name="title" placeholder="Enter task title"
                                                required />
                                        </td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-50 text-left">
                                            <span
                                                class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Description</span>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            <textarea class="border-0 border-b-2 border-gray-200" type="text"
                                                id="description" name="description" placeholder="Enter task description"
                                                required ></textarea>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="mb-6">
                                <a href="{{ route('tasks.index') }}">
                                    <x-secondary-button>Cancel</x-secondary-button>
                                </a>
                                <a href="">
                                    <x-primary-button>Add task</x-primary-button>
                                </a>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger" style="color: red">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
