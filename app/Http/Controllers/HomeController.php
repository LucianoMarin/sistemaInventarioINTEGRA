<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\Trabajador;
use DB;

class HomeController extends Controller
{

    public function index()
    {

        try{
$users = Prestamo::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(fecha_prestamo) as month_name"))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy('serie_dispositivo','ASC')
                    ->pluck('count', 'month_name');
 
        $labels = $users->keys();
        $data = $users->values();
              

        
        $trabajador= DB::table('trabajadors')
        ->select('*')    
      ->get();
 

        if(!Auth::check()){
            return redirect('/login');
                }
        return view('main.index', ['trabajador' => $trabajador , 'labels'=>$labels, 'data'=>$data]);
    }
catch(\Illuminate\Database\QueryException $ex){

}

}
}
