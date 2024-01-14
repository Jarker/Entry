<html>
<head>
    <title>Entry Code</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center my-3">
        <h1 class="text-3xl">Entry code</h1>
        <a class="text-blue-500 hover:text-blue-600" href="{{ route('entry-code.manage') }}">Manage</a>
    </div>
    @yield('content')
</div>
</body>
</html>
