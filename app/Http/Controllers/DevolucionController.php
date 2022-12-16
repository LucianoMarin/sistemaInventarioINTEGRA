<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Devolucion;
use App\models\Dispositivo;
use App\models\Trabajador;
use App\models\Prestamo;
use Illuminate\Support\Facades\Auth;
use DB;
use Symfony\Component\VarDumper\Dumper\ContextProvider\SourceContextProvider;

class DevolucionController extends Controller
{


    public function index(Request $request)
    {
        if(!Auth::check()){
            return redirect('/login');
                }
        
        try {
      
            $resultado = Devolucion::join("trabajadors", "trabajadors.rut", "=", "devolucions.rut_trabajador")
            ->select('dispositivos.tipo as dispositivo_tipo','trabajadors.nombre as nombre_trabajador','devolucions.id as devolucion_id','rut','marca','modelo','color','serie','sim','abonado','trabajadors.nombre as nombre_trabajador','dispositivos.tipo as tipo_dispositivo','segundo_nombre','apellido_paterno','dependencias.nombre as nombre_dependencia','dependencias.tipo as tipos_dependencia','fecha_devolucion','cargo_fijo' )
            ->join("dispositivos", "dispositivos.serie", "=", "devolucions.serie_dispositivo")
            ->join("dependencias", "dependencias.id", "=", "trabajadors.id_dependencia")
            ->get();


            $devolucion = devolucion::all();
            return view('gestionar_prestamo.gestionar_devolucion', ['devolucion' => $devolucion, 'resultado'=>$resultado]);

        } catch (\Illuminate\Database\QueryException $ex) {
            return ('Error: no se pudo encontrar su conexión con la base de datos');
        }

    }






    public function buscarArriendo(Request $request)
    {
        $request->validate([
            'serie'=>'required',
        ]);
            $vserie=$request->serie;
            $dispositivo = new Dispositivo;
            $validar = false;
            $buscar = DB::table('dispositivos')
                ->select('*')
                ->get();



            foreach ($buscar as $dispositivo) {
           
                if ($request->serie==$dispositivo->serie && $dispositivo->estado==1) {
                    $validar = true;

                }

            }

            if ($validar == 1) {
//EL DISPOSITIVO EXISTE Y ESTA ARRENDADO.
try{

   

    date_default_timezone_set("America/Santiago");

$devolucion=new Devolucion;
$devolucion->id=0;
$devolucion->rut_trabajador=$request->rut; //CREAR UN INPUT?
$devolucion->serie_dispositivo=$vserie;
$devolucion->fecha_devolucion=date("y-m-d");
$dispositivos=Dispositivo::findOrFail($vserie);//error
if($devolucion->save()){
    $dispositivos->estado=0;
    $dispositivos->save();
}


return redirect()->route('devolucion')->with('success', 'Se devolvio el dispositivo exitosamente!');
}catch(\Illuminate\Database\QueryException $ex){
    return redirect()->route('devolucion')->with('ePk', 'Error: El rut ingresado no se encuentra registrado!');


}

            } else if($validar==0) {
                $vserie=null;
                return redirect()->route('devolucion')->with('ePk', 'No se encontro el dispositivo o no esta en "PRESTAMO" ');
            }


      


    }








}