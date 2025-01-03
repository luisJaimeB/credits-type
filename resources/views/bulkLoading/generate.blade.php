@extends('adminlte::page')

@section('title', 'Cargue Masivo de BINes')

@section('content_header')
    <h1>Cargue Masivo de BINes</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                Apartado para cargue masivo de BINES para la franquicia de Master Card
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('loading.generate') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group"><br>
                        <div class="row">
                            <label class="card-tittle" for="cargue_masivo_master">Adjuntar archivo CSV </label><br>
                            <input type="file" id="cargue_masivo_master" name="cargue_masivo_master" required>
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
                            Apartado para cargue masivo de BINES para la franquicia de Master Card
                        </div>
                        <div class="card-body">
                            <code>
                                {
                                    "include": [
                                        {
                                            "ranges": [
                                                @foreach ($data as $item )                                                      
                                                    {
                                                        "bin": "{{ $item[3] }}",
                                                        "end": "{{ $item[5] }}",
                                                        "start": "{{ $item[4] }}"
                                                    }@if (!$loop->last),@endif
                                                @endforeach
                                                ],
                                            "credits": [
                                                @foreach ($credits as $item)
                                                    {
                                                        "code": "{{ $item[0] }}",
                                                        "description": "{{ $item[1] }}",
                                                        "installment": "{{ $item[2] }}",
                                                        "merchantCode": "{{ $item[3] }}",
                                                        "terminalNumber": "{{ $item[4] }}"
                                                    } @if (!$loop->last),@endif
                                                @endforeach
                                                ]
                                        }
                                        ]
                                }
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