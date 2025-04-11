@extends('layouts.app')
@section('title', 'Edit Task')

@section('content')
    <div class="flex justify-center items-center min-h-[80vh] bg-gray-50">
        <div class="w-full max-w-2xl bg-white p-8 rounded-2xl shadow-2xl">

            <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">✏️ Edit Task</h1>

            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('tasks.index') }}"
                   class="inline-block text-blue-600 hover:text-blue-800 font-semibold">
                    ← Back to Task List
                </a>
            </div>

            <!-- Task Edit Form -->
            <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Task Title -->
                <div>
                    <label for="title" class="block text-lg font-semibold text-gray-700">Task Title</label>
                    <input type="text" id="title" name="title"
                           class="mt-2 w-full p-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                           value="{{ old('title', $task->title) }}" required>
                </div>

                <!-- Task Description -->
                <div>
                    <label for="description" class="block text-lg font-semibold text-gray-700">Task Description</label>
                    <textarea id="description" name="description"
                              class="mt-2 w-full p-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                              rows="4" required>{{ old('description', $task->description) }}</textarea>
                </div>

                <div>
                    <label for="is_done" class="block text-lg font-semibold text-gray-700 mb-2">Task Status</label>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" id="is_done" name="is_done"
                               class="sr-only peer" {{ $task->is_done ? 'checked' : '' }} value="1">
                        <div id="toggle-track"
                             class="w-14 h-8 bg-gray-300 rounded-full transition-all duration-300 relative">
                            <div id="toggle-thumb"
                                 class="absolute left-1 top-1 w-6 h-6 bg-white rounded-full shadow-md transition-all duration-300"></div>
                        </div>
                        <span id="status-text" class="ml-3 text-gray-700 text-base">
                {{ $task->is_done ? '✅ Done' : '❌ Not Done' }}
            </span>
                    </label>
                </div>

                <script>
                    const toggle = document.getElementById('is_done');
                    const track = document.getElementById('toggle-track');
                    const thumb = document.getElementById('toggle-thumb');
                    const statusText = document.getElementById('status-text');

                    updateToggle();

                    toggle.addEventListener('change', function () {
                        updateToggle();
                    });

                    function updateToggle() {
                        if (toggle.checked) {
                            track.classList.add('bg-green-500');
                            track.classList.remove('bg-gray-300');
                            thumb.classList.add('translate-x-6');
                            thumb.classList.remove('left-1');
                            statusText.textContent = '✅ Done';
                        } else {
                            track.classList.add('bg-gray-300');
                            track.classList.remove('bg-green-500');
                            thumb.classList.remove('translate-x-6');
                            thumb.classList.add('left-1');
                            statusText.textContent = '❌ Not Done';
                        }
                    }
                </script>

                <!-- Submit Button -->
                <div class="text-center pt-2">
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 transition-colors duration-200 text-white px-6 py-3 rounded-xl text-lg font-medium shadow-md">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
