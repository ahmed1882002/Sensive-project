 <section>
     <div class="container">
         <div class="owl-carousel owl-theme blog-slider">
             @php
                 $sliderBlogs = \App\Models\Blog::latest()->take(5)->get();
             @endphp
             @foreach ($sliderBlogs as $slideBlog)
                 <div class="card blog__slide text-center">
                     <div class="blog__slide__img">
                         <img class="card-img rounded-0" src="{{ asset('storage/blogs/' . $slideBlog->image) }}"
                             alt="" style="height: 300px; object-fit: cover;">
                     </div>
                     <div class="blog__slide__content">
                         <a class="blog__slide__label"
                             href="{{ route('theme.category', ['category' => $slideBlog->category_id]) }}">{{ $slideBlog->category->name }}</a>
                         <h3><a href="{{ route('blogs.show', ['blog' => $slideBlog->id]) }}">{{ $slideBlog->name }}</a>
                         </h3>
                         <p>{{ $slideBlog->created_at->diffForHumans() }}</p>
                     </div>
                 </div>
             @endforeach
         </div>
     </div>
 </section>
