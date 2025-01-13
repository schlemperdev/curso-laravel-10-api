<div class="container">

    <h1>Dúvida #{{ $support->id }}</h1>
    <h5>Status - {{ $support->status }}</h5>

    @if ($errors->any())
        <div class="alert alert-danger" style="margin-top: 20px">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('supports.update', $support->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group" style="padding-bottom: 20px">
            <label for="title">Assunto</label>
            <input type="text" class="form-control" name="subject" value="{{ $support->subject }}" required>
        </div>
        <div class="form-group" style="padding-bottom: 20px">
            <label for="description">Mensagem</label>
            <textarea class="form-control" name="message" rows="5" placeholder="Digite sua mensagem aqui" required>{{ $support->message }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

</div>
