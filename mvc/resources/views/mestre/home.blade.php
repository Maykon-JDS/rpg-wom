@extends('layouts.main')

@section('titulo', 'Mestre - Home')

@section('nav')
    <x-btn-nav.home />
@endsection

@section('content')
    <x-box-center.home>
        <div>
            <x-text.title>
                MESTRE
            </x-text.title>
        </div>
        <div class="options d-flex flex-column w-50 ">
            <a href="{{route('mestre.login')}}" class="btn btn-outline-warning">LOGAR</a>
            <a href="{{route('mestre.registro')}}" class="btn btn-outline-warning">CRIAR CONTA</a>
        </div>
    </x-box-center.home>
@endsection
