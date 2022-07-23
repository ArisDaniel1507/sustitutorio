
<table>
    <thead>
        <tr>
            <th>descripcion</th>
            <th>precio</th>
            <th>stock</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($prendas as $p)
            <tr>
                <td>{{ $p->descripcion }}</td>
                <td>{{ $p->precio }}</td>
                <td>{{ $p->stock }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
