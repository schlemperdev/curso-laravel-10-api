@extends('admin.layouts.app')

@section('title', 'Fórum Suporte')

@section('header')
    <h1 class="text-2xl text-gray-700 font-bold my-6 mb-6 flex items-center">
        Lista de Suportes

        <span
            class="rounded-md bg-blue-50 px-2 py-1 mr-3 ml-3 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/15 ">
            {{ $supports->total() }} Abertos
        </span>
    </h1>
@endsection

@section('content')
    <a href="{{ route('supports.create') }}">Criar Nova Dúvida</a>

    <div class="h-2"></div>

    <div class="mx-auto mt-10 w-auto min-w-[550px] max-w-[1280px] px-10">
        <div
            class="grid h-11 w-full grid-cols-12 items-center rounded-full bg-gradient-to-b from-[#5aa4d6] from-[5%] via-[#94c3e5] via-[60%] to-[#c6def1] to-[95%] px-4 text-base font-medium text-[#1f5785] shadow-inner shadow-[#94c3e5] outline outline-2 -outline-offset-1 outline-[#94c3e5]">
            <div class="col-span-1">Assunto</div>
            <div class="col-span-1">Status</div>
            <div class="col-span-8 place-self-center">Mensagem</div>
            <div class="h-[70%] rounded-full text-center"></div>
            <div class="h-[70%] rounded-full text-center"></div>
        </div>
    </div>

    <div class="h-2"></div>

    <div class="mx-auto grid w-auto min-w-[550px] max-w-[1280px] px-10">
        <div
            class="items-center divide-y divide-[#5aa4d6] rounded-3xl bg-gradient-to-b from-[#5aa4d6] from-[5%] via-[#94c3e5] via-[60%] to-[#c6def1] to-[95%] px-4 text-base font-light text-[#1f5785] shadow-2xl shadow-[#94c3e5] outline outline-2 -outline-offset-1 outline-[#94c3e5]">
            @foreach ($supports->items() as $support)
                <div class="row-span-1 grid grid-flow-col items-center gap-4">
                    <div class="col-span-1">{{ $support->subject }}</div>
                    <div class="col-span-1">{{ getSupportStatus($support->status) }}</div>
                    <p class="col-span-8 truncate">{{ $support->message }}</p>
                    <div class="col-span-1 mx-1 my-1">
                        <div class="my-2 rounded-full bg-white px-3 text-center"><a
                                href="{{ route('supports.show', $support->id) }}">Ver</a></div>
                        <div class="my-2 rounded-full bg-white px-3 text-center"><a
                                href="{{ route('supports.edit', $support->id) }}">Editar</a></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <x-pagination :paginator="$supports" :appends="$filters" />
@endsection
