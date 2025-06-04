@if(isset($blogs))

<div class="blog__list">
   @foreach ($blogs as $blog)

   <div class="blog__item ">
       <article>
           <a href="blog-details.html">

               @if($blog->thumbnail()!=null)
               <img src="{{ asset('/pages/imgs/blogs/'.$blog->thumbnail()->filename) }}"
                   class="img-fluid" alt="image">
               @else
               <img src="{{ asset('/pages/imgs/blogs/default.jpg') }}" class="img-fluid"
                   alt="image">
               @endif
           </a>
           <p class="blog__meta"> <strong>
                   <a href="{{ route('blogs.view', $blog->slug) }}">{{ $blog->categorie->label }}</a></strong></p>

                   
                   <div class="postbox__text p-50">
                       <div class="post-meta ">
                           <span> {{ humanize_date($blog->created_at) }} </span>
                       </div>
                       <h3 class="blog-title">
                           <a href="{{ route('blogs.view', $blog->slug) }}">{{ $blog->label }}</a>
                       </h3>
                   </div>



       </article>
   </div>
   @endforeach
</div>

{{ $blogs->links() }}


@endif
