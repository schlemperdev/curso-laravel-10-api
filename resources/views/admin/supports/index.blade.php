<h1>Lista de Suportes</h1>

<table>
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Mensagem</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($supports as $support)
            <tr>
                <td>{{ $support->subject }}</td>
                <td>{{ $support->status }}</td>
                <td>{{ $support->message }}</td>
                <td>
                    >
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
