@extends('layouts.main')

@section('titulo','Mestre - Home')

@section('nav')
<x-btn-nav.home/>
@endsection

@section('content')
<x-box-center.home>
    <div>
        <h2 class="titulo">
            <span class="text-warning">JOGADOR</span>
        </h2>
    </div>
    <div class="options d-flex flex-column w-50 ">
        <a href="{{route('jogador.login')}}" class="btn btn-outline-warning">LOGAR</a>
        <a href="{{route('jogador.registro')}}" class="btn btn-outline-warning">CRIAR CONTA</a>
    </div>
</x-box-center.home>
@endsection