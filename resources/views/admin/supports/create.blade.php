<div class="container">
    <h1>Nova dúvida</h1>

    @if ($errors->any())
        <div class="alert alert-danger" style="margin-top: 20px">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('supports.store') }}" method="POST">
        @csrf
        <div class="form-group" style="padding-bottom: 20px">
            <label for="title">Assunto</label>
            <input type="text" class="form-control" name="subject" placeholder="Assunto" value="{{ old('subject') }}" required>
        </div>
        <div class="form-group" style="padding-bottom: 20px">
            <label for="description">Mensagem</label>
            <textarea class="form-control" name="message" rows="5" placeholder="Digite sua mensagem aqui" required>{{ old('message') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
