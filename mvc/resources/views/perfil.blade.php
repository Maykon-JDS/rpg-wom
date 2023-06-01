@extends('layouts.main')

@section('titulo', 'Login')

@section('nav')
    <x-btn-nav.lobby accountType="{{ $_SESSION['tipo'] }}" />
@endsection



@section('content')
<script>

    function disableOverlay(){
        let overlay = document.querySelector(".perfil-overlay");

        overlay.classList.remove('active');
    }

    function enableOverlay(){
        let overlay = document.querySelector(".perfil-overlay");

        overlay.classList.add('active');
    }

</script>

    <div class="perfil-overlay">
        <form class="col-8 mb-0" action="" method="post" enctype="multipart/form-data">
            @csrf
            @method('DELETE')

            <x-text.title-big>
                EXCLUIR CONTA
            </x-text.title-big>

            <div>
                <button class="btn btn-warning mt-3" value="excluir">SIM</button>
                <a class="btn btn-danger mt-3" value="excluir" onclick="disableOverlay()">NÃO</a>
            </div>
        </form>

    </div>
    <main class="row-main perfil row d-flex justify-content-center align-items-center ">
        <div class="mx-auto d-flex  justify-content-center align-items-center flex-column">
            <div class="circulo mx-auto">
                <img src="/{{ $image_address }}" alt="">
            </div>
            <div class="mx-auto">
                <p class="text-center mt-4 mb-1">NOME</p>
                <p class="text-center text-warning">{{ $name }}</p>
            </div>
            <div class="mx-auto">
                <p class="text-center mb-1">EMAIL</p>
                <p class="text-center text-warning">{{ $email }}</p>
            </div>
            <a class="btn btn-warning mt-3" href="{{ route($_SESSION['tipo'] . ".editar.perfil") }}">MODIFICAR PERFIL</a>
            <button class="btn btn-danger mt-3" onclick="enableOverlay()">EXCLUIR PERFIL</button>
        </div>
    </main>

@endsection
