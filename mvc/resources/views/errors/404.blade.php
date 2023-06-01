@extends('layouts.main')

@section('titulo','Home')

@section('nav')
<x-btn-nav.home />
@endsection

@section('content')
<main class="row-main page-404 row d-flex align-items-center justify-content-center">
    <div class=" d-flex align-items-center justify-content-center">
        <div class="box-error">
            <div class="d-flex flex-column h-100 justify-content-center align-items-center">
                <div>
                    <h1 class="titulo page-404 text-center">404</h1>
                    <h2 class="text-center page-404">OPS! PÁGINA NÃO ENCONTRADA!</h2>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection