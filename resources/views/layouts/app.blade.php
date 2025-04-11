<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'ToDo App')</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen text-gray-800">

{{-- Navbar --}}
@include('components.navbar')

{{-- Flash Messages --}}
<div class="container mx-auto px-4 mt-6">
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded-xl mb-4 text-center shadow">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-4 text-center shadow">
            {{ session('error') }}
        </div>
    @endif

    @if (session('info'))
        <div class="bg-blue-100 border border-blue-400 text-blue-800 px-4 py-3 rounded-xl mb-4 text-center shadow">
            {{ session('info') }}
        </div>
    @endif
</div>

{{-- Main Content --}}
<main class="container mx-auto px-4 py-8">
    @yield('content')
</main>

</body>
</html>
