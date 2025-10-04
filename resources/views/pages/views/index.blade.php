@extends('layouts.pages')


@section('content')

  @include ('pages.partials.sections.home.sliders')

  @include ('pages.partials.sections.home.about')

  @include ('pages.partials.sections.home.services')
  

  @include ('pages.partials.sections.home.values')
  
  @include ('pages.partials.sections.home.calltoaction')

  @include ('pages.partials.sections.home.testimonials')
  
  @include ('pages.partials.sections.home.blogs')

  @include ('pages.partials.sections.home.partners')

@endsection
