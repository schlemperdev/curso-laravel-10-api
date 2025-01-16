<h1>Lista de Suportes</h1>

<a href="{{ route('supports.create') }}">Criar Nova Dúvida</a>

<table style="padding-top: 20px">
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Mensagem</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($supports as $support)
            <tr>
                <td>{{ $support['subject'] }}</td>
                <td>{{ $support['status'] }}</td>
                <td>{{ $support['message'] }}</td>
                <td>
                    <a href="{{ route('supports.show', $support['id']) }}">Ver</a>
                    <a href="{{ route('supports.edit', $support['id']) }}">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
