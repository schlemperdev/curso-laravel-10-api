@extends('admin.layouts.app')

@section('title', 'Fórum Suporte')

@section('header')
<h1 class="text-2xl text-gray-700 font-bold my-6 mb-6 flex items-center">
    Lista de Suportes

    <span class="rounded-md bg-blue-50 px-2 py-1 mr-3 ml-3 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/15 ">
        {{ $supports->total() }} Abertos
    </span>
</h1>
@endsection

@section('content')
<a href="{{ route('supports.create') }}">Criar Nova Dúvida</a>

<table style="padding-top: 20px">
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Mensagem</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($supports->items() as $support)
            <tr>
                <td>{{ $support->subject }}</td>
                <td>{{ getSupportStatus($support->status) }}</td>
                <td>{{ $support->message }}</td>
                <td>
                    <a href="{{ route('supports.show', $support->id) }}">Ver</a>
                    <a href="{{ route('supports.edit', $support->id) }}">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<x-pagination
    :paginator="$supports"
    :appends="$filters"
/>
@endsection
