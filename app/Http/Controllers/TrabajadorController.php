<?php

namespace App\Http\Controllers;

use App\Models\Devolucion;
use App\Models\Prestamo;
use Illuminate\Http\Request;
use App\models\Trabajador;
use App\models\Dispositivo;
use App\models\Dependencia;
use DB;
use Illuminate\Support\Facades\Auth;

class TrabajadorController extends Controller
{


    //index mostrar
    //store guardar
    //update actualizar
    //destroy eliminar

    public function store(Request $request){
        try {

        $request->validate([
        'rut'=>'required|regex:/^[a-zA-Z\-0-9]+$/u',
        'nombre'=>'required|min:3',
        'segundo_nombre'=>'required|min:3',
        'apellido_paterno'=>'required|min:3',
        'apellido_materno'=>'required|min:3',
        'correo'=>'required|min:5',
        'departamento'
        ],['rut.required'=> 'El campo rut es obligatorio!','nombre.required'=> 'El campo nombre es obligatorio!',
        'segundo_nombre.required'=> 'El campo segundo nombre es obligatorio!', 'apellido_paterno.required'=> 'El campo apellido paterno obligatorio!',
        'apellido_materno.required'=> 'El campo apellido materno es obligatorio!', 'correo.required'=> 'El campo correo es obligatorio!'
    ]);

$trabajador=new trabajador;
$trabajador->rut=$request->rut;
$trabajador->nombre=$request->nombre;
$trabajador->segundo_nombre=$request->segundo_nombre;
$trabajador->apellido_paterno=$request->apellido_paterno;
$trabajador->apellido_materno=$request->apellido_materno;
$trabajador->correo=$request->correo;
$trabajador->id_dependencia=$request->dependencia;
$trabajador->save();

return redirect()->route('trabajador')->with('success', 'operacion realizada correctamente');
}catch(\Illuminate\Database\QueryException $e){

    return redirect()->route('trabajador')->with('ePk', 'Error al ingresar, porfavor revise todos los campos');

    
}        
    }

    public function index(){
        if(!Auth::check()){
            return redirect('/login');
                }
    
        $trabajador = Trabajador::all();
        $dependencia= Dependencia::all();
      

       $resultado= DB::table('trabajadors')
       ->select('rut','correo','segundo_nombre','apellido_paterno','apellido_materno','tipo','trabajadors.nombre as trabajador_nombre','dependencias.nombre as dependencia_nombre')    
     ->join('dependencias', 'dependencias.id','=','trabajadors.id_dependencia')
     ->get();

        return view('gestionar_trabajadores.gestionar_trabajador', ['trabajador' => $trabajador, 'dependencia'=>$dependencia, 'resultado'=>$resultado]);
   
 
   
    }



    public function edit($rut){
$trabajador=Trabajador::findOrFail($rut);
return view('gestionar_trabajadores.edit',compact('trabajador'));

    }



public function update(Request $request, $rut)
{


    $request->validate([
    
        'nombre'=>'required|min:3',
        'segundo_nombre'=>'required|min:3',
        'apellido_paterno'=>'required|min:3',
        'apellido_materno'=>'required|min:3',
        'correo'=>'required|min:5',
        'departamento'
        ],['nombre.required'=> 'El campo nombre es obligatorio!',
        'segundo_nombre.required'=> 'El campo segundo nombre es obligatorio!', 'apellido_paterno.required'=> 'El campo apellido paterno obligatorio!',
        'apellido_materno.required'=> 'El campo apellido materno es obligatorio!', 'correo.required'=> 'El campo correo es obligatorio!'
    ]);
    
    $trabajador=Trabajador::findOrFail($rut);
    $trabajador->nombre=$request->nombre;
    $trabajador->segundo_nombre=$request->segundo_nombre;
    $trabajador->apellido_paterno=$request->apellido_paterno;
    $trabajador->apellido_materno=$request->apellido_materno;
    $trabajador->correo=$request->correo;
    $trabajador->id_dependencia=$request->dependencia;
    $trabajador->save();
    
    return redirect()->route('trabajador')->with('success', 'Se modifico el trabajador exitosamente!');
}



    
public function destroy($rut){
try{

    $trabajador = Trabajador::whereRut($rut);
    $prestamo = DB::table('prestamos')
    ->select('serie_dispositivo')
    ->where('rut_trabajador',$rut)
    ->get();
    $devolucion=Devolucion::whererut_trabajador($rut);

 if($prestamo != null){
    foreach ($prestamo as $prestamo) {
    DB::table('dispositivos')
    ->where('serie', $prestamo->serie_dispositivo)
    ->update([
    'estado' => 0,
]);
$prestamoeli=Prestamo::whererut_trabajador($rut);
$prestamoeli->delete();
}
$devolucion->delete();
$trabajador->delete();
    }

   
 


    return redirect()->route('trabajador')->with('success', 'El Trabajador a sido eliminado');
}catch(\Illuminate\Database\QueryException $e){
    return redirect()->route('trabajador')->with('ePk','Error: El trabajador no se puede eliminar, se encuentra asociado a prestamos!');

}


}


    
}
