<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::get();
        return view('cliente.index',compact('clientes'));
    }

    public function create()
    {
        return view('cliente.create');
    }


    public function store(Request $request)
    {
        $validado = $request->validate([
            'nombres' => 'required|min:5|max:15',
            'dni' => 'required|unique:clientes|max:8|min:8',
            'celular' => 'required|unique:clientes|max:9|min:9',
            'direccion' => 'required|unique:clientes|max:30|min:10',
        ]);
        dd($validado);
        Cliente::create($validado);
        return redirect()->route('cliente.index')->with('message','cliente registrada');
    }

  
}
