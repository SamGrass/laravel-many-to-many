<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css'
        integrity='sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=='
        crossorigin='anonymous' />
    @vite(['resources/js/app.js'])
</head>

<body>
    @include('admin.partials.header')
    <div class="d-flex main-container">
        @auth
        @include('admin.partials.aside')
        @endauth
        <div class="py-2 px-4 content">
            @yield('content')
        </div>
    </div>
</body>

</html>