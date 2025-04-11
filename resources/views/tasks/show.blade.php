@extends('layouts.app')
@section('title', 'View Task')

@section('content')
    <div class="flex justify-center items-center min-h-[80vh] bg-gray-50">
        <div class="w-full max-w-2xl bg-white p-8 rounded-2xl shadow-2xl">

            <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">📋 Task Details</h1>

            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('tasks.index') }}"
                   class="inline-block text-blue-600 hover:text-blue-800 font-semibold">
                    ← Back to Task List
                </a>
            </div>

            <!-- Task Info -->
            <div class="space-y-6">
                <!-- Title -->
                <div>
                    <h2 class="text-lg font-semibold text-gray-700">Task Title</h2>
                    <p class="mt-2 p-3 bg-gray-100 rounded-xl text-gray-800 shadow-sm">{{ $task->title }}</p>
                </div>

                <!-- Description -->
                <div>
                    <h2 class="text-lg font-semibold text-gray-700">Task Description</h2>
                    <p class="mt-2 p-3 bg-gray-100 rounded-xl text-gray-800 shadow-sm">
                        {{ $task->description ?? '—' }}
                    </p>
                </div>

                <!-- Status -->
                <div>
                    <h2 class="text-lg font-semibold text-gray-700 mb-2">Task Status</h2>
                    <div class="inline-flex items-center">
                        <span class="text-xl">
                            {{ $task->is_done ? '✅ Done' : '❌ Not Done' }}
                        </span>
                    </div>
                </div>

                <!-- Created & Updated -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4 text-sm text-gray-500">
                    <div>
                        <span class="font-medium text-gray-700">Created at:</span>
                        <span class="block mt-1">{{ $task->created_at->format('Y-m-d H:i') }}</span>
                    </div>
                    <div>
                        <span class="font-medium text-gray-700">Last updated:</span>
                        <span class="block mt-1">{{ $task->updated_at->format('Y-m-d H:i') }}</span>
                    </div>
                </div>
            </div>

            <!-- Edit Button -->
            <div class="text-center mt-10">
                <a href="{{ route('tasks.edit', ['task'=>$task]) }}"
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl text-lg font-medium shadow-md transition">
                    ✏️ Edit Task
                </a>
            </div>
        </div>
    </div>
@endsection
