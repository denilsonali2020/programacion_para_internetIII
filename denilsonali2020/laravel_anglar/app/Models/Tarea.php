<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    //con esto permitimos que anglar envie este campo pero si envia algo mas sera ignorado
    protected $fillable = ['titulo'];
}
