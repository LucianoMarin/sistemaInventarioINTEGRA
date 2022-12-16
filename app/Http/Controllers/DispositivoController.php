<?php

namespace App\Http\Controllers;

use App\Models\Devolucion;
use App\Models\Prestamo;
use Illuminate\Http\Request;
use App\models\Dispositivo;
use Illuminate\Support\Facades\Auth;
use DB;

class DispositivoController extends Controller
{


public function store(Request $request){
   
    try {
$request->validate([
'dispositivos'=>'required',
'cod'=>'required|regex:/^[a-zA-Z\-0-9]+$/u',
'marca'=>'required|min:1',
'modelo'=>'required',
'estado'],
['dispositivos.required'=>'Es obligatorio seleccionar un dispositivo',
'cod.required'=>'El campo codigo es obligatorio!',
'marca.required'=>'El campo marca es obligatorio!',
'modelo.required'=>'El campo modelo es obligatorio!',
]);

if($_POST['dispositivos']=="Celular"){
    $request->validate([
        'color'=>'required',
        'sim',
        'abonado'=>'required|min:1',
        ],['dispositivos.required'=>'Es obligatorio seleccionar un dispositivo',
        'cod.required'=>'El campo codigo es obligatorio!',
        'marca.required'=>'El campo marca es obligatorio!',
        'modelo.required'=>'El campo modelo es obligatorio!',
        ]);
}

$dispositivo=new dispositivo;
$dispositivo->serie=$request->cod;
$dispositivo->tipo=$request->dispositivos;
$dispositivo->marca=$request->marca;
$dispositivo->modelo=$request->modelo;
$dispositivo->estado=0;
$dispositivo->color=$request->color;

if($_POST['dispositivos']=="Celular"){
$dispositivo->color=$request->color;
$dispositivo->sim=$request->sim;
$dispositivo->abonado=$request->abonado;}
else{
    $dispositivo->sim=null;
    $dispositivo->abonado=null;  
    $dispositivo->cargo_fijo=$request->activo_fijo;
}



    
    $dispositivo->save();
    return redirect()->route('dispositivo')->with('success', 'Operacion realizada correctamente');
}catch(\Illuminate\Database\QueryException $e){
    return redirect()->route('dispositivo')->with('ePk', 'ERROR: El Codigo/serie ya existe, porfavor revise los datos ingresados');
}
}


public function index(){
    if(!Auth::check()){
        return redirect('/login');
            }
    try{
    $dispositivo = Dispositivo::all();
    return view('gestionar_dispositivo.gestionar_dispositivo', ['dispositivos' => $dispositivo]);
    
}catch(\Illuminate\Database\QueryException $ex){
    return('Error: No se pudo encontrar su conexión con la base de datos');
  }
}



public function destroy($serie){
    try{
    $dispositivo = Dispositivo::whereSerie($serie);
    $prestamo = DB::table('prestamos')
    ->select('serie_dispositivo')
    ->where('serie_dispositivo',$serie)
    ->get();
    $devolucion=Devolucion::whereserie_dispositivo($serie);
    if($prestamo != null){
        foreach ($prestamo as $prestamo) {
        DB::table('dispositivos')
        ->where('serie', $prestamo->serie_dispositivo)
        ->update([
        'estado' => 0,
    ]);
    $prestamoeli=Prestamo::whereserie_dispositivo($serie);
    $prestamoeli->delete();
    }
    }
    $devolucion->delete();
    $dispositivo->delete($serie);


    return redirect()->route('dispositivo')->with('success', 'El dispositivo a sido eliminado');
    }catch(\Illuminate\Database\QueryException $e){
        return redirect()->route('dispositivo')->with('ePk','Error: El dispositivo esta asociado trabajador');

    }

}

public function edit($serie){
    $dispostivo=Dispositivo::findOrFail($serie);
    return view('gestionar_dispositivo.edit',compact('dispositivo'));
        }
    


        public function update(Request $request,$serie){
            try{
        $dispositivo=Dispositivo::findOrFail($serie);
        $dispositivo->tipo=$request->dispositivos2;
        $dispositivo->marca=$request->marca;
        $dispositivo->modelo=$request->modelo;
        $dispositivo->color=$request->color2;
        $dispositivo->sim=$request->sim2;
        $dispositivo->abonado=$request->abonado2;
        $dispositivo->color=$request->color2;

        if($request->dispositivos2=="Celular"){ //SI SE VALIDA aqui va la nueva etiqueta
            $dispositivo->color=$request->color2;
            $dispositivo->sim=$request->sim2;
            $dispositivo->abonado=$request->abonado2;
            $dispositivo->cargo_fijo=null;
        
        
        }
            else{
                $dispositivo->cargo_fijo=$request->activo_fijo2;
                $dispositivo->sim=null;
                $dispositivo->abonado=null;  
            }
            
        $dispositivo->save();

        return redirect()->route('dispositivo')->with('success', 'Se modifico el dispositivo exitosamente!');
        }catch(\Illuminate\Database\QueryException $e){

            return redirect()->route('dispositivo')->with('ePk','Error: Porfavor revise todos los campos a modificar');

        }

        }


}
