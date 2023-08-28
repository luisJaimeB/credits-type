@extends('adminlte::page')

@section('title', 'Credits Types')

@section('content_header')
    <h1>Tipos crédito</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    Tipos créditos Banco de Costa Rica
                </div>
                <div class="card-body">
                    <form role="form">
                        <div class="form-group"><br>
                            <label class="card-tittle" for="tipo_credito_bcr">Adjuntar archivo CSV</label>
                            <input type="file" id="tipo_credito_bcr">
                            <p class="help-block">Carga tu archivo de tipos crédito BCR.</p>
                        </div>
                    </form>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        JSON para los tipos de Créditos descritos...
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Genera tu JSON</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
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