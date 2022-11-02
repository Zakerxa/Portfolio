<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Facebook Meta -->
    <meta property="fb:pages" content="100240385045148" />
    <meta property="og:url" content="https://portfolio.zakerxa.com" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Zakerxa Portfolio" />
    <meta property="og:description" content="I am a BackEnd Web Developer with over 4 years of experience with PHP & VueJs." />
        <title>Portfolio</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./slick/slick.css">
        <link rel="stylesheet" href="./slick/slick-theme.css">
        <link rel="shortcut icon" href="images/circle.png" type="image/x-icon">
        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div id="app"></div>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="./slick/slick.min.js"></script>
        <script src="./adminlte/dist/js/adminlte.min.js"></script>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
