<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    use HasFactory;
 
    public $timestamps = false;
    protected $primaryKey = 'serie';
    protected $keyType = 'string';

protected $fillable=[
'serie',
'tipo',
'marca',
'modelo',
'estado',
'color',
'sim',
'abonado'
];



}
