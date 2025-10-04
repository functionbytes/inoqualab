@extends('layouts.pages')

@section('title', 'Inicio')

@section('content')
<section class="pt-8 pb-13 bg-gray-01" data-animated-id="2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
               
                <div class="row">
                  @foreach ($canals as $canal)
                      
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-6">
                        <div class="card border-0 shadow-hover-3 px-6">
                            <div class="card-body text-center pt-6 pb-2 px-0">
                                <a href="agent-details-1.html" class="d-inline-block mb-2">
                                    @if($canal->thumbnail()!=null)
                                    <img src="{{ asset('/pages/imgs/canals/'.$canal->thumbnail()->filename) }}"
                                        class="img-fluid" alt="image">
                                    @else
                                        <img src="/pages/imgs/canals/default.jpg" alt="Oliver Beddows">
                                    @endif
                                </a>
                                
                            <div class="card-footer bg-white px-0 pt-1 pb-6 canals">
                                @if($canal->agent!=null)
                                    <a  class="d-block fs-16 lh-214 text-dark mb-0 font-weight-500 hover-primary">{{ $canal->agent }}</a>
                                @endif
                                <p class="mb-0 tag-canal">{{ $canal->label }}</p>
                                <ul class="list-group list-group-no-border pb-1 text-center">
                                    @if($canal->phone!=null)
                                        <li class="list-group-item d-flex align-items-sm-center lh-114 row m-0 px-0 pt-3 pb-0">
                                            <span class="col-sm-12 p-0 fs-13 mb-1 mb-sm-0">Fijo:  <span class=" p-0 text-heading font-weight-500 text-left"><a href="tel:+{{ $canal->phone }}">+{{ $canal->phone }}</a> {{ $canal->ext }}</span></span>
                                            
                                        </li>
                                    @endif
                                    @if($canal->cellphone!=null)
                                    <li class="list-group-item d-flex align-items-sm-center lh-114 row m-0 px-0 pt-3 pb-0">
                                        <span class="col-sm-12 p-0 fs-13 mb-1 mb-sm-0">Celular: <span class="p-0 text-heading font-weight-500 text-left"><a href="tel:+{{ $canal->cellphone }}">+{{ $canal->cellphone }}</a></span></span>
                                        
                                    </li>
                                    @endif
                                    @if($canal->email!=null)
                                    <li class="list-group-item d-flex align-items-sm-center row m-0 px-0 pt-2 pb-0">
                                        <span class="col-sm-12 p-0 fs-13 lh-114">Correo:  <span class=" p-0 text-heading font-weight-500 text-left"><a href="mailto:{{ $canal->email }}">{{ $canal->email }}</a></span></span>
                                        
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
@endpush
