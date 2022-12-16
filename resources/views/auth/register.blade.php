@extends('main.pagina_principal')
@section('content')




<div class="contenedor">
<div class="container">
<div class="row">
                  
@if (session('success'))
 <h6 class="alert alert-success">{{ session('success') }}</h6>
 @endif
@if(session('ePk'))
<h6 class="alert alert-danger">{{ session('ePk') }}</h6>
 @endif
@if ($errors->any())
        <div class="container-fluid">
  
           
        <div class="alert alert-danger col-md-12">
            @foreach ($errors->all() as $error)
            
            <li>{{ $error }}</li>
               
            @endforeach
      
        </div>

        </div>
@endif

<div class="col-md-2">
</div>
<div class="col-md-8">
<form action="/register" method="POST">

<h1 class="estiloTitulos">Registrar cuenta</h1>

<div class="container-fluid">
<div class="row">
<br>

 <label>Nombre: </label>
<input type="text" name="name">
<br>
<label>Usuario: </label>
<input type="text" name="username">
<br>
<label>Correo: </label>
<input type="text" name="email">
<br>
<label>Contraseña: </label>
<input type="password" name="password">
<br>
<label>Confirme contraseña: </label>
<input type="password" name="password_confirmation">
</div>
                                        <br>
<input type="submit" class="btnEstilo" value="Registrar">


@csrf
</form>

</body>
</html>
</div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
               
</div>
@endsection
