<?php 
    use App\Classes\ClassGenerator;
?>

<main class="row-main row {{ClassGenerator::ClasseGeneratortoCssBackgroundImage()}} d-flex align-items-center justify-content-center">
    {{ $slot }}
</main>
