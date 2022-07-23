<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo',
        'total',
        'fecha',
        'cliente_id',
    ];

    public function detalle(){
        return $this->hasMany(DetalleVenta::class);
    }
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
