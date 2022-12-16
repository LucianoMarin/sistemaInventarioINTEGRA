<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';

    use HasFactory;
}
