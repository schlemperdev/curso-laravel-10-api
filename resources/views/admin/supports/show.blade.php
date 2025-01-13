    <div class="container">
        <h1>Detalhes da Dúvida</h1>
        <div class="card">
            <div class="card-header">
                Dúvida #{{ $support->id }} - Status: {{ $support->status }}
            </div>
            <ul>
                <li>Assunto: {{ $support->subject }}</li>
                <li>Mensagem: {{ $support->message }}</li>
            </ul>
            <div class="card-body">
                <p class="card-text"><small class="text-muted">Created at: {{ $support->created_at }}</small></p>
                <p class="card-text"><small class="text-muted">Last Updated at: {{ $support->updated_at }}</small></p>
            </div>
            <form action="{{ route('supports.destroy', $support->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('supports.index') }}" style="margin-right: 5px">Voltar</a>
                <a href="{{ route('supports.edit', $support->id) }}" style="margin-right: 10px">Editar</a>
                <button type="submit" class="btn btn-danger" style="margin-top: 10px">Deletar</button>
            </form>
        </div>
    </div>
