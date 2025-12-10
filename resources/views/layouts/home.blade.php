<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <!-- Tailwind CDN for quick styling improvements (keeps functionality intact) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-[100dvh] bg-[url(images/chanda.jpg)] bg-contain bg-cover bg-fixed bg-center bg-black w-full flex flex-col gap-4 items-center justify-center p-8">
    @yield('content')
</body>
</html>