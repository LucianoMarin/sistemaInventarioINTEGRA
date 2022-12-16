<div class="modal fade" id="modificarTrabajador{{$resultado->rut}}" tabindex="-1" aria-labelledby="modificar{{$resultado->rut}}" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Trabajador</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="modal-body">
                                  
<form method="POST" action="{{route('trabajador-update', [$resultado->rut])}}">      
                             
                                                    <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="cInput">
                                                                <div class="col-md-12">
                                                                </div>
                                                                <div class="col-md-12">
                                                                
                                                                        <div class="row">
                                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    
                                                                                    <label class="atInput">Rut</label>
                                                                                    <br>
                                                                                    <input type="text" id="rut" name="rut" onkeypress="return ValidarInput(event);" disabled="disabled" value="{{$resultado->rut}}">
                                                                                    <br>
                                                                                    <label>Nombre</label>
                                                                                    <br>
                                                                                    <input type="text" id="nombre" name="nombre" onkeypress="return ValidarInput(event);" value="{{$resultado->trabajador_nombre}}">
                                                                                    <br>
                                                                                    <label>Segundo Nombre</label>
                                                                                    <br>
                                                                                    <input type="text" id="s_nombre" name="segundo_nombre" onkeypress="return ValidarInput(event);" value="{{$resultado->segundo_nombre}}" >
                                                                                    <br>
                                                                                    <label>Apellido Paterno</label>
                                                                                    <br>
                                                                                    <input type="text" id="ap_paterno" name="apellido_paterno" onkeypress="return ValidarInput(event);" value="{{$resultado->apellido_paterno}}">
                                                                                    <br>
                                                                                    <label>Apellido Materno</label>
                                                                                    <br>
                                                                                    <input type="text" id="ap_materno" name="apellido_materno" onkeypress="return ValidarInput(event);" value="{{$resultado->apellido_materno}}">
                                                                                    <br>
                                                                                   
                                                                                </div>
                                                                            
                                                                                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                                                                <label>Correo</label>
                                                                                <br>
                                                                                <input class="tmInput" id="correo" name="correo" type="text" onkeypress="return ValidarInput(event);" value="{{$resultado->correo}}">
                                                                                <br>
                                                                                   
                                                                                    <label>Dependencia: </label>
                                                                                    <br>

                                                                                
                                                                                    <select id="dependencia" name="dependencia">
                                                                                    @foreach($dependencia as $dependencia)
                                                                                        <option selected="selected" value="{{$dependencia->id}}">{{$dependencia->tipo.": ".$dependencia->nombre}}
                                                                                        @endforeach
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
<br>
<br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <input type="submit" value="Modificar" class="btn btn-primary">
        @method('patch')   
        @csrf
    
</form>
      </div>
    </div>
  </div>
</div>
