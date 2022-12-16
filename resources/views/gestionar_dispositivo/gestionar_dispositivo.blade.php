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
                    <h1 class="estiloTitulos">Gestionar Dispositivo</h1>
                    <div class="container-fluid">
                        <div class="row">
                        
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" data-bs-whatever="@mdo" onclick="limpiar()">Ingresar
                                        Dispositivos</button>

                               
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
  
        </div>

@endif

                                        

                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="estiloTitulos" id="exampleModalLabel">INGRESAR DISPOSITIVO
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Cerrar"></button>
                                                        
                                                </div>
                                                

                                                <div class="modal-body">
                                                <form action="{{route ('dispositivo')}}" method="POST">
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
                                                                                    <select id="dispositivos" name="dispositivos" >
                                                                                        <option value="Computador">Computador</option>
                                                                                        <option value="Notebook">Notebook</option>
                                                                                        <option value="Celular">Celular</option>
                                                                                        <option value="Otros">Otros</option>
                                                                                    </select>
                                                                                    <br>
                                                                               
                                                                                    <label>S/N o IMEI</label>
                                                                                    <br>
                                                                                    <input type="text" name="cod" id="cod" onkeypress="return validarDependencia(event);"">
                                                                                    <br>
                                                                    
                                                                                   
                                                                                  
                                                              
                                                                                </div>
                                                                            
                                                                                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                                                          
                                                                                <label>Marca</label>
                                                                                    <br>
                                                                                    <input type="text" name="marca" id="marca">
                                                                                    <br>

                                                                                <label>Modelo</label>
                                                                                    <br>
                                                                                    
                                                                                    <input type="text" name="modelo"  id="modelo" >
                                                                                    <br>
                                                                                    <label>Color</label>
                                                                                    <br>
                                                                                    
                                                                                    <input type="text" name="color"  id="color" onkeypress="return ValidarInput(event);" >
                                                                                    <br>
                                                                              
                                                                                    <div id="color" name="color"></div>
                                                                                    <div id="sim" name="sim"></div>
                                                                                    <div id="abonado" name="abonado"></div>
                                                                                    <div id="activo_fijo" name="activo_fijo"></div>
                                                                                
                                                                                
 <script>
$(document).on('change', '#dispositivos', function(event) {
       if(($("#dispositivos option:selected").text())=="Celular"){
        $('#sim').html('<label>Sim </label><br><input type="text" name="sim" id="sim" onkeypress="return ValidarInput(event);">');
        $('#abonado').html('<label>Abonado</label><br><input type="text" name="abonado" id="abonado" onkeypress="return ValidarInput(event);">');
        $('#activo_fijo').html('<label>Activo Fijo</label><br><input type="text" name="actiivo_fijo" id="actiivo_fijo" onkeypress="return ValidarInput(event);">').hide();   
    }
       else{
        $('#sim').html("");
        $('#abonado').html("");
        $('#activo_fijo').html('<label>Activo Fijo</label><br><input type="text" name="activo_fijo" id="activo_fijo" onkeypress="return ValidarInput(event);">').show();
       }
   });

</script>




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

                            
<table id="example" class="table  table table-hover " cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>CODIGO</th>
            <th>TIPO</th>
            <th>MARCA</th>
			<th>MODELO</th>
			<th>COLOR</th>
            <th>SIM</th>
            <th>ABONADO</th>
            <th>FIJO</th>
            <th>OPCIONES</th>
		</tr>
	</thead>
	<tbody>
        

    @foreach($dispositivos as $dispositivos)


		<tr>
			<td>{{$serie=$dispositivos->serie}}</td>
			<td>{{$dispositivos->tipo}}</td>
			<td>{{$dispositivos->marca}}</td>
			<td>{{$dispositivos->modelo}}</td>
            <td>{{$dispositivos->color}}</td>
            <td>{{$dispositivos->sim}}</td>
            <td>{{$dispositivos->abonado}}</td> 
            <td>{{$dispositivos->cargo_fijo}}</td> 
            <td>
                


            <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="modificar" data-bs-target="#modificarDispositivo{{$serie}}"  data-target="#modificarDispositivo{{$serie}}">
 Modificar

</button>




            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarDispositivo{{$serie}}" data-target="#eliminarDispositivo{{$serie}}">
  Eliminar
</button>
@include('gestionar_dispositivo.edit')    

</td>

<!-- Modal -->

        
<div class="modal fade" id="eliminarDispositivo{{$serie}}" tabindex="-1" aria-labelledby="eliminar{{$serie}}" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Dispositivo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Esta seguro que desea eliminar el Dispositivo:
      <br>
      <br>
      <label> {{"Codigo: ".$dispositivos->serie}}</label>
      <br>
      <label> {{"Tipo: ".$dispositivos->tipo}}</label>
      <br>
      <label>{{"Marca: ".$dispositivos->marca}}</label>
      <br>
      <label>{{"Modelo: ".$dispositivos->modelo}}</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form method="POST" action="{{route('dispositivo-destroy', [$dispositivos->serie])}}">
        <input type="submit" value="Eliminar" class="btn btn-primary" >
  @method('DELETE')
            @csrf
            </form>

      </div>
    </div>
  </div>
  </div>



@endforeach	
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
     
@endsection
