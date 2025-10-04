 @if (count($recents) > 0)
 <h3 class="mt-5 mb-3">Relacionados</h3>
                                 <div class="row">
                                    @foreach ($recents as $recent)
                                    <div class="col-md-6">
                                       <article class="pbmit-blog-style-1">
                                          <div class="post-item">
                                             <div class="pbmit-featured-container">
                                                <div class="pbmit-featured-wrapper">
                                                   @if ($recent->thumbnail() != null)
                                                   <img class="img-fluid " src="/pages/images/blog/{{ $recent->thumbnail()->filename }}" alt="{{ $recent->slug }}">
                                                   @else
                                                         <img class="img-fluid" src="/pages/images/blog/default.jpg" alt="{{ $recent->slug }}">
                                                   @endif
                                                </div>
                                             </div>
                                             <div class="pbminfotech-box-content">
                                                <div class="pbmit-meta-date-wrapper pbmit-meta-line">					
                                                   <span class="pbmit-meta-date">{{ date('j', strtotime($recent->created_at)) }}</span>
                                                   <span class="pbmit-meta-month">{{ date('M', strtotime($recent->created_at)) }}</span>
                                                </div>
                                                <div class="pbmit-meta-container">
                                                   <div class="pbmit-meta-cat-wrapper pbmit-meta-line">
                                                      <div class="pbmit-meta-category">
                                                         <i class="pbmit-base-icon-folder-open-empty"></i>
                                                         <a href="#" rel="category tag">{{ $blog->categorie->label }}</a>
                                                      </div>
                                                   </div>
                                                </div>
                                                <h3 class="pbmit-post-title">
                                                   <a href="{{ route('blogs.view', $recent->slug) }}">{{ substr(strip_tags($recent->label), 0, 400) }}</a>
                                                </h3>
                                                
                                             </div>
                                          </div>
                                       </article> 
                                    </div>
                                    @endforeach
                                 </div>


    
@endif