<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Restaurant')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
    <nav>
        <ul>
        </ul>
    </nav>

    <h1>@yield('title')</h1>

    <div>
        @yield('content')
    </div>
</body>
</html>
