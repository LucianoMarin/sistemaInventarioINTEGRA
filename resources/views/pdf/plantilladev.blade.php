
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Devolucion</title>
        <style>
            body{

        font-family: arial;
        font-size: 16px;
        padding:0px;
            }
        h1{
        text-align: center;
        text-transform: uppercase;
        }
        .contenido{
        font-size: 16px;
        }
        #primero{
            padding: 10px;
        }
        #segundo{
        color:#44a359;
        }
        #tercero{
        text-decoration:line-through;
        }
        .logo{
        width: 120px;
        height:50px;

        }
        .titulo{
        font-family: arial;
        font-size: 18px;
        text-align: center;
        text-transform: uppercase;
        }
        .textoiz{
        font-family:arial;
        font-size: 14px;
        text-align: left;

        }
        i{
        font-size:10px;


        }

        

        table{
            border:0px solid black;
            width: 100%;
           text-align: center;
           border-collapse: collapse;

        }

       tr{
     
            width: 100%;
           text-align: center;
           border-collapse: collapse;

        }
        



    </style>

</head>
    <body>
    <br>
    <br>

    <img class="logo" src="image/banner.png">  
  <p class="textoiz"><b>DIRECCIÓN DE TECNOLOGÍA</b></p>
<br>
<p class="textoiz">Valdivia <?php date_default_timezone_set("America/Santiago"); echo date("d-m-Y");?></p>
        <p class="titulo"><u><b>ACTA DE DEVOLUCIÓN EQUIPO TECNOLOGICO</b></u></p>
        <br>
        <div class="contenido">
            <p id="primero">A través de esta acta se hace devolución del siguiente equipo:</p>
           
        </div>
        <br>
            <br>
        <table >
  
        <tr>
            <th style="border:1px solid #000000;">
                Tipo
    </th>
    <th style="border:1px solid #000000;">
                Marca
    </th>
    <th style="border:1px solid #000000;">
                Modelo
    </th>
    <th style="border:1px solid #000000;">
                Color
    </th>
    <th style="border:1px solid #000000;">
                S/N o IMEI
    </th>
    
    <?php if($_GET['tipo']=='Celular'){?>
    <th style="border:1px solid #000000;">
                SIM
    </th>
    <th style="border:1px solid #000000;">
                ABONADO
    </th>
    <?php }else{?>
        
        <th style="border:1px solid #000000;">
                ACTIVO FIJO
    </th>
        <?php }?>

    </tr>
    

    <tr>
        <td style="border:1px solid #000000;"><?php echo $_GET['tipo']?></td>
        <td style="border:1px solid #000000;"><?php echo $_GET['marca']?></td>
        <td style="border:1px solid #000000;"><?php echo $_GET['modelo']?></td>
        <td style="border:1px solid #000000;"><?php echo $_GET['color']?></td>
        <td style="border:1px solid #000000;"><?php echo $_GET['serie']?></td>
        <?php if($_GET['tipo']=='Celular'){?>
        <td style="border:1px solid #000000;"><?php echo $_GET['sim']?></td>
        <td style="border:1px solid #000000;"><?php echo $_GET['abonado']?></td>
        <?php }else{?>
            <td style="border:1px solid #000000;"><?php echo $_GET['cargo_fijo']?></td>
            <?php }?>
    </tr>      
   
    </table>
    <div class="contenido">
            <p id="primero">Manifestado el buen estado del equipo devuelto al departamento de informática por el empleado.</p>           
        </div>
        <table>
            <br>
            <br>
  
  <tr>
      <th style="border:1px solid #000000;">
          Usuario/Nombre
</th>
</th>
<th style="border:1px solid #000000;">
<?php echo $_GET['tipo_dependencia'] ?>
</th>
<th style="border:1px solid #000000;">
          Firma
</th>
<th style="border:1px solid #000000;">
          Fecha
</th>

</tr>

<?php


$fecha = date('d-m-Y', strtotime($_GET['fecha_devolucion']));
?>

<tr>
  <td style="border:1px solid #000000;  height:5%"><?php echo $_GET['nombreCompleto']?></td>
  <td style="border:1px solid #000000;"><?php echo $_GET['nombre_dependencia'] ?></td>
  <td style="border:1px solid #000000; width:30%"></td>
  <td style="border:1px solid #000000;"><?php echo $fecha?></td>
</tr>      

     
</table>
    </body>
</html>