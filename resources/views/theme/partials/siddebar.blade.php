 @php
     use App\Models\Category;
     // $handlecategories=Category::take(3)->get();
     $categories = Category::get();
 @endphp
 <!-- Start Blog Post Siddebar -->
 <div class="col-lg-4 sidebar-widgets">
     @if (session('success'))
         <div class="alert alert-success">{{ session('success') }}</div>
     @endif
     <form action="{{ route('subscriber.store') }}" method="post">
         <div class="widget-wrap">
             @csrf
             <div class="single-sidebar-widget newsletter-widget">
                 <h4 class="single-sidebar-widget__title">Newsletter</h4>
                 <div class="form-group mt-30">
                     <div class="col-autos">
                         <input type="text" class="form-control" id="inlineFormInputGroup" name="email"
                             placeholder="Enter email" onfocus="this.placeholder = ''"
                             onblur="this.placeholder = 'Enter email'" value="{{ old('email') }}">
                         @error('email')
                             <div class="alert alert-danger mt-2">{{ $message }}</div>
                         @enderror
                         <button type="submit" class="btn btn-primary d-block mt-20 w-100">Subcribe</button>
                     </div>
                 </div>
             </div>
     </form>

     <div class="single-sidebar-widget post-category-widget">
         <h4 class="single-sidebar-widget__title">Category</h4>
         @if (count($categories) > 0)
             <ul class="cat-list mt-20">
                 @foreach ($categories as $category)
                     <li>
                         <a href="{{ route('theme.category', ['category' => $category->id]) }}"
                             class="d-flex justify-content-between">
                             <p>{{ $category->name }}</p>
                             <p>({{ $category->blogs()->count() }})</p>
                         </a>
                     </li>
                 @endforeach
         @endif

         </ul>
     </div>


 </div>
 </div>
 <!-- End Blog Post Siddebar -->
