<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIXTAPEnotes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="js/script.js"></script>
</head>
<body>

    @include('components/header')

    <div class="max-w-7xl min-h-screen mx-auto">
        @yield('main')
    </div>

    @include('components/footer')

</body>
</html>