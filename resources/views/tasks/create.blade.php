@extends('layouts.app')
@section('title', 'Create New Task')

@section('content')
    <div class="flex justify-center items-center min-h-[80vh] bg-gray-50">
        <div class="w-full max-w-2xl bg-white p-8 rounded-2xl shadow-2xl">

            <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">📝 Create a New Task</h1>

            <!-- Task Creation Form -->
            <form action="{{route('tasks.store')}}" method="POST" class="space-y-6">
                @csrf
                @method('POST')

                <!-- Task Title -->
                <div>
                    <label for="title" class="block text-lg font-semibold text-gray-700">Task Title</label>
                    <input type="text" id="title" name="title"
                           class="mt-2 w-full p-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="Enter task title" required>
                </div>

                <!-- Task Description -->
                <div>
                    <label for="description" class="block text-lg font-semibold text-gray-700">Task Description</label>
                    <textarea id="description" name="description"
                              class="mt-2 w-full p-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                              rows="4" placeholder="Write a short description..." required></textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 transition-colors duration-200 text-white px-6 py-3 rounded-xl text-lg font-medium shadow-md">
                        Add Task
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
