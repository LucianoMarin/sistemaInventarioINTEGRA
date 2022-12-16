<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cuenta extends Model
{
    use HasFactory;


    public $timestamps = false;
    protected $primaryKey = 'id';

protected $fillable = [
'usuario',
'clave',
'intento',
'permiso',
];

protected $hidden = [
    'clave',
    
];


public function setPasswordAttribute($value){
$this->attributes['clave']=bcrypt($value);
}



}

