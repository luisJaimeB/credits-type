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
                    Tipos créditos Banco de Davivienda
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('davivienda.upload') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group"><br>
                        <div class="row">
                            <label class="card-tittle" for="tipo_credito_dav">Adjuntar archivo CSV</label>
                            <input type="file" id="tipo_credito_dav" name="tipo_credito_dav" required>
                        </div>
                        <div class="row">
                            <input class="btn btn-primary" type="submit" value="Generar">
                        </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
        @isset($data)    
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            JSON para los tipos de Créditos solicitados...
                        </div>
                        <div class="card-body">
                            <code>
                                {{-- rango de datos en formato JSON --}}
                                @json($data)
                            </code>
                        </div>
                    </div>
                </div>
            </div>
        @endisset
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop