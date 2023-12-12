<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarjeta;
use App\Models\Estado;

class TarjetaController extends Controller
{
    public function index(){
        return view('tarjetas.index');
    }

    public function store(Request $request ) {
        $tarjeta = new Tarjeta();
        $tarjeta->titulo = $request->titulo;
        $tarjeta->descripcion = $request->descripcion;
        $tarjeta->id_estado = $request->id_estado;
        $tarjeta->id_usuario = $request->id_usuario;
        $tarjeta->fecha_inicio = $request->fecha_inicio;
        $tarjeta->fecha_fin = $request->fecha_fin;
        $tarjeta->save();
        return $tarjeta;
    }

    public function getAll(string $id){
        //dd($id);
        $tarjetas = Tarjeta::with(['user', 'estado'])->where('id_estado', '=', $id)->get(); 
        return $tarjetas;
    }

    public function getById (string $id) {
        $tarjeta = Tarjeta::with(['user', 'estado'])->where('id', '=', $id)->get();
        return $tarjeta[0]; 
    }

    
    public function edit(string $id, Request $request){
        $tarjeta = Tarjeta::find($id);
        $tarjeta->titulo = $request->titulo;
        $tarjeta->descripcion = $request->descripcion;
        $tarjeta->id_estado = $request->id_estado;
        $tarjeta->id_usuario = $request->id_usuario;
        $tarjeta->fecha_inicio = $request->fecha_inicio;
        $tarjeta->fecha_fin = $request->fecha_fin;
        $tarjeta->save();
        return $tarjeta;
    }

    public function getAllCards() {
        $tarjetas = Tarjeta::with(['user', 'estado'])->get(); 
        return $tarjetas;
    }

}
