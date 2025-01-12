    <div class="container">
        <h1>Detalhes da Dúvida</h1>
        <div class="card">
            <div class="card-header">
                Dúvida #{{ $support->id }} - Status: {{ $support->status }}
            </div>
            <ul>
                <li style="h5">Assunto: {{ $support->subject }}</li>
                <li>Mensagem: {{ $support->message }}</li>
            </ul>
            <div class="card-body">
                <p class="card-text"><small class="text-muted">Created at: {{ $support->created_at }}</small></p>
                <p class="card-text"><small class="text-muted">Last Updated at: {{ $support->updated_at }}</small></p>
            </div>
            <a href="{{ route('supports.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
