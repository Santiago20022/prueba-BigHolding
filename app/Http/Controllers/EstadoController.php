<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estado;

class EstadoController extends Controller
{
    public function store(Request $request ) {
        $estado = new Estado();
        $estado->nombre = $request->nombre;
        $estado->descripcion = $request->descripcion;
        $estado->save();
        return response()->json($estado);

    }
}