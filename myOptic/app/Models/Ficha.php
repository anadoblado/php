<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    use HasFactory;

    protected $fillable=[
        'fecha',
        'g_ojo_iz',
        'g_ojo_der',
    ];

    public function visita_usuario(){
        return $this->belongsTo(User::class);
    }

    public function visita_articulo(){
        return $this->belongsTo(Producto::class);
    }
}
