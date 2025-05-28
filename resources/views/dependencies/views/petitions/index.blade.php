@extends('layouts.dependencies')

@section('content')


<div class="container-fluid dash-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="project-nav">
            <div class="card-action card-tabs  mr-auto">
                <ul class="nav nav-tabs style-2">
                    <li class="nav-item">
                        <a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Todas <span class="badge badge-pill shadow-primary badge-primary">{{ count($alls) }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Pendiente <span class="badge badge-pill badge-info shadow-info">{{ count($pendings) }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="#navpills-3" class="nav-link" data-toggle="tab" aria-expanded="true">En Proceso <span class="badge badge-pill badge-warning shadow-warning">{{ count($process) }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="#navpills-4" class="nav-link" data-toggle="tab" aria-expanded="true">Terminado <span class="badge badge-pill badge-danger shadow-danger">{{ count($finisheds) }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="#navpills-5" class="nav-link" data-toggle="tab" aria-expanded="true">Solucionado <span class="badge badge-pill badge-light shadow-light">{{ count($solutions) }}</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content project-list-group" id="myTabContent">
            <div class="tab-pane fade active show" id="navpills-1">
                @foreach($alls as $all)
                        <div class="card">
                            <div class="project-info">
                                <div class="col-xl-3 col-xxl-3 my-2 col-lg-4 col-sm-6">
                                    <p class="text-primary mb-1 font-w500">{{ $all->type->title }}</p>
                                    <h4 class="title font-w600 mb-1">
                                        <a href="{{ route('dependencie.petitions.view', $all->token) }}" class="text-black">
                                            {{ $all->token }}
                                        </a>
                                    </h4>
                                    <div class="text-dark">
                                        <i class="fa fa-calendar-o mr-1" aria-hidden="true"></i>
                                        {{ humanize_view($all->created_at) }}
                                    </div>
                                </div>
                                <div class="col-xl-3 my-2 col-xxl-3 col-lg-4 col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <div class="user-avatar-sm customer">
                                            {{ strtoupper(substr($all->firstname, 0, 1)) }} {{ strtoupper(substr($all->firstname, 0, 1)) }}
                                        </div>
                                        <div class="ml-3">
                                            <span>Cliente</span>
                                            <h5 class="mb-0 fs-18 font-w50 text-black">{{ $all->firstname }} {{ $all->lastname }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 my-2 col-xxl-3 col-lg-4 col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <div class="user-avatar-sm dependencies">
                                            {{ strtoupper(substr($all->dependencie->title, 0, 2)) }}
                                        </div>
                                        <div class="ml-3">
                                            <span>Dependencia</span>
                                            <h5 class="mb-0 fs-18 font-w500 text-black">{{ $all->dependencie->title }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 my-2 col-xxl-3 col-lg-6 col-sm-6">
									<div class="d-flex project-status align-items-center text-center">
                                        @if($all->status->slug == 'pendiente')
                                            <a href="javascript:void(0);" class="btn btn-info light status-btn">
                                                Pendiente
                                            </a>
                                        @elseif($all->status->slug == 'proceso')
                                            <a href="javascript:void(0);" class="btn btn-warning light status-btn">
                                                En Proceso
                                            </a>
                                        @elseif($all->status->slug == 'terminado')
                                            <a href="javascript:void(0);" class="btn btn-danger light status-btn">
                                                Terminado
                                            </a>
                                        @elseif($all->status->slug == 'solucionado')
                                            <a href="javascript:void(0);" class="btn btn-light light status-btn">
                                                Solucionado
                                            </a>
                                        @endif
									</div>
								</div>
                                <div class="col-xl-1 my-2 col-xxl-3 col-lg-6 col-sm-6">
                                    <div class="d-flex project-status align-items-center">
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ route('dependencie.petitions.view', $all->token) }}" >Visualizar</a>
                                                <a class="dropdown-item" href="{{ route('dependencie.petitions.edit', $all->token) }}" >Editar</a>
                                                <a class="dropdown-item" href="{{ route('dependencie.petitions.tracing', $all->token) }}" >Reporte</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
            <div class="tab-pane fade" id="navpills-2">
                 @foreach($pendings as $pending)
                            <div class="card">
                                <div class="project-info">
                                    <div class="col-xl-3 col-xxl-3 my-2 col-lg-4 col-sm-6">
                                        <p class="text-primary mb-1 font-w500">{{ $pending->type->title }}</p>
                                        <h4 class="title font-w600 mb-1">
                                            <a href="{{ route('dependencie.petitions.view', $pending->token) }}" class="text-black">
                                                {{ $pending->token }}
                                            </a>
                                        </h4>
                                        <div class="text-dark">
                                            <i class="fa fa-calendar-o mr-1" aria-hidden="true"></i>
                                            {{ humanize_view($pending->created_at) }}
                                        </div>
                                    </div>
                                    <div class="col-xl-3 my-2 col-xxl-3 col-lg-4 col-sm-6">
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar-sm customer">
                                                {{ strtoupper(substr($pending->firstname, 0, 1)) }} {{ strtoupper(substr($pending->firstname, 0, 1)) }}
                                            </div>
                                            <div class="ml-3">
                                                <span>Cliente</span>
                                                <h5 class="mb-0 fs-18 font-w50 text-black">{{ $pending->firstname }} {{ $pending->lastname }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 my-2 col-xxl-3 col-lg-4 col-sm-6">
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar-sm dependencies">
                                                {{ strtoupper(substr($pending->dependencie->title, 0, 2)) }}
                                            </div>
                                            <div class="ml-3">
                                                <span>Dependencia</span>
                                                <h5 class="mb-0 fs-18 font-w500 text-black">{{ $pending->dependencie->title }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 my-2 col-xxl-3 col-lg-6 col-sm-6">
                                        <div class="d-flex project-status align-items-center text-center">
                                            @if($pending->status->slug == 'pendiente')
                                                <a href="javascript:void(0);" class="btn btn-info light status-btn">
                                                    Pendiente
                                                </a>
                                            @elseif($pending->status->slug == 'proceso')
                                                <a href="javascript:void(0);" class="btn btn-warning light status-btn">
                                                    En Proceso
                                                </a>
                                            @elseif($pending->status->slug == 'terminado')
                                                <a href="javascript:void(0);" class="btn btn-danger light status-btn">
                                                    Terminado
                                                </a>
                                            @elseif($pending->status->slug == 'solucionado')
                                                <a href="javascript:void(0);" class="btn btn-light light status-btn">
                                                    Solucionado
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-1 my-2 col-xxl-3 col-lg-6 col-sm-6">
                                        <div class="d-flex project-status align-items-center">
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ route('dependencie.petitions.view', $pending->token) }}" >Visualizar</a>
                                                    <a class="dropdown-item" href="{{ route('dependencie.petitions.edit', $pending->token) }}" >Editar</a>
                                                    <a class="dropdown-item" href="{{ route('dependencie.petitions.tracing', $pending->token) }}" >Reporte</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
            </div>
            <div class="tab-pane fade" id="navpills-3">
                @foreach($process as $proces)
                    <div class="card">
                        <div class="project-info">
                            <div class="col-xl-3 col-xxl-3 my-2 col-lg-4 col-sm-6">
                                <p class="text-primary mb-1 font-w500">{{ $proces->type->title }}</p>
                                <h4 class="title font-w600 mb-1">
                                    <a href="{{ route('dependencie.petitions.view', $proces->token) }}" class="text-black">
                                        {{ $proces->token }}
                                    </a>
                                </h4>
                                <div class="text-dark">
                                    <i class="fa fa-calendar-o mr-1" aria-hidden="true"></i>
                                    {{ humanize_view($proces->created_at) }}
                                </div>
                            </div>
                            <div class="col-xl-3 my-2 col-xxl-3 col-lg-4 col-sm-6">
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar-sm customer">
                                        {{ strtoupper(substr($proces->firstname, 0, 1)) }} {{ strtoupper(substr($proces->firstname, 0, 1)) }}
                                    </div>
                                    <div class="ml-3">
                                        <span>Cliente</span>
                                        <h5 class="mb-0 fs-18 font-w50 text-black">{{ $proces->firstname }} {{ $proces->lastname }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 my-2 col-xxl-3 col-lg-4 col-sm-6">
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar-sm dependencies">
                                        {{ strtoupper(substr($proces->dependencie->title, 0, 2)) }}
                                    </div>
                                    <div class="ml-3">
                                        <span>Dependencia</span>
                                        <h5 class="mb-0 fs-18 font-w500 text-black">{{ $proces->dependencie->title }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 my-2 col-xxl-3 col-lg-6 col-sm-6">
                                <div class="d-flex project-status align-items-center text-center">
                                    @if($proces->status->slug == 'pendiente')
                                        <a href="javascript:void(0);" class="btn btn-info light status-btn">
                                            Pendiente
                                        </a>
                                    @elseif($proces->status->slug == 'proceso')
                                        <a href="javascript:void(0);" class="btn btn-warning light status-btn">
                                            En Proceso
                                        </a>
                                    @elseif($proces->status->slug == 'terminado')
                                        <a href="javascript:void(0);" class="btn btn-danger light status-btn">
                                            Terminado
                                        </a>
                                    @elseif($proces->status->slug == 'solucionado')
                                        <a href="javascript:void(0);" class="btn btn-light light status-btn">
                                            Solucionado
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xl-1 my-2 col-xxl-3 col-lg-6 col-sm-6">
                                <div class="d-flex project-status align-items-center">
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                            <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('dependencie.petitions.view', $pending->token) }}" >Visualizar</a>
                                            <a class="dropdown-item" href="{{ route('dependencie.petitions.edit', $pending->token) }}" >Editar</a>
                                            <a class="dropdown-item" href="{{ route('dependencie.petitions.tracing', $pending->token) }}" >Reporte</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="tab-pane fade" id="navpills-4">
                @foreach($finisheds as $finished)
                    <div class="card">
                        <div class="project-info">
                            <div class="col-xl-3 col-xxl-3 my-2 col-lg-4 col-sm-6">
                                <p class="text-primary mb-1 font-w500">{{ $finished->type->title }}</p>
                                <h4 class="title font-w600 mb-1">
                                    <a href="{{ route('dependencie.petitions.view', $finished->token) }}" class="text-black">
                                        {{ $finished->token }}
                                    </a>
                                </h4>
                                <div class="text-dark">
                                    <i class="fa fa-calendar-o mr-1" aria-hidden="true"></i>
                                    {{ humanize_view($finished->created_at) }}
                                </div>
                            </div>
                            <div class="col-xl-3 my-2 col-xxl-3 col-lg-4 col-sm-6">
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar-sm customer">
                                        {{ strtoupper(substr($finished->firstname, 0, 1)) }} {{ strtoupper(substr($finished->firstname, 0, 1)) }}
                                    </div>
                                    <div class="ml-3">
                                        <span>Cliente</span>
                                        <h5 class="mb-0 fs-18 font-w50 text-black">{{ $finished->firstname }} {{ $finished->lastname }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 my-2 col-xxl-3 col-lg-4 col-sm-6">
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar-sm dependencies">
                                        {{ strtoupper(substr($finished->dependencie->title, 0, 2)) }}
                                    </div>
                                    <div class="ml-3">
                                        <span>Dependencia</span>
                                        <h5 class="mb-0 fs-18 font-w500 text-black">{{ $finished->dependencie->title }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 my-2 col-xxl-3 col-lg-6 col-sm-6">
                                <div class="d-flex project-status align-items-center text-center">
                                    @if($finished->status->slug == 'pendiente')
                                        <a href="javascript:void(0);" class="btn btn-info light status-btn">
                                            Pendiente
                                        </a>
                                    @elseif($finished->status->slug == 'proceso')
                                        <a href="javascript:void(0);" class="btn btn-warning light status-btn">
                                            En Proceso
                                        </a>
                                    @elseif($finished->status->slug == 'terminado')
                                        <a href="javascript:void(0);" class="btn btn-danger light status-btn">
                                            Terminado
                                        </a>
                                    @elseif($finished->status->slug == 'solucionado')
                                        <a href="javascript:void(0);" class="btn btn-light light status-btn">
                                            Solucionado
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xl-1 my-2 col-xxl-3 col-lg-6 col-sm-6">
                                <div class="d-flex project-status align-items-center">
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                            <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('dependencie.petitions.view', $finished->token) }}" >Visualizar</a>
                                            <a class="dropdown-item" href="{{ route('dependencie.petitions.edit', $finished->token) }}" >Editar</a>
                                            <a class="dropdown-item" href="{{ route('dependencie.petitions.tracing', $finished->token) }}" >Reporte</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="tab-pane fade" id="navpills-5">
                @foreach($solutions as $solution)
                <div class="card">
                    <div class="project-info">
                        <div class="col-xl-3 col-xxl-3 my-2 col-lg-4 col-sm-6">
                            <p class="text-primary mb-1 font-w500">{{ $solution->type->title }}</p>
                            <h4 class="title font-w600 mb-1">
                                <a href="{{ route('dependencie.petitions.view', $solution->token) }}" class="text-black">
                                    {{ $solution->token }}
                                </a>
                            </h4>
                            <div class="text-dark">
                                <i class="fa fa-calendar-o mr-1" aria-hidden="true"></i>
                                {{ humanize_view($solution->created_at) }}
                            </div>
                        </div>
                        <div class="col-xl-3 my-2 col-xxl-3 col-lg-4 col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="user-avatar-sm customer">
                                    {{ strtoupper(substr($solution->firstname, 0, 1)) }} {{ strtoupper(substr($solution->firstname, 0, 1)) }}
                                </div>
                                <div class="ml-3">
                                    <span>Cliente</span>
                                    <h5 class="mb-0 fs-18 font-w50 text-black">{{ $solution->firstname }} {{ $solution->lastname }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 my-2 col-xxl-3 col-lg-4 col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="user-avatar-sm dependencies">
                                    {{ strtoupper(substr($solution->dependencie->title, 0, 2)) }}
                                </div>
                                <div class="ml-3">
                                    <span>Dependencia</span>
                                    <h5 class="mb-0 fs-18 font-w500 text-black">{{ $solution->dependencie->title }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 my-2 col-xxl-3 col-lg-6 col-sm-6">
                            <div class="d-flex project-status align-items-center text-center">
                                @if($solution->status->slug == 'pendiente')
                                    <a href="javascript:void(0);" class="btn btn-info light status-btn">
                                        Pendiente
                                    </a>
                                @elseif($solution->status->slug == 'proceso')
                                    <a href="javascript:void(0);" class="btn btn-warning light status-btn">
                                        En Proceso
                                    </a>
                                @elseif($solution->status->slug == 'terminado')
                                    <a href="javascript:void(0);" class="btn btn-danger light status-btn">
                                        Terminado
                                    </a>
                                @elseif($solution->status->slug == 'solucionado')
                                    <a href="javascript:void(0);" class="btn btn-light light status-btn">
                                        Solucionado
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-1 my-2 col-xxl-3 col-lg-6 col-sm-6">
                            <div class="d-flex project-status align-items-center">
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('dependencie.petitions.view', $solution->token) }}" >Visualizar</a>
                                        <a class="dropdown-item" href="{{ route('dependencie.petitions.edit', $solution->token) }}" >Editar</a>
                                        <a class="dropdown-item" href="{{ route('dependencie.petitions.tracing', $solution->token) }}" >Reporte</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach

            </div>
        </div>
    </div>
</div>



@endsection
