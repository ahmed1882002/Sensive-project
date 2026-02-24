<!DOCTYPE html>
<html lang="en">
    @include('theme.partials.head')
<body>
  <!--================Header Menu Area =================-->
 @include('theme.partials.header')
  <!--================Header Menu Area =================-->

    <!--================ Blog slider start =================-->  
   @yield('BlogSlider')
    <!--================ Blog slider end =================-->  

    <!--================ Start Blog Post Area =================-->
    @yield('content')
    <!--================ End Blog Post Area =================-->

  <!--================ Start Footer Area =================-->
  @include('theme.partials.footer')
  
  <!--================ End Footer Area =================-->
@include('theme.partials.scripts')
  
</body>
</html> 