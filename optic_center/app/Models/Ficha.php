<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ficha extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'fecha',
        'g_ojo_iz',
        'g_ojo_der',
        'imagen',
    ];

    public function visita_usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function visita_articulo(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
