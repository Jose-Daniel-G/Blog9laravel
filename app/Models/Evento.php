<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $table = 'eventos';
    // static $rules=['title'=>'required', 'descripcion'=>'required', 'start'=>'required|date', 'end'=>'required|date'];
    protected $fillable=['title', 'descripcion', 'start', 'end'];
    
}
