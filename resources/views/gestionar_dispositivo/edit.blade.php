
<div class="modal fade" id="modificarDispositivo{{$serie}}" tabindex="-1" aria-labelledby="modificar{{$serie}}"
  aria-hidden="true" data-bs-backdrop="static">
 

  <script>
document.querySelector('[data-target="#modificarDispositivo{{$serie}}"]').addEventListener('click',function(){
document.querySelector('#modificarDispositivo{{$serie}} #dispositivos2').value="";
$('.campo2').html("").hide();
$('.campo3').html("").hide();
$('.campo4').html("").hide();   
});
</script>
  <script>


$("#modificarDispositivo{{$serie}}").on('change', '.dispositivos2', function(ev) {
 
  if(($("#modificarDispositivo{{$serie}} .dispositivos2 option:selected").text())=="Celular"){
        $('.campo2').html('<label>Sim </label><br><input type="text" name="sim2" class="sim2" onkeypress="return ValidarInput(event);" value="{{$dispositivos->sim}}">').show();
        $('.campo3').html('<label>Abonado</label><br><input type="text" name="abonado2" class="abonado2" onkeypress="return ValidarInput(event);" value="{{$dispositivos->abonado}}">').show();
        $('.campo4').html('<label>Activo Fijo</label><br><input type="text" name="activo_fijo2" classs="activo_fijo2" onkeypress="return ValidarInput(event);"').hide();   
   
    }
    else{
        $('.campo2').html("");
        $('.campo3').html("");
        $('.campo4').html('<label>Activo Fijo</label><br><input type="text" name="activo_fijo2" id="activo_fijo" onkeypress="return ValidarInput(event);" value="{{$dispositivos->cargo_fijo}}">').show();
    }
 
});



        </script>


  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Dispositivo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('dispositivo-update', [$dispositivos->serie])}}" method="POST">

          <div class="container-fluid">
            <div class="row">
              <div class="cInput">
                <div class="col-md-12">
                </div>
                <div class="col-md-12">

                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <label>Tipo</label>
                      <br>
                      <select id="dispositivos2"  class="dispositivos2" name="dispositivos2">
                      <option  name="Computador" value="Computador">Computador</option>
                        <option name="Notebook" value="Notebook">Notebook</option>
                        <option name="Celular" value="Celular">Celular</option>
                        <option name="Otros" value="Otros">Otros</option>
                      </select>
                      <br>

                      <label>S/N o IMEI</label>
                      <br>
                      <input disabled="disabled" type="text" name="cod" id="cod" value="{{$dispositivos->serie}}" onkeypress="return ValidarInput(event);"">
   <br>
</div>
            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">

                      <label>Marca</label>
                      <br>
                      <input type="text" name="marca" id="marca" value="{{$dispositivos->marca}}"
                       >
                      <br>

                      <label>Modelo</label>
                      <br>

                      <input type="text" name="modelo" id="modelo" value="{{$dispositivos->modelo}}"
                       >
                      <br>
                      <label>Color</label>
                      <br>
                      <input type="text" name="color2" id="color2" value="{{$dispositivos->color}}"
                        onkeypress="return ValidarInput(event);">
                      <br>

                      <div id="campo2" class="campo2" name="campo2"></div>
                      <div id="campo3" class="campo3" name="campo3"></div>
                      <div id="campo4" class="campo4" name="campo4"></div>
                      <br>


                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cancelar</button>
                      <input type="submit" value="Modificar" class="btn btn-primary">
                 
                    </div>
                  </div>
                </div>
              </div>

              @method('patch')
              @csrf

            
        
        </form>


        
 

