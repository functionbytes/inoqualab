@extends('layouts.dependencies')

@section('content')

<div class="container-fluid dash-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="form-head d-flex mb-3 align-items-start">
            <div class="mr-auto d-none d-lg-block">
                <h2 class="text-black font-w600 mb-0">Petición ID #{{ $petition->token }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dependencie.dashboard') }}" >Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)" class="text-primary">Detalle</a></li>
                </ol>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12 col-xl-3 col-md-12">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 ">
                        <div class="card h-auto">
                            <div class="card-body text-center">
                                <img src="/managers/images/contacts/example.png" width="150" class="rounded-circle mb-4" alt=""/>
                                <h4 class="mb-3 text-black font-w600">{{ $petition->firstname }} {{ $petition->lastname }}</h4>

                                <a href="javascript:void(0);" class="btn btn-alert light btn-x prioritie-{{ $petition->prioritie->title }}">{{ $petition->prioritie->title }}</a>
                            </div>
                            <ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between">
                                    <span class="mb-0"><font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Email</font></font></span>
                                        <strong class="text-muted"><font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">{{ $petition->email }}</font></font></strong></li>
								<li class="list-group-item d-flex justify-content-between">
                                    <span class="mb-0"><font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Celular</font></font></span>
                                        <strong class="text-muted"><font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">{{ $petition->cellphone }}</font></font></strong></li>
								<li class="list-group-item d-flex justify-content-between">
                                    <span class="mb-0"><font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Tipo</font></font></span>
                                        <strong class="text-muted"><font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">{{ $petition->type->title }}</font></font></strong></li>
								<li class="list-group-item d-flex justify-content-between">
                                    <span class="mb-0"><font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Dependencia</font></font></span>
                                        <strong class="text-muted"><font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">{{ $petition->dependencie->title }}</font></font></strong></li>
							</ul>

                            <div class="card bg-secondary sticky mb-0">
                                <div class="card-header border-0 pb-0">
                                    <h5 class="card-title text-white mt-2 text-center">Observación</h5>
                                </div>
                                <div class="card-body pt-3 text-white">
                                    {!! $petition->observation !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($reports->count()>=1)
                        <div class="col-xl-12 col-lg-6">
                            <div class="card">
                                <div class="card-header border-0 pb-0">
                                    <h4 class="card-title">Reporte</h4>
                                </div>
                                <div class="card-body">
                                    <div class="widget-timeline-icon">
                                        <ul class="timeline">
                                            @foreach($reports as $report)
                                                <li>
                                                    <div class="icon bg-primary"></div>
                                                    <a class="timeline-panel text-muted" href="javascript:void(0);">
                                                        <h4 class="mb-2"> Petición  {{ $report->status->title }}</h4>
                                                        <p class="fs-15 mb-0 ">{{ humanize_view($report->created_at) }}</p>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
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
                </div>
            </div>
            <div class="col-lg-12 col-xl-9 col-md-12">
                <div class="card">
                    <div class="card-header border-0 d-sm-flex d-block pb-0">
                        <div>
                            <h4 class="card-title mb-1 fs-28 font-w600">Comentarios</h4>
                            <p class="mb-0">Aquí está la opinión de las dependencias y administrador</p>
                        </div>
                        <a href="{{ route('dependencie.petitions.tracing', $petition->token) }}" class="btn btn-primary shadow-primary btn-rounded text-white"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">+ Mensaje nuevo</font></font></a>
                    </div>
                    <div class="card-body">
                        @foreach($tracings as $tracing)
                            <div class="media review-box row">
                                    <img class="mr-3 img-fluid btn-rounded" width="55" src="/managers/images/contacts/example.png" alt="DexignZone">
                                    <div class="media-body">
                                        <h4 class="mt-0 mb-0 text-black">{{ $tracing->user->firstname }} {{ $tracing->user->lastname }}</h4>
                                        <ul class="review-meta mb-1 d-block d-sm-flex align-items-center">
                                            <li class="mr-3"><small>{{ $tracing->user->charge }}</small></li>
                                            <li class="mr-3"><small>{{ humanize_view($tracing->created_at) }}</small></li>
                                        </ul>

                                        @if ($tracing->documents()!=null)

                                            <div class="read-content-attachment ">
                                                <a  target="_blank" href="/pages/tracings/{{ $tracing->documents()->filename }}">
                                                    <h6>
                                                        <i class="fa fa-download mb-2"></i>
                                                        Archivos adjuntos
                                                    </h6>
                                                </a>
                                            </div>

                                        @endif

                                        <div class="mb-1 text-secondary content-message ">" {{ $tracing->observation }} "</div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>

@endsection

