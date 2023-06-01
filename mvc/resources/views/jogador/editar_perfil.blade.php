@extends('layouts.main')

@section('titulo', 'Editar Perfil')

@if ($erro ?? null != null || session('erro') != null)
    <x-alert.erro>
        {{ $erro ?? session('erro') }}
    </x-alert.erro>
@endif

@section('nav')
    <x-btn-nav.lobby accountType="{{ $_SESSION['tipo'] }}" />
@endsection

@section('content')

    <x-box-center.form>
        <form class="col-8 mb-0" action={{ route( $_SESSION['tipo'] . ".editar.perfil") }} method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mx-auto d-flex  justify-content-center align-items-center flex-column">
                <div class="mx-auto">
                    <x-text.title>
                        MODIFICAR PERFIL
                    </x-text.title>
                    <x-input.adaptive label="Nome" type="text" value="{{ $name }}" id="nomeInput" placeholder="Nome"
                        name="nome" />
                    <x-input.adaptive label="Email" type="email" value="{{ $email }}" id="emailInput"
                        placeholder="Email" name="email" />

                    <input type="file" id="imagem-perfil" name="imagem" value="" class="form-control"
                        accept="" capture>
                    <button class="btn btn-warning mt-3" value="salvar">SALVAR</button>
                    <a href="{{route($_SESSION['tipo'].".perfil")}}" class="btn btn-danger mt-3" >CANCELAR</a>

                </div>
        </form>
    </x-box-center.form>


@endsection
