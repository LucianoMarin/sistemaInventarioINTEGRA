@extends('main.pagina_principal')
@section('content')

<div class="contenedor">
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
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <h1 class="estiloTitulos">Gestionar Dependencias</h1>
                    <div class="container-fluid">
                        <div class="row">
                        
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" data-bs-whatever="@mdo" onclick="return limpiarDependencia();">Ingresar
                                        Dependencia</button>
                               
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

                                        

                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="estiloTitulos" id="exampleModalLabel">INGRESAR DEPENDENCIA
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Cerrar"></button>
                                                        
                                                </div>
                                                
                                                <div class="modal-body">
                                                <form action="{{route('dependencia')}}" method="POST">
                                                    @csrf
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="cInput">
                                                                <div class="col-md-12">
                                                                </div>
                                                                <div class="col-md-12">

                                                                        <div class="row">
                                                                                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                                                                <label>Tipo</label>
                                                                                    <br>
                                                                          
                                                                                    <select id="tipo" name="tipo" >
                                                                                        <option selected="selected" value="Departamento">Departamento</option>
                                                                                        <option value="Jardín Infantil">Jardín Infantil</option>
                                                                                    </select>
                                                                                    
                                                                                    <br>
                                                              
                                                                                </div>
                                                                            
                                                                                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                                                          
                                                                                <label>Nombre</label>
                                                                                    <br>
                                                                                    <input type="text" name="nombre" id="nombre" required="required" onkeypress="return validarPK(event)">
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
                                                        <input type="submit" class="btn btn-primary" value="Enviar">
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                                </div>
          
<table id="example" class="table  table table-hover" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>TIPO</th>
            <th>NOMBRE</th>
            <th>OPCIONES</th>
		</tr>
     
	</thead>
	<tbody>

    @foreach($dependencia as $dependencia)   
		<tr>
            
  
			<td>{{$dependencia->tipo}}</td>
			<td>{{$dependencia->nombre}}</td>
            <td>
                
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modificarDependencia{{$dependencia->id}}" data-target="#modificarDependencia{{$dependencia->id}}" >
 Modificar

</button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarDependencia{{$dependencia->id}}" data-target="#eliminarDependencia{{$dependencia->id}}">
  Eliminar
</button>
 
@include('gestionar_dependencias.edit')

</td>


<!-- Modal -->

<div class="modal fade" id="eliminarDependencia{{$dependencia->id}}" tabindex="-1" aria-labelledby="eliminar" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Dependencia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Esta seguro que desea eliminar la Dependencia:
      <br>
      <br>
      <label>{{"Tipo: ".$dependencia->tipo}}</label>
      <br>
      <label>{{"Nombre: ".$dependencia->nombre}}</label>
      <br>


      </div>
   

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form method="POST" action="{{route('dependencia-destroy', [$dependencia->id])}}">
        <input type="submit" value="Eliminar" class="btn btn-primary" >
  @method('DELETE')
            @csrf
            </form>
            @endforeach
      </div>
    </div>
  </div>
  </div>



            	
		</tr>
   

	</tbody>
</table>
</div>
</div>
</div>
        </div>
        <br>
        <br>
        <br>

</div>
@endsection