@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tablero</div>

                <div class="card-body">
                    @if (Auth::user()->confirmed == false)
                            <div class="alert alert-success" role="alert">
                                {{ "Debes confirmar tu direccion de correo electrónico" }}
                                <a href="{{ route('user.reenviar') }}">Reenviar correo de confirmación</a>
                            </div>
                            @if(session('reenvio'))
                                <div class="alert alert-success" role="alert">
                                    {{session('reenvio')}}
                                </div>
                            @endif
                    @endif

                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(session('message'))
                        <div class="alert alert-success" role="alert">
                            {{session('message')}}
                        </div>
                    @endif

                    ¡Has iniciado sesión!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
