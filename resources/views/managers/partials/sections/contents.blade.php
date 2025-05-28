
        <div class="tab-content project-list-group" id="myTabContent">
            <div class="tab-pane fade active show" id="navpills-1">
                @foreach($alls as $all)
                        <div class="card">
                            <div class="project-info">
                                <div class="col-xl-4  my-2 col-lg-4 col-md-4 col-sm-6 col-6">
                                    <p class="text-primary mb-1 font-w500">{{ $all->type->label }}</p>
                                    <h4 class="title font-w600 mb-1">
                                        <a href="{{ route('manager.petitions.view', $all->slack) }}" class="text-black">
                                            {{ $all->number }}
                                        </a>
                                    </h4>
                                    <div class="text-dark">
                                        <i class="fa fa-calendar-o mr-1" aria-hidden="true"></i>
                                        {{ humanize_view($all->created_at) }}
                                    </div>
                                </div>
                                <div class="col-xl-3  my-2 col-lg-3 col-md-3 col-sm-6 col-6">
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
                                <div class="col-xl-3  my-2 col-lg-3 col-md-3 col-sm-6 col-6">
                                    <div class="d-flex align-items-center">
                                        <div class="user-avatar-sm dependencies">
                                            {{ strtoupper(substr($all->dependencie->label, 0, 2)) }}
                                        </div>
                                        <div class="ml-3">
                                            <span>Dependencia</span>
                                            <h5 class="mb-0 fs-18 font-w500 text-black">{{ $all->dependencie->label }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2  my-2 col-lg-2 col-md-2 col-sm-6 col-6">
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

                                                <a class="dropdown-item" href="{{ route('manager.petitions.view', $all->slack) }}" >Visualizar</a>
                                                <a class="dropdown-item" href="{{ route('manager.petitions.edit', $all->slack) }}" >Editar</a>
                                                <a class="dropdown-item" href="{{ route('manager.petitions.tracing', $all->slack) }}" >Reporte</a>
                                                <a class="dropdown-item h-modal-delete" data-modal="delete-modal" data-href="/manager/petitions/destroy/" data-slack="{{ $all->slack }}" >
                                                    Eliminar
                                                </a>
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
                                    <div class="col-xl-4  my-2 col-lg-4 col-md-4 col-sm-6 col-6">
                                        <p class="text-primary mb-1 font-w500">{{ $pending->type->label }}</p>
                                        <h4 class="title font-w600 mb-1">
                                            <a href="{{ route('manager.petitions.view', $pending->slack) }}" class="text-black">
                                                {{ $pending->number }}
                                            </a>
                                        </h4>
                                        <div class="text-dark">
                                            <i class="fa fa-calendar-o mr-1" aria-hidden="true"></i>
                                            {{ humanize_view($pending->created_at) }}
                                        </div>
                                    </div>
                                    <div class="col-xl-3  my-2 col-lg-3 col-md-3 col-sm-6 col-6">
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
                                    <div class="col-xl-3  my-2 col-lg-3 col-md-3 col-sm-6 col-6">
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar-sm dependencies">
                                                {{ strtoupper(substr($pending->dependencie->label, 0, 2)) }}
                                            </div>
                                            <div class="ml-3">
                                                <span>Dependencia</span>
                                                <h5 class="mb-0 fs-18 font-w500 text-black">{{ $pending->dependencie->label }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2  my-2 col-lg-2 col-md-2 col-sm-6 col-6">
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
                                                    <a class="dropdown-item" href="{{ route('manager.petitions.view', $pending->slack) }}" >Visualizar</a>
                                                    <a class="dropdown-item" href="{{ route('manager.petitions.edit', $pending->slack) }}" >Editar</a>
                                                    <a class="dropdown-item" href="{{ route('manager.petitions.tracing', $pending->slack) }}" >Reporte</a>
                                                    <a class="dropdown-item h-modal-delete" data-modal="delete-modal" data-href="/manager/petitions/destroy/" data-slack="{{ $pending->slack }}" >
                                                        Eliminar
                                                    </a>
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
                            <div class="col-xl-4  my-2 col-lg-4 col-md-4 col-sm-6 col-6">
                                <p class="text-primary mb-1 font-w500">{{ $proces->type->label }}</p>
                                <h4 class="title font-w600 mb-1">
                                    <a href="{{ route('manager.petitions.view', $proces->slack) }}" class="text-black">
                                        {{ $proces->number }}
                                    </a>
                                </h4>
                                <div class="text-dark">
                                    <i class="fa fa-calendar-o mr-1" aria-hidden="true"></i>
                                    {{ humanize_view($proces->created_at) }}
                                </div>
                            </div>
                            <div class="col-xl-3  my-2 col-lg-3 col-md-3 col-sm-6 col-6">
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
                            <div class="col-xl-3  my-2 col-lg-3 col-md-3 col-sm-6 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar-sm dependencies">
                                        {{ strtoupper(substr($proces->dependencie->label, 0, 2)) }}
                                    </div>
                                    <div class="ml-3">
                                        <span>Dependencia</span>
                                        <h5 class="mb-0 fs-18 font-w500 text-black">{{ $proces->dependencie->label }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2  my-2 col-lg-2 col-md-2 col-sm-6 col-6">
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
                                            <a class="dropdown-item" href="{{ route('manager.petitions.view', $proces->slack) }}" >Visualizar</a>
                                            <a class="dropdown-item" href="{{ route('manager.petitions.edit', $proces->slack) }}" >Editar</a>
                                            <a class="dropdown-item" href="{{ route('manager.petitions.tracing', $proces->slack) }}" >Reporte</a>
                                            <a class="dropdown-item h-modal-delete" data-modal="delete-modal" data-href="/manager/petitions/destroy/" data-slack="{{ $proces->slack }}" >
                                                Eliminar
                                            </a>
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
                            <div class="col-xl-4  my-2 col-lg-4 col-md-4 col-sm-6 col-6">
                                <p class="text-primary mb-1 font-w500">{{ $finished->type->label }}</p>
                                <h4 class="title font-w600 mb-1">
                                    <a href="{{ route('manager.petitions.view', $finished->slack) }}" class="text-black">
                                        {{ $finished->number }}
                                    </a>
                                </h4>
                                <div class="text-dark">
                                    <i class="fa fa-calendar-o mr-1" aria-hidden="true"></i>
                                    {{ humanize_view($finished->created_at) }}
                                </div>
                            </div>
                            <div class="col-xl-3  my-2 col-lg-3 col-md-3 col-sm-6 col-6">
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
                            <div class="col-xl-3  my-2 col-lg-3 col-md-3 col-sm-6 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar-sm dependencies">
                                        {{ strtoupper(substr($finished->dependencie->label, 0, 2)) }}
                                    </div>
                                    <div class="ml-3">
                                        <span>Dependencia</span>
                                        <h5 class="mb-0 fs-18 font-w500 text-black">{{ $finished->dependencie->label }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2  my-2 col-lg-2 col-md-2 col-sm-6 col-6">
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
                                            <a class="dropdown-item" href="{{ route('manager.petitions.view', $finished->slack) }}" >Visualizar</a>
                                            <a class="dropdown-item" href="{{ route('manager.petitions.edit', $finished->slack) }}" >Editar</a>
                                            <a class="dropdown-item" href="{{ route('manager.petitions.tracing', $finished->slack) }}" >Reporte</a>
                                            <a class="dropdown-item h-modal-delete" data-modal="delete-modal" data-href="/manager/petitions/destroy/" data-slack="{{ $finished->slack }}" >
                                                Eliminar
                                            </a>
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
                                <div class="col-xl-4  my-2 col-lg-4 col-md-4 col-sm-6 col-6">
                                    <p class="text-primary mb-1 font-w500">{{ $solution->type->label }}</p>
                                    <h4 class="title font-w600 mb-1">
                                        <a href="{{ route('manager.petitions.view', $solution->slack) }}" class="text-black">
                                            {{ $solution->number }}
                                        </a>
                                    </h4>
                                    <div class="text-dark">
                                        <i class="fa fa-calendar-o mr-1" aria-hidden="true"></i>
                                        {{ humanize_view($solution->created_at) }}
                                    </div>
                                </div>
                                <div class="col-xl-3  my-2 col-lg-3 col-md-3 col-sm-6 col-6">
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
                                <div class="col-xl-3  my-2 col-lg-3 col-md-3 col-sm-6 col-6">
                                    <div class="d-flex align-items-center">
                                        <div class="user-avatar-sm dependencies">
                                            {{ strtoupper(substr($solution->dependencie->label, 0, 2)) }}
                                        </div>
                                        <div class="ml-3">
                                            <span>Dependencia</span>
                                            <h5 class="mb-0 fs-18 font-w500 text-black">{{ $solution->dependencie->label }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2  my-2 col-lg-2 col-md-2 col-sm-6 col-6">
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
                                                <a class="dropdown-item" href="{{ route('manager.petitions.view', $solution->slack) }}" >Visualizar</a>
                                                <a class="dropdown-item" href="{{ route('manager.petitions.edit', $solution->slack) }}" >Editar</a>
                                                <a class="dropdown-item" href="{{ route('manager.petitions.tracing', $solution->slack) }}" >Reporte</a>
                                                <a class="dropdown-item h-modal-delete" data-modal="delete-modal" data-href="/manager/petitions/destroy/" data-slack="{{ $solution->slack }}" >
                                                    Eliminar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach

            </div>
        </div>
