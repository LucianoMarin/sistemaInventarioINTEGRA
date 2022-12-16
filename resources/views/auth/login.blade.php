<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido al sistema</title>
    <link href="{{asset('css/style.css')}}" rel="stylesheet"/>
    <script src="{{asset('/js/javascript.js')}}"></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

  

    
</head>
<body>
    
<form action="/login" method="POST"  autocomplete="off"> 
    
@csrf
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

</div>
</div>
</div>
<br>
    <div class="container-fluid">
<div class="row">
<div class="tLogin col-md-5">
<img class="iLogin" src="image/banner.png">
</div>

<div class="col-md-5 col-xxl-4">
<div class="clogin">
<p>Usuario</p>
<input class="inEstilo" name="username" type="text">
<br>
<br>
<p>Contraseña</p>
<input class="inEstilo" name="password"  type="password" >
<br>
<br>
<div class="pbtn">
<input class="btnEstilo" type="submit" value="Enviar">
</div>
</form>
<br>
<div class="col-md-12 col-xxl-12">

                                
                                               @if ($errors->any())
        <div class="alert alert-danger col-md-12">
            @foreach ($errors->all() as $error)
            <p class="emLogin">{{$error}}</p> 
            @endforeach
@endif
</div>
</div>

    </div>

</body>
</html>