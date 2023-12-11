<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tarjeta;

class Estado extends Model
{
    use HasFactory;
    public function tarjetas(){
        return $this->hasMany(Tarjeta::class);
    }
}
