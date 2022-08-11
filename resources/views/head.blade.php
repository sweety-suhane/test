<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testproject</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <link rel="stylesheet" href="{{asset( 'assets/css/bootstrap.css' )}}">
    <link rel="stylesheet" href="{{asset( 'assets/css/employee.css' )}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css">
    <script type="text/javascript" src="{{asset( 'assets/js/jquery.js' )}}"></script>
    <script type="text/javascript" src="{{asset( 'assets/js/popper.js' )}}"></script>
    <script type="text/javascript" src="{{asset( 'assets/js/bootstrap.js' )}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>
    <script> alertify.set('notifier','position', 'top-right');</script>
</head>
<body>
 @yield('content')

</body>

</html>