<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                    <div class="min-w-full align-middle">
                        <form action="{{ route('tasks.update', $task) }}" method="POST">
                            @csrf
                            @method('PUT')


                            <table class="min-w-full divide-y divide-gray-200 border mt-6 mb-6 ">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-50 text-left">
                                            <span
                                                class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Task Name</span>
                                        </th>
                                        <th class="px-6 py-3 bg-gray-50 text-left">
                                            <span
                                                class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Description</span>
                                        </th>
                                        <th class="px-6 py-3 bg-gray-50 text-left">
                                            <span
                                                class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</span>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            <input class="border-0 border-b-2 border-gray-200" type="text"
                                                id="title" name="title" value="{{ $task->title }}" required />
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            <textarea class="border-0 border-b-2 border-gray-200" type="text"
                                                id="description" name="description"  value="" required >{{ $task->description }}</textarea>

                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            <div class="flex items-center">
                                                <input type="checkbox" id="is_completed" name="is_completed" value="1" {{ $task->is_completed ? 'checked' : '' }} />
                                                <label for="is_completed" class="ml-2">Completed</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                                <div class="mb-6 flex justify-between">

                                    <div>
                                        <a href="{{ route('tasks.show', $task->id) }}">
                                            <x-secondary-button>Cancel</x-secondary-button>
                                        </a>
                                        <a href="{{ route('tasks.show', $task->id) }}">
                                            <x-primary-button>Update task</x-primary-button>
                                        </a>
                                    </div>
                                    <div>
                                        <a onclick="return confirm('Are you sure?')">
                                            <x-danger-button form="delete-form">Delete</x-danger-button>
                                        </a>
                                    </div>
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
                        <form action="/tasks/{{ $task->id }}" method="POST" id="delete-form">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
