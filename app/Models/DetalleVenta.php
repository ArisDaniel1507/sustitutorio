<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $fillable = [
        'venta_id',
        'prenda_id',
        'cantidad',
        'precio',
    ];
    public function venta(){
        return $this->belongsTo(Venta::class);
    }
    public function prenda(){
        return $this->belongsTo(Prenda::class);
    }
}
