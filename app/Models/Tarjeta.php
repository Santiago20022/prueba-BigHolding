<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comentario;
use App\Models\Estado;
use App\Models\User;

class Tarjeta extends Model
{
    use HasFactory;
    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }


    public function estado(){
        return $this->belongsTo(Estado::class, 'id_estado');
    }
    public function user(){
        return $this->belongsTo(User::class, 'id_usuario');
    }


}
