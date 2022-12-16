@extends('main.pagina_principal')
@section('content')


<div class="contenedor">
        <div class="container-fluid">
        @if (session('success'))
                                        <h6 class="alert alert-success">{{ session('success') }}</h6>
                                               @endif
                                               @if(session('ePk'))
                                               <h6 class="alert alert-danger">{{ session('ePk') }}</h6>
                                               @endif
                                               @if ($errors->any())
   
           
        <div class="alert alert-danger col-md-12">
            @foreach ($errors->all() as $error)
            <p>{{$error}}</p> 
            @endforeach
@endif
</div>  
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    
                    <h1 class="estiloTitulos">Cambiar Contraseña</h1>
                    <div class="container-fluid">
                        <div class="row">


                        
                        <form action="{{route('clave-update')}}" method="POST">
                            <label>Usuario: </label>
                            <br>
                            <input type="text" value="{{auth()->user()->username}}" disabled>   
                            <br>
                            <label>Nueva Contraseña: </label>
                            <br>
                            <input type="text" name="password"> 
                            <br>
                            <label>Validar Contraseña: </label>
                            <br>    
                            <input type="text" name="password_confirmation">     

                            @method('patch')
              @csrf

         

                                        
                                        </div>
                                        <br>
                                        <input type="submit" class="btnEstilo" value="Enviar">                                    </div>
</form>
                                    </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>

@endsection