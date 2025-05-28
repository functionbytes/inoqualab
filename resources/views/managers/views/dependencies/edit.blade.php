@extends('layouts.managers')

@section('content')

<div class="content-body">
    <div class="container-fluid">


        <div class="row page-titles mx-0">
                <div class="col-lg-12">
                   
                    <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="{{ route('manager.dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('manager.branchs') }}">Dependencias</a></li>
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

                        {!! Form::open(['route' => ['manager.dependencies.update', $dependencie->slack], 'id' =>'step-form-horizontal' , 'class' =>'step-form-horizontal' , 'method' =>'POST', 'files' => true]) !!}

                            <div>
                                <section>
                                    <div class="row">
                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Nombres <span class="required">*</span></label>
                                                <input type="text" name="label" class="form-control" placeholder="Parsley" value="{{ $dependencie->label }}"  required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Email <span class="required">*</span></label>
                                                <input type="email" name="email" class="form-control" placeholder="Parsley" value="{{ $dependencie->email }}"  required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Estado <span class="required">*</span></label>
                                                <div class="align-items-center">
                                                        {!! Form::select('available', $availables, $available , ['class' => 'full-width select','type' => 'text' ,'name' => 'available' ,'id' => 'inlineFormCustomSelect' , 'data-init-plugin' => 'select2']) !!}
                                                </div>
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




