<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prenda extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',
        'precio',
        'stock',
    ];

    public function detalle(){
        return $this->hasMany(DetalleVenta::class);
    }

}
