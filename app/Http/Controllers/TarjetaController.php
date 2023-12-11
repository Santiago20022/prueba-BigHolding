<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TarjetaController extends Controller
{
    public function index(){
        return view('tarjetas.index');
    }

    public function store(Request $request ) {
        $tarjeta = new Tarjeta();
        $tarjeta->Titulo=$request->get('Titulo');
        $tarjeta->Descripcion=$request->get('Descripcion');
        $tarjeta->id_estado=$Estado->id;
        $tarjeta->id_estado=$Estado->id;
        $tarjeta->save();
        return $tarjeta;
    }
}
