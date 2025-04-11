<nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center rounded-b-2xl">
    <a href="{{route('tasks.index')}}" class="text-2xl font-bold text-gray-800 hover:text-blue-600 transition-all">
        ✅ ToDo App
    </a>
    <ul class="flex space-x-6">
        <li>
            <a href="{{route('tasks.index')}}" class="text-gray-600 hover:text-blue-600 transition">Home</a>
        </li>
        <li>
            <a href="{{route('tasks.create')}}" class="text-gray-600 hover:text-blue-600 transition">Add Task</a>
        </li>
    </ul>
</nav>
