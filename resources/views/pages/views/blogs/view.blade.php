@extends('layouts.pages')

@section('title', 'Inicio')

@section('content')
    <section class="blog-details-area py-130 rpy-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-wrap">
                        <div class="image mb-25 wow fadeInUp delay-0-2s animated" style="visibility: visible; animation-name: fadeInUp;">
                           @if(count($blog->getMedia('thumbnail'))>0)
                            <img src="{{ $blog->getfirstMedia('thumbnail')->getfullUrl() }}" class="card-img-top rounded-0 object-fit-cover">
                            @else
                            <img src="{{ asset('/pages/images/blog/default.jpg') }}" class="card-img-top rounded-0 object-fit-cover" alt="...">
                            @endif
                            <a href="#"><i class="fas fa-share-alt"></i></a>
                        </div>
                        <div class="blog-content-wrap">
                        <ul class="blog-standard-header wow fadeInUp delay-0-2s animated" style="visibility: visible; animation-name: fadeInUp;">
                            <li><span class="name">Michael M. Morris</span></li>
                            <li><i class="far fa-calendar-alt"></i> <a href="blog-details.html">February 20, 2022</a></li>
                            <li><i class="far fa-comments"></i> <a href="blog-details.html">Comments (05)</a></li>
                        </ul>
                        <h3 class="title">{{ $blog->title }}.</h3>
                        <div class="blog-content">
                            {!! $blog->content !!}
                        </div>
                        
                        <div class="tag-share pt-10">
                            <div class="tag-coulds pb-25">
                                <h6>Tags</h6>
                                @foreach($blog->tags as $tag)
                                    <a href="{{ route('blogs.tags', array($tag->slug)) }}">{{ $tag->title }}</a>,
                                @endforeach
                            </div>
                            <div class="social-style-two">
                                <h6>Compartir :</h6>
                                <a href="contact.html"><i class="fab fa-facebook-f"></i></a>
                                <a href="contact.html"><i class="fab fa-twitter"></i></a>
                                <a href="contact.html"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    </div>

                        <div class="admin-comment text-white bg-light-blue p-40 br-10 mt-50 wow fadeInUp delay-0-2s animated"
                            style="visibility: visible; animation-name: fadeInUp;">
                            <div class="comment-body mb-0">
                                <div class="author-thumb">
                                    <img src="/pages/images/blog/admin-author.jpg" alt="Image">
                                </div>
                                <div class="content">
                                    <h4>Rasalina Wilimson</h4>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti
                                        atqu corruptie quos dolores et quas molestias excepturi sint</p>
                                    <div class="social-style-two">
                                        <a href="contact.html"><i class="fab fa-facebook-f"></i></a>
                                        <a href="contact.html"><i class="fab fa-twitter"></i></a>
                                        <a href="contact.html"><i class="fab fa-instagram"></i></a>
                                        <a href="contact.html"><i class="fab fa-behance"></i></a>
                                        <a href="contact.html"><i class="fab fa-dribbble"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="col-lg-4">
                    <div class="blog-sidebar rmt-75">

                        @include('pages.partials.sections.blogs.search')
                        @include('pages.partials.sections.blogs.categories')
                        @include('pages.partials.sections.blogs.recents')
                        @include('pages.partials.sections.blogs.tags')
                    </div>
                </div>
            </div>
        </div>
    </section>

<div class="rbt-overlay-page-wrapper">
   <div class="breadcrumb-image-container breadcrumb-style-max-width">
       
       <div class="breadcrumb-content-top text-center">
          
           <h1 class="title">{{ $blog->title }}.</h1>
           <ul class="meta-list justify-content-center mb--0">
            <li class="list-item">
                <div class="author-thumbnail">
                    <img src="/pages/images/testimonial/client-06.png" alt="blog-image">
                </div>
                <div class="author-info">
                    <a href="#"><strong>Admin</strong></a> en <a href="#"><strong>{{ $blog->categorie->title }}</strong></a>
                </div>
            </li>
            <li class="list-item">
                <i class="feather-clock"></i>
                <span>{{ date('F ,Y', strtotime($blog->updated_at)) }}</span>
            </li>
        </ul>
       </div>
   </div>

   <div class="rbt-blog-details-area rbt-section-gapBottom breadcrumb-style-max-width">
       <div class="blog-content-wrapper rbt-article-content-wrapper">
           <div class="content">
               

               <div class="post-thumbnail mb--0 position-relative wp-block-image alignwide">
                   <figure>
                        @if($blog->image!=null)
                              <img src="{{ asset('/pages/images/blog/'.$blog->image) }}" alt="image">
                        @else
                           <img src="{{ asset('/pages/images/blog/default.jpg') }}" alt="image">
                        @endif
                   </figure>
               </div>
               

               <div class="post-content">
                 {!! $blog->content !!}
                </div>
                

               <!-- BLog Tag Clound  -->
               <div class="tagcloud">
                  @foreach($blog->tags as $tag)
                     <a href="{{ route('blogs.tags', array($tag->slug)) }}">{{ $tag->title }}</a>,
                  @endforeach
               </div>

               <!-- Social Share Block  -->
               <div class="social-share-block">
                   <div class="post-like">
                       <a href="#"><i class="feather feather-thumbs-up"></i><span>2.2k Like</span></a>
                   </div>
                   <ul class="social-icon social-default transparent-with-border">
                       <li><a href="https://www.facebook.com/">
                               <i class="feather-facebook"></i>
                           </a>
                       </li>
                       <li><a href="https://www.twitter.com">
                               <i class="feather-twitter"></i>
                           </a>
                       </li>
                       <li><a href="https://www.instagram.com/">
                               <i class="feather-instagram"></i>
                           </a>
                       </li>
                       <li><a href="https://www.linkdin.com/">
                               <i class="feather-linkedin"></i>
                           </a>
                       </li>
                   </ul>
               </div>

               @if(count($comments)>0)
                <div class="rbt-comment-area">
                    <div class="rbt-total-comment-post">
                        <div class="title">
                            <h4 class="mb--0">30+ Comments</h4>
                        </div>
                        <div class="add-comment-button">
                            <a class="rbt-btn btn-gradient icon-hover radius-round btn-md" href="#">
                                <span class="btn-text">Add Your Comment</span>
                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>

                    <div class="comment-respond">
                        <h4 class="title">Post a Comment</h4>
                        <form action="#">
                            <p class="comment-notes"><span id="email-notes">Your email address will not be
                                    published.</span> Required fields are marked <span class="required">*</span></p>
                            <div class="row row--10">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="name">Your Name</label>
                                        <input id="name" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="bl-email">Your Email</label>
                                        <input id="bl-email" type="email">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="website">Your Website</label>
                                        <input id="website" type="text">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="message">Leave a Reply</label>
                                        <textarea id="message" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <p class="comment-form-cookies-consent">
                                        <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes">
                                        <label for="wp-comment-cookies-consent">Save my name, email, and
                                            website in this browser for the next time I comment.</label>
                                    </p>
                                </div>
                                <div class="col-lg-12">
                                    <a class="rbt-btn btn-gradient icon-hover radius-round btn-md" href="#">
                                        <span class="btn-text">Post Comment</span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="rbt-comment-area">
                    <h4 class="title">2 comments</h4>
                    <ul class="comment-list">
                        <!-- Start Single Comment  -->
                        <li class="comment">
                            <div class="comment-body">
                                <div class="single-comment">
                                    <div class="comment-img">
                                        <img src="/pages/images/testimonial/testimonial-1.jpg" alt="Author Images">
                                    </div>
                                    <div class="comment-inner">
                                        <h6 class="commenter">
                                            <a href="#">Cameron Williamson</a>
                                        </h6>
                                        <div class="comment-meta">
                                            <div class="time-spent">Nov 23, 2018 at 12:23 pm</div>
                                            <div class="reply-edit">
                                                <div class="reply">
                                                    <a class="comment-reply-link" href="#">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-text">
                                            <p class="b2">Duis hendrerit velit scelerisque felis tempus, id porta
                                                libero venenatis. Nulla facilisi. Phasellus viverra
                                                magna commodo dui lacinia tempus. Donec malesuada nunc
                                                non dui posuere, fringilla vestibulum urna mollis.
                                                Integer condimentum ac sapien quis maximus. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="children">
                                <!-- Start Single Comment  -->
                                <li class="comment">
                                    <div class="comment-body">
                                        <div class="single-comment">
                                            <div class="comment-img">
                                                <img src="/pages/images/testimonial/testimonial-2.jpg" alt="Author Images">
                                            </div>
                                            <div class="comment-inner">
                                                <h6 class="commenter">
                                                    <a href="#">John Due</a>
                                                </h6>
                                                <div class="comment-meta">
                                                    <div class="time-spent">Nov 23, 2018 at 12:23 pm
                                                    </div>
                                                    <div class="reply-edit">
                                                        <div class="reply">
                                                            <a class="comment-reply-link" href="#">Reply</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="comment-text">
                                                    <p class="b2">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse lobortis cursus lacinia. Vestibulum vitae leo id diam pellentesque ornare.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- End Single Comment  -->
                            </ul>
                        </li>
                        <!-- End Single Comment  -->

                        <!-- Start Single Comment  -->
                        <li class="comment">
                            <div class="comment-body">
                                <div class="single-comment">
                                    <div class="comment-img">
                                        <img src="/pages/images/testimonial/testimonial-3.jpg" alt="Author Images">
                                    </div>
                                    <div class="comment-inner">
                                        <h6 class="commenter">
                                            <a href="#">Rafin Shuvo</a>
                                        </h6>
                                        <div class="comment-meta">
                                            <div class="time-spent">Nov 23, 2018 at 12:23 pm</div>
                                            <div class="reply-edit">
                                                <div class="reply">
                                                    <a class="comment-reply-link" href="#">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-text">
                                            <p class="b2">Duis hendrerit velit scelerisque felis tempus, id porta
                                                libero venenatis. Nulla facilisi. Phasellus viverra
                                                magna commodo dui lacinia tempus. Donec malesuada nunc
                                                non dui posuere, fringilla vestibulum urna mollis.
                                                Integer condimentum ac sapien quis maximus. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- End Single Comment  -->
                    </ul>
                </div>
               @endif
           </div>


           @include('pages.partials.sections.blogs.relateds')
           
       </div>
   </div>
</div>



@endsection
