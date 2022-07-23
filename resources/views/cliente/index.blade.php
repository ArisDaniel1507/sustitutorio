
<table>
    <thead>
        <tr>
            <th>nombres</th>
            <th>dni</th>
            <th>celular</th>
            <th>direccion</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $c)
            <tr>
                <td>{{ $c->nombres }}</td>
                <td>{{ $c->dni }}</td>
                <td>{{ $c->celular }}</td>
                <td>{{ $c->direccion }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
