@extends('layouts.pages')

@section('title', 'Inicio')

@section('content')

<!-- About Area Start -->
<section class="about__area-4  wow wcfadeUp" data-wow-delay="0.3s">
  <div class="container line">
    
<div class="row g-0">
  <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
      <div class="wow wcfadeUp mt-2 terms-content" data-wow-delay="0.45s" >{!! $settings->terms !!}</div>
  </div>
</div>

</div>
</div>
@endsection

@push('scripts')
@endpush


