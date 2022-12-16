@extends('main.pagina_principal')
@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<script>
$(document).ready(function() {
  $('#example').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
});
    </script>
<div class="contenedor">

  <div class="container">
    <h1 class="estiloTitulos">Devolucion Equipos</h1>
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

               

<form action="devolucion" method="POST">
      <div class="col-md-6">
        <label>CODIGO/IMEI:</label>
    

        
        <br><input type="text" name="serie" id="serie" onkeypress="return ValidarInput(event);"> 
        <br>
        <label>RUT TRABAJADOR:</label>
 

        <br><input type="text" name="rut" id="rut" onkeypress="return ValidarInput(event);"> 
        <input type="submit"
          class="btn btn-primary" value="Generar">        
        <br>



        @csrf
</form>
        <br>
        <div class="col-md-6">
        </div>
      </div>

    </div>
    <table id="example" class="table  table table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>

          <th>RUT TRABAJADOR</th>
          <th>NOMBRE TRABAJADOR</th>
          <th>CODIGO DISPOSITIVO</th>
          <th>NOMBRE DISPOSITIVO</th>
          <th>FECHA DEVOLUCION</th>
          <th>OPCIONES</th>
        </tr>
      </thead>
      <tbody>

      @foreach($resultado as $resultado)
<tr>
    <form action="{{route ('imprimirdev')}}" method="GET">   
      <td>{{$resultado->rut}}</td>
      <td>{{$resultado->nombre_trabajador." ".$resultado->segundo_nombre." ".$resultado->apellido_paterno}}</td>
        <td>{{$resultado->serie}}</td>
        <td>{{$resultado->marca." ".$resultado->modelo}}</td>
        <td>{{$resultado->fecha_devolucion}}</td>


        <td>
      <button type="submit" class="btn bg-info text-white" >
      <img src="image/icon/descargar2.png">
      </button>
            <input type="hidden" value="<?php echo $resultado->tipo_dispositivo?>" name="tipo"> 
            <input type="hidden" value="<?php echo $resultado->marca ?>" name="marca"> 
            <input type="hidden" value="<?php echo $resultado->modelo ?>" name="modelo"> 
            <input type="hidden" value="<?php echo $resultado->color ?>" name="color"> 
            <input type="hidden" value="<?php echo $resultado->serie ?>" name="serie"> 
            <input type="hidden" value="<?php echo $resultado->sim ?>" name="sim"> 
            <input type="hidden" value="<?php echo $resultado->abonado ?>" name="abonado">
            <input type="hidden" value="<?php echo $resultado->nombre_trabajador." ".$resultado->segundo_nombre." ".$resultado->apellido_paterno?>" name="nombreCompleto">
            <input type="hidden" value="<?php echo $resultado->nombre_dependencia ?>" name="nombre_dependencia">
            <input type="hidden" value="<?php echo $resultado->tipos_dependencia ?>" name="tipo_dependencia">
            <input type="hidden" value="<?php echo $resultado->dependencia_tipo ?>" name="departamento">
            <input type="hidden" value="<?php echo $resultado->fecha_devolucion ?>" name="fecha_devolucion">
            <input type="hidden" value="<?php echo $resultado->cargo_fijo ?>" name="cargo_fijo">
     
          </form>

      @endforeach

</td>

</form>

    </table>
  </div>
  
  <br>
  <br>
  <br>

  @endsection