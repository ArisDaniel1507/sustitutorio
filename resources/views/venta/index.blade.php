
<div>
    <form action="{{ route('venta.reporte') }}" method="post">
        @csrf
        <input type="date" name="fecha" id="fecha">
        <button type="submit">consultar</button>
    </form>
</div>
<table>
    <thead>
        <tr>
            <th>codigo</th>
            <th>total</th>
            <th>fecha</th>
            <th>cliente_id</th>
        </tr>
    </thead>
    <tbody>
        @if ($ventas)
            
        @foreach ($ventas as $v)
        <tr>
            <td>{{ $v->codigo }}</td>
            <td>{{ $v->total }}</td>
            <td>{{ $v->fecha }}</td>
            <td>{{ $v->cliente->nombres }}</td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="4">Ingrese fecha para consultar ventas</td>
        </tr>
        @endif
    
    </tbody>
</table>
