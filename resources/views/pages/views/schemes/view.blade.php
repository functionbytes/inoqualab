@extends('layouts/pages')


@section('content')

<section class="page-header">
    <div class="page-header-bg" style="background-image: url(/pages/images/backgrounds/page-header-bg.png)">
    </div>
   
    <div class="container">
        <div class="page-header__inner">
            <h2>{{ $system->label }}</h2>
        </div>
    </div>
</section>



<div class="site-main">

  
    <div class="ttm-row pb-60 res-991-pb-20 clearfix">
        <div class="container">
            

            <div class="row multi-columns-row ttm-boxes-row-wrapper">

                @foreach ($schemes as $scheme)
                    
                <div class="ttm-box-col-wrapper col-lg-12 col-md-12 col-sm-12">
                    <!-- featured-imagebox-post -->
                    <div class="featured-imagebox featured-imagebox-post ttm-box-view-top-image">
                        <div class="ttm-post-featured-outer">
                            <div class="ttm-post-format-icon">
                                <i class="ti ti-pencil"></i>
                            </div>
                            <div class="ttm-post-thumbnail featured-thumbnail">
                                <img class="img-fluid" src="images/blog/01.jpg" alt="">
                            </div>
                            <div class="ttm-box-post-date">
                                <span class="ttm-entry-date">
                                    <time class="entry-date" datetime="2019-01-16T07:07:55+00:00"><span class="entry-month"><span class="entry-year">{{ $scheme->sublabel }}</span></span></time>
                                </span>
                            </div>
                        </div>
                        <div class="featured-content featured-content-post box-shadow">
                         @if($scheme->label!="")
                                <div class="post-title featured-title">
                                    <h5><a>{{ $scheme->label }}</a></h5>
                                </div>
                            @endif
                            <div class="post-desc featured-desc">
                                @if($scheme->description!=null)
                                    {!! $scheme->description !!}
                                @endif
                                @if($scheme->url!=null)
                                    <a class="ttm-btn ttm-btn-size-sm ttm-icon-btn-right ttm-btn-color-skincolor btn-inline" target="_blank"  href="{{ $scheme->url }}">MÁS INFORMACIÓN<i class="fa fa-arrow-right"></i></a>

                                @endif
                            </div>
                        </div>
                    </div>                </div>
                @endforeach

            </div>
        </div>
    </div>


</div><!--site-main end-->


@endsection


