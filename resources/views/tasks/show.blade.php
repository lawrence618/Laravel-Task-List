<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $task->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                    <div class="min-w-full align-middle">
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
                                                    {{ $task->title }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                                    {{ $task->description }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 ">
                                            @if($task->is_completed)
                                                <span class="font-medium text-green-500">Completed</span>
                                            @else
                                                <span class="font-medium text-red-500">Not Completed</span>
                                            @endif
                                        </td>
                                            </tr>
                                    </tbody>
                        </table>
                        <div class="mb-6 flex justify-between">
                            <div>
                                <a href="{{ route('tasks.index') }}">
                                    <x-secondary-button>Back</x-secondary-button>
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('tasks.edit', $task->id) }}">
                                    <x-primary-button>Edit</x-primary-button>
                                </a>
                                @if (auth()->user()->is_admin)
                                    <a onclick="return confirm('Are you sure?')">
                                        <x-danger-button form="delete-form">Delete</x-danger-button>
                                    </a>
                                @endif
                            </div>
                        </div>
                        
                    </div>
                    <form action="/tasks/{{ $task->id }}" method="POST" id="delete-form">
                            @csrf
                            @method('DELETE')
                        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
