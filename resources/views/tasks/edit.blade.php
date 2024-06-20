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
                            <div class="space-y-12">
                                <div class="border-b border-gray-900/10 pb-12">
                                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-4">
                                            <label for="title"
                                                class="block text-sm font-medium leading-6 text-gray-900">Task
                                                Name</label>
                                            <div class="mt-2">
                                                <div
                                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md @error('title') border-red-500 @enderror">
                                                    <input type="text" name="title" id="title"
                                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                        value="{{ $task->title }}" required />

                                                </div>
                                                @error('title')
                                                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-span-full">
                                            <label for="description"
                                                class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                            <div class="mt-2">
                                                <textarea id="description" name="description" rows="3"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('description') border-red-500 @enderror">{{ $task->description }}</textarea>
                                            </div>

                                            <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about
                                                the task.</p>
                                            @error('description')
                                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox" id="is_completed" name="is_completed" value="1"
                                                {{ $task->is_completed ? 'checked' : '' }} />
                                            <label for="is_completed" class="ml-2">Completed</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6 flex items-center justify-end gap-x-6">
                                    <a href="{{ route('tasks.show', $task->id) }}">
                                        <x-secondary-button>Cancel</x-secondary-button>
                                    </a>
                                    <a href="{{ route('tasks.show', $task->id) }}">
                                        <x-primary-button>Update task</x-primary-button>
                                    </a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
