
<!DOCTYPE html>
<html lang="en">
<link href="{{ asset('css/style.css')}}" rel="stylesheet"/>
    <script src="{{ asset('/js/javascript.js')}}"></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css"/>
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="{{asset ('js/jquery.js') }}"></script>
    <script src="{{asset ('DataTables/datatables.js') }}"></script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integra</title>
</head>
<body>
@include('nav.nav')
@yield('content')
@include('footer.footer')
</body>
</html>
