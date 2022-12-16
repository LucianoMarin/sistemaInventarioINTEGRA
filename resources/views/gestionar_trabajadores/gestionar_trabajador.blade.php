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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                    <h1 class="estiloTitulos">Gestionar Trabajador</h1>
                    <div class="container-fluid">
                        <div class="row">
                           
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" data-bs-whatever="@mdo" onclick="return limpiarTrabajador();">Ingresar
                                        Trabajador</button>
                                
                                        @if (session('success'))
                                        <h6 class="alert alert-success">{{ session('success') }}</h6>
                                               @endif
                                               @if(session('ePk'))
                                               <h6 class="alert alert-danger">{{ session('ePk') }}</h6>
                                               @endif

      
        @if ($errors->any())
     
    
           
        <div class="alert alert-danger col-md-12">
            @foreach ($errors->all() as $error)
            
            <li>{{ $error }}</li>
               
            @endforeach
       
  

@endif
</div>

                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="estiloTitulos" id="exampleModalLabel">INGRESAR TRABAJADOR
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Cerrar"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route ('trabajador')}}" method="POST">
                                                    @csrf
                             
                                                    <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="cInput">
                                                                <div class="col-md-12">
                                                                </div>
                                                                <div class="col-md-12">
                                                                
                                                                        <div class="row">
                                                                                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                                                    
                                                                                    <label class="atInput">Rut</label>
                                                                                    <br>
                                                                                    <input type="text" id="rut" name="rut" placeholder="Ej:1877516-0"  required="required" onkeypress="return validarNumero(event);">
                                                                                    <br>
                                                                                    <label>Nombre</label>
                                                                                    <br>
                                                                                    <input type="text" id="nombre" name="nombre" required="required" onkeypress="return ValidarInput(event);">
                                                                                    <br>
                                                                                    <label>Segundo Nombre</label>
                                                                                    <br>
                                                                                    <input type="text" id="s_nombre" name="segundo_nombre" required="required" onkeypress="return ValidarInput(event);">
                                                                                    <br>
                                                                                    <label>Apellido Paterno</label>
                                                                                    <br>
                                                                                    <input type="text" id="ap_paterno" name="apellido_paterno" required="required" onkeypress="return ValidarInput(event);">
                                                                                    <br>
                                                                                    <label>Apellido Materno</label>
                                                                                    <br>
                                                                                    <input type="text" id="ap_materno" name="apellido_materno" required="required" onkeypress="return ValidarInput(event);">
                                                                                    <br>
                                                                                    <br>
                                                                                </div>
                                                                            
                                                                                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                                                                <label>Correo</label>
                                                                                <br>
                                                                                <input class="tmInput" id="correo" placeholder="Ejemplo@correo.cl" name="correo" type="text" required="required" onkeypress="return ValidarInput(event);">
                                                                                    <br>
                                                                                    <br>
                                                                                    <label>Dependencia de trabajo: </label>
                                                                                    <br>
                                                                                    <br>
                                                                                
                                                                                    <select id="dependencia" name="dependencia">
                                                                                    @foreach($dependencia as $dependencia2)
                                                                                        <option selected="selected" value="{{$dependencia2->id}}">{{$dependencia2->tipo.": ".$dependencia2->nombre}}
                                                                                        @endforeach
                                                                                    </option>
                                                                                    </select>
                                                                           
                                                                                  <br>
                                                                            
                                                                                  
                                                                                    <br>
                                                                                    <br>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                     
                                              
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cerrar</button>



                                                        
                                                        <input type="submit"  type="button" class="btn btn-primary" value="Enviar">
                                                    </form>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                                                 
 <table id="example" class="table  table table-hover" cellspacing="0" width="100%">
<thead>
		<tr>
			<th>RUT</th>
			<th>NOMBRES</th>
			<th>APELLIDOS</th>
			<th>DEPENDENCIA</th>
            <th>NOMBRE/CARGO</th>
            <th></th>
		</tr>
	</thead>
	<tbody>
    @foreach($resultado as $resultado)
   
		<tr>
 
			<td>{{ $id=$resultado->rut }}</td>
			<td>{{ $resultado->trabajador_nombre." ".$resultado->segundo_nombre }}</td>
			<td>{{ $resultado->apellido_paterno." ".$resultado->apellido_materno}}</td>
            <td>{{ $resultado->tipo}}</td>
            <td>{{ $resultado->dependencia_nombre}}</td>
            <td>

       

           
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modificarTrabajador{{$id}}" data-target="#modificarTrabajador{{$id}}">
 Modificar
</button>


@include('gestionar_trabajadores.edit')    


            
            <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarTrabajador{{$id}}" data-target="#eliminarTrabajador{{$id}}">
  Eliminar
</button>


 
    

<!-- Modal modificar-->



<!-- Modal eliminar-->
<div class="modal fade" id="eliminarTrabajador{{$id}}" tabindex="-1" aria-labelledby="eliminar{{$id}}" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Trabajador</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Esta seguro que desea eliminar el trabajador:
<br>
<br>
    <label>{{"Rut: ".$resultado->rut}}</label>
    <br>
      <label>{{"Nombre: ".$resultado->trabajador_nombre." ".$resultado->segundo_nombre." ". $resultado->apellido_paterno}}</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form method="POST" action="{{route('trabajador-destroy', [$resultado->rut])}}">
        <input type="submit" value="Eliminar" class="btn btn-primary">
      </div>
    </div>
  </div>
</div>
            @method('DELETE')
            @csrf
        </form>
            @endforeach
	</tbody>
</table>


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