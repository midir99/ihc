@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="color:  #FFFFFF; background-color: #3f71b4;">Tablero</div>

                <div class="card-body" style="background-color: #abe5ff;">
                    @if (Auth::user()->confirmed == false)
                            <div class="alert alert-success" role="alert" style="background-color: #FFFFFF; color: #000000;">
                                {{ "Debes confirmar tu direccion de correo electrónico" }}
                                <a href="{{ route('user.reenviar') }} " style=" color: #3f71b4;">Reenviar correo de confirmación</a>
                            </div>
                            @if(session('reenvio'))
                                <div class="alert alert-success" role="alert" style="background-color: #FFFFFF; color: #000000;">
                                    {{session('reenvio')}}
                                </div>
                            @endif
                    @endif

                    @if(session('status'))
                        <div class="alert alert-success" role="alert" style="background-color: #FFFFFF; color: #000000;">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(session('message'))
                        <div class="alert alert-success" role="alert" style="background-color: #FFFFFF; color: #000000;">
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
