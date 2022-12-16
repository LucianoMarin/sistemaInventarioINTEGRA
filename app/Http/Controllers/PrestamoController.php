<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\models\Dispositivo;
use App\models\Trabajador;
use App\models\Prestamo;
use Illuminate\Support\Facades\Auth;
use DB;


class PrestamoController extends Controller
{

    public function store(Request $request){

        $request->validate([
        'trabajador'=>'required',
        'dispositivo'=>'required',
        'fecha_prestamo'=>'required'

        ],['trabajador.required'=>'Debe seleccionar un trabajador',
            'dispositivo.required'=>'Debe seleccionar un dispositivo',
            'fecha_prestamo.required'=>'Debe seleccionar una fecha'
    ]);
            $prestamo=new prestamo;
            $prestamo->id=0;
            $prestamo->rut_trabajador=$request->trabajador;
            $prestamo->serie_dispositivo=$request->dispositivo;
            $prestamo->fecha_prestamo=$request->fecha_prestamo;
            $dispositivos=Dispositivo::findOrFail($request->dispositivo);//error
            $dispositivos->estado=1;
            $dispositivos->save();
            $prestamo->save();

            return redirect()->route('prestamo')->with('success','Se ha generado el prestamo!');


    }


    public function index(){
        if(!Auth::check()){
            return redirect('/login');
                }  
       
        $resultado = Prestamo::join("trabajadors", "trabajadors.rut", "=", "prestamos.rut_trabajador")
        ->select('dispositivos.tipo as dispositivo_tipo','trabajadors.nombre as nombre_trabajador','prestamos.id as prestamo_id','rut','marca','modelo','color','serie','sim','abonado','trabajadors.nombre as nombre_trabajador','dispositivos.tipo as tipo_dispositivo','segundo_nombre','apellido_paterno','dependencias.nombre as nombre_dependencia','dependencias.tipo as tipos_dependencia','fecha_prestamo','cargo_fijo' )
        ->join("dispositivos", "dispositivos.serie", "=", "prestamos.serie_dispositivo")
        ->join("dependencias", "dependencias.id", "=", "trabajadors.id_dependencia")
        ->get();

        $prestamo=Prestamo::all();
        $dispositivo= Dispositivo::where('estado','0')->get();
        $trabajador= Trabajador::all();
        return view('gestionar_prestamo.gestionar_prestamo', ['resultado'=>$resultado, 'prestamo' => $prestamo, 'dispositivo'=>$dispositivo, 'trabajador'=>$trabajador]); 
    }



    public function destroy($id){
        try{
        $prestamo = Prestamo::whereid($id);
        $se= DB::table('prestamos')
        ->select('serie_dispositivo')    
        ->where('id', $id)
        ->first();

         
            
            $dispositivo=dispositivo::findOrFail($se->serie_dispositivo);
            $dispositivo->estado=0;
            $dispositivo->save();
            $prestamo->delete($se);

        return redirect()->route('prestamo')->with('success', 'Se a borrado un prestamo');
        }catch(\Illuminate\Database\QueryException $e){
            return redirect()->route('prestamo')->with('ePk','Error: El dispositivo esta asociado trabajador');
    
        }
    
    }



    
}
