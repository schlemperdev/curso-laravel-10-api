@csrf
<div class="form-group" style="padding-bottom: 20px">
    <label for="title">Assunto</label>
    <input type="text" class="form-control" name="subject" placeholder="Assunto" value="{{ $support->subject ?? old('subject') }}">
</div>
<div class="form-group" style="padding-bottom: 20px">
    <label for="description">Mensagem</label>
    <textarea class="form-control" name="message" rows="5" placeholder="Digite sua mensagem aqui">{{ $support->message ?? old('message') }}</textarea>
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
