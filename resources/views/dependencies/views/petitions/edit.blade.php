@extends('layouts.dependencies')

@section('content')
<div class="container-fluid dash-body">
    <div class="container-fluid">
        <div class="form-head d-flex mb-3 align-items-start">
            <div class="mr-auto d-none d-lg-block">
                <h2 class="text-black font-w600 mb-0">Petición ID #{{ $petition->token }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('dependencie.dashboard') }}" class="text-primary">Dashboard</a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0)">Detalle</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                    </div>

                    <div class="card-body">
                        <div id="step-form-horizontal" class="step-form-horizontal">
                            <div>
                                <h4>Información</h4>
                                <section>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="firstName">Nombres</label>
                                            <input type="text" class="form-control" id="firstname" placeholder="" value="{{ $petition->firstname  }}" disabled>
                                            <div class="invalid-feedback">
                                                Valid first name is required.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="lastName">Apellidos</label>
                                            <input type="text" class="form-control" id="lastname" placeholder="" value="{{ $petition->lastname  }}" disabled>
                                            <div class="invalid-feedback">
                                                Valid last name is required.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="lastName">Celular</label>
                                            <input type="text" class="form-control" id="cellphone" placeholder="" value="{{ $petition->cellphone  }}" disabled>
                                            <div class="invalid-feedback">
                                                Valid last name is required.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ $petition->email  }}" disabled>
                                                <div class="invalid-feedback">
                                                    Please enter a valid email address for shipping updates.
                                                </div>
                                        </div>

                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Tipo <span class="required">*</span></label>
                                                <div class="align-items-center">
                                                        {!! Form::select('type', $types, $type , ['class' => 'full-width','type' => 'text' ,'name' => 'available' ,'id' => 'inlineFormCustomSelect' , 'data-init-plugin' => 'select2','disabled']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Dependencia <span class="required">*</span></label>
                                                <div class="align-items-center">
                                                        {!! Form::select('dependencie', $dependencies, $dependencie , ['class' => 'full-width','type' => 'text' ,'name' => 'available' ,'id' => 'inlineFormCustomSelect' , 'data-init-plugin' => 'select2','disabled' ]) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Observaciones <span class="required">*</span></label>
                                                <div class="input-group mb-3">
                                                    <textarea name="observations" class="observation disabled" > {{ $petition->observation }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                    @if ($urldocuments!="")

                                            <div class="col-lg-12 mb-2">
                                                <div class="card">
                                                    <a class="card-body text-center ai-icon  text-primary" target="_blank" href="/pages/documents/{{ $urldocuments}}">
                                                        <svg id="rocket-icon" class="my-2" viewBox="0 0 24 24" width="80" height="80" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                            <line x1="3" y1="6" x2="21" y2="6"></line>
                                                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                                                        </svg>
                                                        <h4 class="my-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ver Documento</font></font></h4>
                                                    </a>
                                                </div>
                                            </div>

                                    @endif

                                </div>

                                </section>
                                <h4>Configuración</h4>
                                <section>
                                    {!! Form::open(['route' => ['dependencie.petitions.update', $petition->token], 'id' =>'step-form-horizontal' , 'class' =>'needs-validation' , 'method' =>'POST', 'files' => true]) !!}

                                        @if($petition->status_id == 1 || $petition->status_id == 2)

                                                    <div class="row">

                                                        <div class="col-lg-6 mb-2">
                                                            <div class="form-group">
                                                                <label class="text-label">Prioridad <span class="required">*</span></label>
                                                                <div class="align-items-center">
                                                                        {!! Form::select('prioritie', $priorities, $prioritie , ['class' => 'full-width','type' => 'text' ,'name' => 'prioritie' ,'id' => 'inlineFormCustomSelect' , 'data-init-plugin' => 'select2']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 mb-2">
                                                            <div class="form-group">
                                                                <label class="text-label">Estado <span class="required">*</span></label>
                                                                <div class="align-items-center">
                                                                        {!! Form::select('status', $status, $statu , ['class' => 'full-width','type' => 'text' ,'name' => 'status' ,'id' => 'inlineFormCustomSelect' , 'data-init-plugin' => 'select2']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12 mb-2">
                                                            <div class="form-group">
                                                                <label class="text-label">Documento <span class="required">*</span></label>
                                                                <div class="input-group mb-3">
                                                                    <div class="custom-file">
                                                                        <input type="file" id="answers" name="answers" class="custom-file-input">
                                                                        <label class="custom-file-label">Selecionar Archivo</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12 mb-2">
                                                            <div class="form-group">
                                                                <label class="text-label">Respuesta <span class="required">*</span></label>
                                                                <div class="input-group mb-3">
                                                                    <textarea name="response" id="response" ></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @if ($urlanswers!="")

                                                        <div class="row">
                                                            <div class="col-lg-12 mb-2">
                                                                <div class="card">
                                                                    <a class="card-body text-center ai-icon  text-primary" target="_blank" href="/pages/answers/{{ $urlanswers}}">
                                                                        <svg id="rocket-icon" class="my-2" viewBox="0 0 24 24" width="80" height="80" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                                            <line x1="3" y1="6" x2="21" y2="6"></line>
                                                                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                                                                        </svg>
                                                                        <h4 class="my-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ver Respuesta</font></font></h4>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endif

                                            <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>


                                        @elseif($petition->status_id == 3)

                                                <div class="row">
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Prioridad <span class="required">*</span></label>
                                                            <div class="align-items-center">
                                                                    {!! Form::select('prioritie', $priorities, $prioritie , ['class' => 'full-width','type' => 'text' ,'name' => 'prioritie' ,'id' => 'inlineFormCustomSelect' , 'data-init-plugin' => 'select2']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Estado <span class="required">*</span></label>
                                                            <div class="align-items-center">
                                                                    {!! Form::select('status', $status, $statu , ['class' => 'full-width','type' => 'text' ,'name' => 'status' ,'id' => 'inlineFormCustomSelect' , 'data-init-plugin' => 'select2']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Respuesta <span class="required">*</span></label>
                                                        <div class="input-group mb-3">
                                                            <textarea name="response" id="response" class="response disableds" > {{ $petition->response }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>



                                                @if ($urlanswers!="")

                                                    <div class="row">
                                                        <div class="col-lg-12 mb-2">
                                                            <div class="card">
                                                                <a class="card-body text-center ai-icon  text-primary" target="_blank" href="/pages/answers/{{ $urlanswers}}">
                                                                    <svg id="rocket-icon" class="my-2" viewBox="0 0 24 24" width="80" height="80" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                                                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                                                                    </svg>
                                                                    <h4 class="my-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ver Respuesta</font></font></h4>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endif

                                                <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>

                                            @else
                                                    <div class="row">

                                                        <div class="col-lg-6 mb-2">
                                                            <div class="form-group">
                                                                <label class="text-label">Prioridad <span class="required">*</span></label>
                                                                <div class="align-items-center">
                                                                        {!! Form::select('prioritie', $priorities, $prioritie , ['class' => 'full-width','type' => 'text' ,'name' => 'prioritie' ,'id' => 'inlineFormCustomSelect' , 'data-init-plugin' => 'select2' ,'disabled']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 mb-2">
                                                            <div class="form-group">
                                                                <label class="text-label">Estado <span class="required">*</span></label>
                                                                <div class="align-items-center">
                                                                        {!! Form::select('status', $status, $statu , ['class' => 'full-width','type' => 'text' ,'name' => 'status' ,'id' => 'inlineFormCustomSelect' , 'data-init-plugin' => 'select2','disabled']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Respuesta <span class="required">*</span></label>
                                                            <div class="input-group mb-3">
                                                                <textarea name="response" id="response" class="response disableds" > {{ $petition->response }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    @if ($urlanswers!="")

                                                        <div class="row">
                                                            <div class="col-lg-12 mb-2">
                                                                <div class="card">
                                                                    <a class="card-body text-center ai-icon  text-primary" target="_blank" href="/pages/answers/{{ $urlanswers}}">
                                                                        <svg id="rocket-icon" class="my-2" viewBox="0 0 24 24" width="80" height="80" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                                            <line x1="3" y1="6" x2="21" y2="6"></line>
                                                                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                                                                        </svg>
                                                                        <h4 class="my-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ver Respuesta</font></font></h4>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endif

                                        @endif

                                    {!! Form::close() !!}
                                </section>
                                <h4>Reporte</h4>
                                <section>

                                    @if ($reports->count()>=1)
                                        <div class="row">
                                            <div class="col-xl-12 col-xxl-12 col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div id="DZ_W_TimeLine" class="widget-timeline dz-scroll height370">
                                                            <ul class="timeline">
                                                                @foreach($reports as $report)
                                                                    <li>
                                                                        <div class="timeline-badge primary">
                                                                        </div>
                                                                        <a class="timeline-panel text-muted" href="#">
                                                                            <span>{{ humanize_view($report->created_at) }}</span>
                                                                            <h6 class="mb-0">Petición  {{ $report->status->title }} <strong class="text-primary">#{{ $report->token }}</strong></h6>
                                                                            <p class="mb-0 modification-report">Modificación por <span>{{ strtoupper($report->user->firstname) }} {{ strtoupper($report->user->lastname) }} </span></p>
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection

