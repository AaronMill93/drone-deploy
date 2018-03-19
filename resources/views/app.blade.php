<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>

    <!-- Legacy CSS Vendor -->
    <link href="/css/vendor/bootstrap.min.css" rel="stylesheet">
    <link href="/css/vendor/font-awesome.css" rel="stylesheet">

    <!-- Webpack CSS -->
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
@yield('content')   

<!-- Legacy Javascript Vendor -->
<script src="/js/vendor/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="/js/vendor/bootstrap.min.js"></script>
<script src="/js/dist.js"></script>

<!-- Webpack Javascript -->
<script src="/js/app.js"></script>

</body>
</html>