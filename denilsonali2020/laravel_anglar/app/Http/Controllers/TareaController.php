<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    //funcion de crear una tarea
    public function index()
    {
        $tareas = Tarea::all();
        return response()->json($tareas);
    }

    public function store(Request $request)
    {
        $tarea = new Tarea();
        $tarea->titulo = $request->titulo;
        $tarea->save();

        return response()->json($tarea);
    }
}
