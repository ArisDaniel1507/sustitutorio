<?php

namespace App\Http\Controllers;

use App\Models\Prenda;
use Illuminate\Http\Request;

class PrendaController extends Controller
{

    public function index()
    {
        $prendas = Prenda::get();
        return view('prenda.index',compact('prendas'));
    }

    public function create()
    {
        return view('prenda.create');
    }

    public function store(Request $request)
    {
        $validado = $request->validate([
            'descripcion' => 'required|min:15|max:20',
            'precio' => 'required',
            'stock' => 'required',
        ]);
        dd($validado);
        Prenda::create($validado);
        return redirect()->route('prenda.index')->with('message','prenda registrada');
    }

    
}
