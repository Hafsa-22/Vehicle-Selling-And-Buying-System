<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>VehicleHome</title>
</head>

<body>
    {{View::make('header')}}
    @yield("signup")
    @yield("login")
    @yield("author")
    @yield("carhome")
    @yield("edit")
    @yield("detail")
    @yield("search")
    @yield("addpost")
    {{View::make('footer')}}

</body>

</html>