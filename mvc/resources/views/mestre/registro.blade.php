@extends('layouts.main')

@section('titulo', 'Registro')



@if ($erro ?? null != null || session('erro') != null)
    <x-alert.erro>
        {{ $erro ?? session('erro') }}
    </x-alert.erro>
@endif



@section('nav')
    <x-btn-nav.home />
    <x-btn-nav.voltar />
@endsection



@section('content')
    <x-box-center.form>
        <div class="d-flex flex-column align-items-center mb-3">
            <x-text.title>
                MESTRE
            </x-text.title>
        </div>
        <form class="col-8" action={{ route('mestre.registro') }} method="post">
            @csrf
            <div class="form-floating mb-3">
                <input required type="text" value="{{ old('name') }}" class="form-control" id="inputName"
                    placeholder="Nome" name="nome">
                <label for="inputName">Nome</label>
            </div>
            <div class="form-floating mb-3">
                <input required type="email" value="{{ old('email') }}" class="form-control" id="inputEmail"
                    placeholder="E-mail" name="email">
                <label for="inputEmail">E-mail</label>
            </div>
            <div class="form-floating">
                <input required type="password" value="{{ old('senha') }}" class="form-control" id="inputPassword"
                    placeholder="Senha" name="senha">
                <label for="inputPassword">Senha</label>
            </div>
            <button class="button-form-registro btn btn-lg btn-warning w-100" type="submit">CRIAR CONTA</button>
        </form>
    </x-box-center.form>
@endsection
