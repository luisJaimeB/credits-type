@extends('adminlte::page')

@section('title', 'Credits Types')

@section('content_header')
    <h1>Tipos crédito</h1>
@stop

@section('content')
    <p>Bienvenido cachón, este será el panel admin.</p>
    <div class="container">
        <div class="row">
            <div class="col-mb-4 p-3">
                <div class="card" style="width: 18rem;">
                    <img src="vendor/adminlte/dist/img/bancoatlantida.png" class="card-img-top rounded" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Honduras</h5>
                        <p class="card-text">Si requieres el documento base para compartir al banco y crear los diferentes tipos de créditos lo puedes descargar acontinuación</p>
                        <a href="#" class="btn btn-primary">Descargar</a>
                    </div>
                </div>
            </div>
            <div class="col-mb-4 p-3">
                <div class="card" style="width: 18rem;">
                    <img src="vendor/adminlte/dist/img/bcr.png" class="card-img-top rounded" alt="..." height="140">
                    <div class="card-body">
                        <h5 class="card-title">BCR</h5>
                        <p class="card-text">Si requieres el documento base para compartir al banco y crear los diferentes tipos de créditos lo puedes descargar acontinuación</p>
                        <a href="#" class="btn btn-primary">Descargar</a>
                    </div>
                </div>
            </div>
            <div class="col-mb-4 p-3">
                <div class="card" style="width: 18rem;">
                    <img src="vendor/adminlte/dist/img/davivienda.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Davivienda</h5>
                        <p class="card-text">Si requieres el documento base para compartir al banco y crear los diferentes tipos de créditos lo puedes descargar acontinuación</p>
                        <a href="#" class="btn btn-primary">Descargar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-mb-6 p-3">
                <div class="card" style="width: 18rem;">
                    <img src="vendor/adminlte/dist/img/getnet.png" class="card-img-top rounded" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Get Net Uruguay</h5>
                        <p class="card-text">Si requieres el documento base para compartir al banco y crear los diferentes tipos de créditos lo puedes descargar acontinuación</p>
                        <a href="#" class="btn btn-primary">Descargar</a>
                    </div>
                </div>
            </div>
            <div class="col-mb-6 p-3">
                <div class="card" style="width: 18rem;">
                    <img src="vendor/adminlte/dist/img/ecuador.png" class="card-img-top rounded" alt="..." height="115">
                    <div class="card-body">
                        <h5 class="card-title">Ecuador</h5>
                        <p class="card-text">Si requieres el documento base para compartir al banco y crear los diferentes tipos de créditos lo puedes descargar acontinuación</p>
                        <a href="#" class="btn btn-primary">Descargar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
