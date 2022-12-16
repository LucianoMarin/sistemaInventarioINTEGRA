<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\Dispositivo;
use App\models\Trabajador;
class Devolucion extends Model
{
    use HasFactory;
 
    public $timestamps = false;
    protected $primaryKey = 'id';

protected $fillable=[
'id',
'rut_trabajador',
'serie_dispositivo',
'fecha_devolucion',
];

    
}
