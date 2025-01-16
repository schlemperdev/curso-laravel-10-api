<h1>Dúvida #{{ $support->id }}</h1>
<h5>Status - {{ $support->status }}</h5>

<x-alert/>

<form action="{{ route('supports.update', $support->id) }}" method="POST">
    @method('PUT')
    @include('admin.supports.partials.form', [
        'subject' => $support->subject,
        'message' => $support->message
        ])
</form>
