<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comentario;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function store(Request $request){
        $comentario = new Comentario();
        $comentario->id_usuario = Auth::id();
        $comentario->id_tarjeta = $request->id_tarjeta;
        $comentario->comentario = $request->comentario;
        $comentario->save();
        return $comentario;
    }

    public function getAll(string $id){
        //dd($id);
        $comentarios = Comentario::with(['user', 'tarjeta'])->where('id_tarjeta', '=', $id)->get(); 
        return $comentarios;
    }
}
