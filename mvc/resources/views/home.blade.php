@extends('layouts.main')

@section('titulo','Home')

@section('nav')
<x-btn-nav.sobre/>
@endsection

@section('content')
<x-box-center.home>
            <div>
                <h2 class="titulo">
                    <span class="text-warning">TIPO DE JOGADOR</span>
                </h2>
            </div>
            <div class="options d-flex flex-column w-50 ">
                <a href="/mestre" class="btn btn-outline-warning">MESRTE</a>
                <a href="/jogador" class="btn btn-outline-warning">JOGADOR</a>
            </div>
</x-box-center.home>
@endsection