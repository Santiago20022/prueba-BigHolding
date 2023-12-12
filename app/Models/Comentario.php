<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tarjeta;
use App\Models\User;

class Comentario extends Model
{
    use HasFactory;
    public function tarjeta(){
        return $this->belongsTo(Tarjeta::class, 'id_tarjeta');
    }
    public function user(){
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
