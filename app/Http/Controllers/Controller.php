<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\models\Dispositivo;
use App\models\Trabajador;
use App\models\Prestamo;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function imprimir(){
        if(!Auth::check()){
            return redirect('/login');
                }  
        $pdf = \PDF::loadView('pdf.plantilla');
        return $pdf->download('pdf.plantilla.pdf');
   }

   public function imprimir2(){
    if(!Auth::check()){
        return redirect('/login');
            }  
    $pdf = \PDF::loadView('pdf.plantilladev');
    return $pdf->download('pdf.plantilladev.pdf');
}



}
