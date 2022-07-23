<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\DetalleVenta;
use App\Models\Prenda;
use App\Models\Venta;
use Illuminate\Http\Request;
use DB;
class VentaController extends Controller
{

    public function index()
    {
        $ventas = Venta::get();
        return view('venta.index',compact('ventas'));
    }


    public function create()
    {
        $clientes = Cliente::get();
        $prendas = Prenda::get();
        return view('venta.create', compact('clientes','prendas'));
    }

    public function store(Request $request, $prendas = [])
    {
        $validado = $request->validate([
            'codigo' => 'required|min:15|max:20',
            'total' => 'required',
            'fecha' => 'required',
            'cliente_id' => 'required',
        ]);
        dd($validado);
        DB::beginTransaction();

        try {
            $venta = Venta::create($validado);
            
            if ($venta){
                foreach ($prendas as $p) {
                    DetalleVenta::create([
                        'precio' => $p->precio,
                        'cantidad' => $p->cantidad,
                        'prenda_id' => $p->id,
                        'venta_id' => $venta->id,
                    ]);

                    //actualizar stock prenda vendida
                    $prenda = Prenda::find($p->id);
                    $prenda->stock = $prenda->stock - $p->cantidad;
                    $prenda->save();
                }
            }
            DB::commit();
            return redirect()->route('venta.index')->with('message','venta registrada');
        }catch (\Exception $e){
            DB::rollback();
            session()->flash('message',$e->getMessage());
        }
    }

    public function reporte(Request $request = null)
    {
        $fecha = $request['fecha'];

        $ventas = Venta::join('clientes as c','ventas.id','c.id')
        ->select('ventas.*','clientes.*',)
        ->where('fecha',$fecha)
        ->get();
        dd($ventas);
        return $ventas;
    }
}
