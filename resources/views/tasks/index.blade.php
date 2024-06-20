<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                    <div class="min-w-full align-middle">
                        <a href="{{ route('tasks.create') }}">
                            <x-primary-button>Add new product</x-primary-button>
                        </a>
                        <table class="min-w-full divide-y divide-gray-200 border mt-6 mb-6 ">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Task
                                            Name</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                @forelse($tasks as $task)
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 ">
                                            @if($task->is_completed)
                                                <span class="text-gray-500">{{ $task->title }}</span>
                                            @else
                                                <span class="text-gray-900">{{ $task->title }}</span>

                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 ">
                                            @if($task->is_completed)
                                                <span class="font-medium text-green-500">Completed</span>
                                            @else
                                                <span class="font-medium text-red-500">Not Completed</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            <a href="{{ route('tasks.show', $task->id) }}">
                                                <x-secondary-button>Show more</x-secondary-button>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white">
                                        <td colspan="2"
                                            class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ __('No tasks found') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $tasks->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
