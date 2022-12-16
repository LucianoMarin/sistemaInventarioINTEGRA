<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use App\Models\Prestamo;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ChartJSController extends Controller
{
    public function index()
    {
        $users = Prestamo::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(fecha_prestamo) as month_name"))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy('serie_dispositivo','ASC')
                    ->pluck('count', 'month_name');
 
        $labels = $users->keys();
        $data = $users->values();
              
        return view('chart', compact('labels', 'data'));
    }
}
