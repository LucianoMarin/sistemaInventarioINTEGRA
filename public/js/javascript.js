

     function ValidarInput(evt){
    

            if (evt.which == 32){
                return false;
            }
     
     }


     function limpiarDependencia(){

        document.getElementById("tipo").value = "";
        document.getElementById("nombre").value = "";
     }


     function limpiar(){

      document.getElementById("cod").value = "";
      document.getElementById("modelo").value = "";
      document.getElementById("color").value = "";
      document.getElementById("sim").value = "";
      document.getElementById("abonado").value = "";
      document.getElementById("dispositivos").value = "";
      document.getElementById("marca").value = "";

   }


     function limpiarTrabajador(){

        document.getElementById("rut").value = "";
        document.getElementById("nombre").value = "";
        document.getElementById("s_nombre").value = "";
        document.getElementById("ap_paterno").value = "";
        document.getElementById("ap_materno").value = "";
        document.getElementById("dependencia").value = "aa";
        document.getElementById("correo").value = "";
 
     }



     function limpiarID(){

      document.getElementsByName("dispositivos2").value ="";
      document.getElementById("dispositivos2").value ="";

   }







 function validarNumero(evt){
 
   if (evt.which == 32  || evt.keyCode   > 31 && (evt.keyCode  < 45 || evt.keyCode  > 57 && evt.keyCode!=75 && evt.keyCode!=107 ) ){
      return false;
        
  }


}


function validarDependencia(evt){
 
   if (evt.which >=0  && evt.which <=47   || evt.which >=58  && evt.which <=64 || evt.which >=91  && evt.which <=96 || evt.which >=123  && evt.which <=126  &&  (evt.keyCode  < 45 || evt.keyCode  > 57 && evt.keyCode!=75 && evt.keyCode!=107 ) ){
      return false;
        
  }


}


function validarPK(evt){
 
   if (evt.which >=0  && evt.which <=31   || evt.which >=33  && evt.which <=47   || evt.which >=58  && evt.which <=64 || evt.which >=91  && evt.which <=96 || evt.which >=123  && evt.which <=126  &&  (evt.keyCode  < 45 || evt.keyCode  > 57 && evt.keyCode>=65 && evt.keyCode<=90 ) ){
      return false;
        
  }
}

