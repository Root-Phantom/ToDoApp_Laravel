@extends('layouts.app')
@section('title', 'Task List')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-2xl shadow-lg">
        <h1 class="text-3xl font-bold text-center mb-6">📝 Task List</h1>

        <div class="text-right mb-8">
            <a href="{{ route('tasks.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-3 rounded-xl shadow-sm transition">
                + New Task
            </a>
        </div>

        @if($tasks->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-xl overflow-hidden">
                    <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-4 text-left text-gray-700 font-semibold">Task Title</th>
                        <th class="py-3 px-32 text-right text-gray-700 font-semibold">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @foreach($tasks as $task)
                        <tr
                            onclick="if(!event.target.closest('a, button, form')) window.location='{{ route('tasks.show', ['task' => $task]) }}';"
                            class="hover:bg-gray-50 transition-colors cursor-pointer"
                        >
                            <td class="py-4 px-4 text-gray-900 font-medium">{{ $task->title }}</td>
                            <td class="py-4 px-4 text-right">
                                <div class="flex justify-end items-center gap-3 text-sm">
                                    <a href="{{ route('tasks.edit', ['task' => $task]) }}"
                                       class="text-blue-600 hover:text-blue-800 whitespace-nowrap">✏️ Edit</a>

                                    <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST"
                                          class="inline"
                                          onsubmit="return confirm('⚠️ Are you sure you want to delete this task?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 whitespace-nowrap">
                                            🗑️ Delete
                                        </button>
                                    </form>

                                    <form action="{{ route('tasks.change_is_done', ['task' => $task]) }}" method="POST"
                                          class="inline">
                                        @csrf
                                        @method('PUT')
                                        @if($task->is_done)
                                            <button type="submit"
                                                    class="bg-green-500 text-white px-3 py-3 rounded-xl text-xs hover:bg-green-600 whitespace-nowrap w-24">
                                                ✅ Done
                                            </button>
                                        @else
                                            <button type="submit"
                                                    class="bg-red-500 text-white px-3 py-3 rounded-xl text-xs hover:bg-red-600 whitespace-nowrap w-24">
                                                ❌ Not Done
                                            </button>
                                        @endif
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="flex flex-col items-center justify-center py-12 text-center text-gray-500">
                <svg class="w-12 h-12 mb-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9.75 9.75h.008v.008H9.75V9.75zm4.5 0h.008v.008h-.008V9.75zM4.5 6.75h15M3 6.75A1.5 1.5 0 0 1 4.5 5.25h15a1.5 1.5 0 0 1 1.5 1.5v10.5a1.5 1.5 0 0 1-1.5 1.5h-15A1.5 1.5 0 0 1 3 17.25V6.75zm6.75 6h.008v.008H9.75v-.008zm4.5 0h.008v.008h-.008v-.008z"/>
                </svg>
                <p class="text-lg font-medium">No tasks found</p>
                <p class="text-sm text-gray-400 mt-1">You don’t have any tasks yet. Start by creating one!</p>
            </div>
        @endif
    </div>
@endsection
