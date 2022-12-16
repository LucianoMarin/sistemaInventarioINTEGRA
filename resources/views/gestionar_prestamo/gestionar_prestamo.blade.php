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
<form action="{{route ('prestamo')}}" method="POST">
<div class="contenedor">
@csrf
                <div class="container">
                <h1 class="estiloTitulos">Prestamo Equipos</h1>
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

                            <div class="col-md-12 col-xl-7">
                      
                            <label>Seleccionar Trabajador</label>
                            <br>
                            <select id="trabajador" name="trabajador">
                            @foreach($trabajador as $trabajador)
                            <option value="{{$trabajador->rut}}">{{"RUT: ".$trabajador->rut." || "."Nombre: ".$trabajador->nombre." ".$trabajador->apellido_paterno." ".$trabajador->apellido_materno}}</option>
                            @endforeach
                        </select>
                        <br>
                        
                            <label>Seleccionar Dispositivo</label>
                            <br>
                            <select id="dispositivo" name="dispositivo">
                            @foreach($dispositivo as $dispositivo)
                            <option value="{{$dispositivo->serie}}">
                        {{"Tipo: ".$dispositivo->tipo." || Descripcion: ".$dispositivo->marca." ".$dispositivo->modelo." ".$dispositivo->color}}
                            </option>
                            @endforeach
                            </select>
                       
                            <br>

                            </div>
                        
                            
                            <div class="col-md-5">
                            <label>Fecha Prestamo</label>
                            <br>
                            
                            <input type="date" id="fecha_prestamo" name="fecha_prestamo" value="<?php date_default_timezone_set("America/Santiago");
                            echo date("Y-m-d");?>">
                            <br>
                        <br>
                            <input type="submit" class="btnEstilo" value="Generar">
</form>
</div>
</div>
<br>

<table id="example" class="table  table table-hover" cellspacing="0" width="100%">
<thead>
		<tr>
			<th>RUT TRABAJADOR</th>
			<th>NOMBRE TRABAJADOR</th>
      <th>CODIGO DISPOSITIVO</th>
			<th>NOMBRE DISPOSITIVO</th>
			<th>FECHA PRESTAMOS</th>
			<th>OPCIONES</th>
		</tr>
	</thead>
	<tbody>

        @foreach($resultado as $resultado)

		<tr>
        <form action="{{route ('imprimir')}}" method="GET">   
             <td>{{$resultado->rut}}</td>
		      	<td>{{$resultado->nombre_trabajador." ".$resultado->segundo_nombre." ".$resultado->apellido_paterno." ".$resultado->apellido_materno}}</td>
            <td>{{$resultado->serie}}</td>
            <td>{{$resultado->tipo." ".$resultado->marca." ".$resultado->modelo.""}}</td>
            <td>@php
 echo date('d-m-Y', strtotime($resultado->fecha_prestamo));@endphp</td>
 
 @php
      $id=$resultado->prestamo_id;
      @endphp
            <td>
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
            <input type="hidden" value="<?php echo $resultado->fecha_prestamo ?>" name="fecha_prestamo">
            <input type="hidden" value="<?php echo $resultado->cargo_fijo ?>" name="cargo_fijo">
          <button type="submit" class="btn bg-info text-white" >
          <img src="image/icon/descargar2.png">
          </button>
          </form>

          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar{{$id}}" data-target="#eliminar{{$id}}">
 Eliminar
 </button>
</td>


<div class="modal fade" id="eliminar{{$id}}" tabindex="-1" aria-labelledby="eliminar{{$id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Prestamo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
      Esta seguro que desea eliminar el prestamo:
<br>
<br>
<label>Codigo: {{$resultado->serie}} </label>
<br>
<label> {{"Descripción: ".$resultado->dispositivo_tipo." ".$resultado->marca." ".$resultado->modelo }}</label>

    <br>
    <br>
    <label>ASOCIADO AL TRABAJADOR: </label>
    <br>
      <label>{{"Trabajador: ".$resultado->nombre_trabajador." ". $resultado->segundo_nombre . " ".$resultado->apellido_paterno}}</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form method="POST" action="{{route ('prestamo-destroy', [$resultado->prestamo_id])}}">
        <input type="submit" value="Eliminar" class="btn btn-primary">
        @method('DELETE')
            @csrf
      </div>
    </div>
  </div>
</div>
      
            </form>
@endforeach
</table>
</div>
        <br>
        <br>
        <br>

        @endsection