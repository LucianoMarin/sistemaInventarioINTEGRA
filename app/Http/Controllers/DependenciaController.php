<?php

namespace App\Http\Controllers;

use App\Models\Dependencia;
use Illuminate\Http\Request;
use App\models\Depedencia;
use DB;
use Illuminate\Support\Facades\Auth;


class DependenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::check()){
            return redirect('/login');
                }  

        try{
        $dependencia = Dependencia::all();
        return view('gestionar_dependencias.gestionar_dependencias', ['dependencia' => $dependencia]);
        }catch(\Illuminate\Database\QueryException $ex){
          return('Error: No se pudo encontrar su conexión con la base de datos');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try{
        $validar=false;
    $request->validate([
        'tipo'=>'required',
        'nombre'=>'required',

    ],['tipo.required'=>'Debe seleccionar una dependencia.',
    'nombre.required'=>'Debe ingresar un nombre para la dependencia'
]);
$dependencias=new dependencia;
$dependencias->tipo=$request->tipo;
$dependencias->nombre=$request->nombre;
$dep = DB::table('dependencias')
->select('nombre')
->get();    

foreach($dep as $dependencia){
if($dependencia->nombre==$request->nombre){
$validar=true;        

}
}
if($validar==1){
    return redirect()->route('dependencia')->with('ePk', 'Error: El nombre que ingreso ya esta en uso!');
}else{

    $dependencias->save();
    return redirect()->route('dependencia')->with('success', 'La dependencia se agrego exitosamente!');

}
        }catch(\Illuminate\Database\QueryException $e){
            return redirect()->route('dependencia')->with('ePk','Error: hubo un error al ingresar sus datos, re-intente');



        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function show(Dependencia $dependencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $dependencia=Dependencia::findOrFail($id);
        return view('gestionar_dependencias.edit',compact('dependencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
  try{
        $validar=false;
        $request->validate([
        'tipo'=>'required',
        'nombre'=>'required'
],['tipo.required'=>'Debe seleccionar una dependencia',
'nombre.required'=>'Debe ingresar un nombre para la dependencia']);

        $dependencias=Dependencia::findOrFail($id);
        $dependencias->tipo=$request->tipo;
        $dependencias->nombre=$request->nombre;
        
        $dep = DB::table('dependencias')
        ->select('nombre')
        ->get();    
        foreach($dep as $dependencia){
       if($dependencia->nombre==$request->nombre){
        $validar=true;        

       }
        }
if($validar==1){
    return redirect()->route('dependencia')->with('ePk', 'Error: El nombre que ingreso ya esta en uso!');
}
else{
    $dependencias->save();
    return redirect()->route('dependencia')->with('success', 'Se modifico la dependencia exitosamente!');
}
    
}catch(\Illuminate\Database\QueryException $e){
    return redirect()->route('dependencia')->with('ePk','Error: hubo un error al ingresar sus datos, re-intente');



}

   
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $dependencia = Dependencia::whereid($id);
            $dependencia->delete($id);
            return redirect()->route('dependencia')->with('success', 'La dependencia a sido eliminado');
            }catch(\Illuminate\Database\QueryException $e){
                return redirect()->route('dependencia')->with('ePk','Error: La dependencia se encuentra asociado a un trabajador');
        
            }
    }
}
