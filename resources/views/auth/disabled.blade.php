@extends('layouts.auth')


@section('content')

<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-5">
                <div class="form-input-content text-center error-page">
                    <h1 class="error-text font-weight-bold"><i class="fa fa-times-circle text-danger"></i></h1>
                    <h4>Error usuario inactivo</h4>
                    <p>No tienes permiso para ver este recurso.</p>
                    <div>
                        <a class="btn btn-primary" href="{{ route('login') }}">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


