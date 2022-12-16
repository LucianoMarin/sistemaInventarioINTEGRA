<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\Dependencia;

class Trabajador extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'rut';
    protected $keyType = 'string';

protected $fillable=[
'rut',
'nombre',
'segundo_nombre',
'apellido_paterno',
'apellido_materno',
'correo',
'id_dependencia'
];

public function nombre()
{
    return $this->hasMany(Trabajador::class, 'nombre', 'nombre');
} 

}
