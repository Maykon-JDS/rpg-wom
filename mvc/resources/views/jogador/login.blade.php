@extends('layouts.main')

@section('titulo', 'Login')

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
            <h2 class="titulo">
                <span class="text-warning">JOGADOR</span>
            </h2>
        </div>
        <form class="col-8" action={{ route('jogador.login') }} method="post">
            @csrf
            <div class="form-floating mb-3">
                <input required type="email" class="form-control" id="inputEmail" placeholder="E-mail" name="email"
                    value={{ $email ?? '' }}>
                <label for="inputEmail">E-mail</label>
            </div>
            <div class="form-floating">
                <input required type="password" class="form-control" id="inputPassword" placeholder="Senha" name="password"
                    value={{ $password ?? '' }}>
                <label for="inputPassword">Senha</label>
            </div>
            <button class="button-form-registro btn btn-lg btn-warning w-100" type="submit">LOGAR</button>
        </form>
    </x-box-center.form>
@endsection
