<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Writer Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <div class="text-xl font-semibold text-gray-700">Writer Dashboard</div>
                <div class="flex space-x-4">
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-500">Home</a>
                    <a href="{{ route('articles.create') }}" class="text-gray-700 hover:text-blue-500">Add Article</a>
                    <a href="{{ route('articles.my_articles') }}" class="text-gray-700 hover:text-blue-500">My Articles</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-blue-500">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-6 py-8">
        @yield('content')
    </div>
</body>
</html>
