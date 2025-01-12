<div class="container">
    <h1>Nova dúvida</h1>
    <form action="{{ route('supports.store') }}" method="POST">
        @csrf
        <div class="form-group" style="padding-bottom: 20px">
            <label for="title">Assunto</label>
            <input type="text" class="form-control" name="subject" placeholder="Assunto" required>
        </div>
        <div class="form-group" style="padding-bottom: 20px">
            <label for="description">Mensagem</label>
            <textarea class="form-control" name="message" rows="5" placeholder="Digite sua mensagem aqui" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
