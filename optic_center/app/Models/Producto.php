<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'Ref',
        'color',
        'precio',
        'imagen',
    ];

    public function compra(){
        return $this->hasMany(Ficha::class);
    }
}
