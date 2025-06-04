

<!-- Coach Section Start -->
<section class="coach-section rel z-1 pt-120 rpt-90 pb-100 rpb-70 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-8">
                <div class="section-title text-center mb-40">
                    <h2>Explora Nuestros cursos y desarrolla tus habilidades con nosotros!</h2>
                </div>
            </div>
        </div>
        {{--  <ul class="coach-filter mb-35">
            <li data-filter="*" class="current">Todas</li>
            @foreach ($categories as $category)
                <li data-filter=".{{ $category->slug }}">{{ $category->title }}</li>
            @endforeach
        </ul>  --}}
        <div class="row justify-content-center">
            @foreach ($courses as $course)
                <div class="col-lg-4 col-md-6  ">
                    <div class="coach-item wow fadeInUp delay-0-2s">
                        <div class="coach-image">
                            <a href="{{ route('courses.view', [$course->slack]) }}" class="category">{{ $course->categorie->title }}</a>
                                @if(count($course->getMedia('thumbnail'))>0)
                                    <img src="{{ $course->getfirstMedia('thumbnail')->getfullUrl() }}" class="card-img-top rounded-0 object-fit-cover" alt="..." height="440">
                                @else
                                    <img src="{{ asset('/pages/images/courses/default.jpg') }}" class="card-img-top rounded-0 object-fit-cover" alt="..." height="440">
                                @endif
                            </a>
                        </div>
                        <div class="coach-content">
                            <h4><a href="{{ route('courses.view', [$course->slack]) }}">{{ $course->title }}</a></h4>
                            <div class="ratting-price">
                                <div class="ratting">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                @if ($course->payment == 1)
                                    @if ($course->promotion == 1)
                                        <div class="rbt-price">
                                            <span class="price">${ number_format($course->promotion) }}</span>
                                            <span class="off-price">{{ number_format($course->price) }}</span>
                                        </div>
                                    @else
                                        <div class="rbt-price">
                                            <span class="price">{{ number_format($course->price) }}</span>
                                        </div>
                                    @endif
                                @elseif($course->payment == 0)
                                    <span class="price">GRATIS</span>
                                @endif

                            </div>
                            <ul class="coach-footer">
                                <li><i class="fa-duotone fa-list"></i><span>{{ count($course->lessons) }} Clases</span></li>
                                <li><i class="fa-duotone fa-folder"></i><span>{{ count($course->chapters) }} Temas</span></li>
                            </ul>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Coach Section End -->
