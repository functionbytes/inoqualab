@extends('layouts.pages')

@section('title', 'Inicio')

@section('content')
<main>


    <!-- Blog Area Start -->
    <section class="blog__area-2">
        <div class="container line">

            <div class="row g-0">
                <div class="col-xxl-9 col-xl-9 col-lg-8 col-md-8">
                  

                    @include ('pages.partials.sections.blogs.items')
                </div>


                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4">
                    <div class="blog__sidebar">
                        
                       
                       
                        @include ('pages.partials.sections.blogs.search')

                        @include ('pages.partials.sections.blogs.categories')

                        @include ('pages.partials.sections.blogs.recents')

                        @include ('pages.partials.sections.blogs.tags')

                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Area End -->


</main>


@endsection

@push('scripts')
@endpush