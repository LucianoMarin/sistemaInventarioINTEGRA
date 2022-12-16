<div class="modal fade" id="modificarDependencia{{$dependencia->id}}" tabindex="-1" aria-labelledby="modificarDependencia{{$dependencia->id}}" data-bs-backdrop="static">
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Dependencia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('dependencia-update', [$dependencia->id])}}" method="POST">

          <div class="container-fluid">
            <div class="row">
              <div class="cInput">
                <div class="col-md-12">
                </div>
                <div class="col-md-12">
                  <div class="row">
                  <label>Tipo</label>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           
                    <select id="tipo" name="tipo" >
<option value="Departamento">Departamento</option>
<option value="Jardín Infantil">Jardín Infantil</option>
     </select>
                                                                                    
   <br>
</div>
            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <label>Nombre</label>
<br>
<input type="text" name="nombre" id="nombre" onkeypress="" required="required" value="{{$dependencia->nombre}}">
<br>
<br>
          

                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <input type="submit" value="Modificar" class="btn btn-primary">
                 
                    </div>
                  </div>
                </div>
              </div>

              @method('patch')
              @csrf


        </form>
