@extends('layouts.dependencies')

@section('content')

<div class="container-fluid dash-body">
    <div class="container-fluid">

        <div class="row page-titles mx-0">
                <div class="col-lg-12">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <p class="mb-0">Your business dashboard template</p>
                    </div>
                    <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="{{ route('dependencie.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a >Usuario</a></li>
                            <li class="breadcrumb-item "><a href="javascript:void(0)">Editar</a></li>
                        </ol>
                    </div>
                </div>
        </div>

        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"></h4>
                    </div>
                    <div class="card-body">

                        {!! Form::open(['route' => ['dependencie.configurations.update'], 'id' =>'step-form-horizontal' , 'class' =>'step-form-horizontal' , 'method' =>'POST', 'files' => true]) !!}

                            <div>
                                <section>
                                    <div class="row">

                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Nombres <span class="required">*</span></label>
                                                <input type="text" name="firstname" class="form-control" placeholder="Parsley" value="{{ $user->firstname }}"  required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Apellidos <span class="required">*</span></label>
                                                <input type="text" name="lastname" class="form-control" placeholder="Montana" value="{{ $user->lastname }}"  required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Cargo <span class="required">*</span></label>
                                                <input type="text" name="charge" class="form-control" placeholder="(+1)408-657-9007" value="{{ $user->charge }}" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Celular <span class="required">*</span></label>
                                                <input type="text" name="cellphone" class="form-control" placeholder="(+1)408-657-9007" value="{{ $user->cellphone }}" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Correo Electronico <span class="required">*</span></label>
                                                <input type="email" name="email" class="form-control" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="example@example.com.com" value="{{ $user->email }}" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Contraseña</label>
                                                <input type="password" name="password" class="form-control" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="*****">
                                            </div>
                                        </div>

                                    </div>
                                </section>

                                <button class="btn btn-primary btn-lg btn-block" type="submit">Editar</button>

                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




