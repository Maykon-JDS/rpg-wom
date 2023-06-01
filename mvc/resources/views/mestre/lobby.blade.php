@extends('layouts.main')

@section('titulo', 'Login')

@section('nav')
    <x-btn-nav.perfil accountType="{{ $_SESSION['tipo'] }}" />
    <x-btn-nav.logout />
@endsection


@section('content')

    <main class="row-main lobby row d-flex">
        <div class="header-secoes bg-black">
            <h1>SUAS SEÇÕES</h1>
        </div>
        <div class="box-secoes p-0">
            <div class="secoes">
                <div>
                    <p><strong>NOME:</strong> EXEMPLO</p>
                    <p><strong>CÓDIGO:</strong> 123456789-AB</p>
                </div>
                <picture class="config">
                    <a href="#"><img src="/icons/gear.png" alt="" width="30px"></a>
                </picture>
            </div>
        </div>
        <div class="d-flex p-0 ">
            <a href="#" class="btn-criar-sessao btn btn-warning w-100">CRIAR SEÇÃO</a>
        </div>
    </main>

@endsection
