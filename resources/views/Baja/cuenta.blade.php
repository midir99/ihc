@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cambiar contraseña</div>

                <div class="card-body">
                <form method="POST" action="{{ route('baja.store')}}" onsubmit="return pregunta()">
                        @csrf

                        <div class="form-group row">
                            <label for="motivo" class="col-md-4 col-form-label text-md-right">{{ __('Motivo de la baja') }}</label>

                            <div class="col-md-6">
                                <textarea id="motivo" class="form-control" name="motivo" maxlength=255 placeholder="Ingresa el motivo de la baja de tu cuenta" rows="6"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ url('/home') }}">
                                    <button type="button" class="btn btn-primary">
                                        {{ __('Cancelar') }}
                                    </button>
                                    </a>

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Aceptar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script language="JavaScript">
function pregunta(){
    if (confirm('¿Estas seguro de que quieres eliminar la cuenta?'))
       return true;
    else
        return false;
}
</script> 
@endsection
