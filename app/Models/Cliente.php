<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombres',
        'dni',
        'celular',
        'direccion',
    ];
    public function venta(){
        return $this->hasMany(Venta::class);
    }
}
