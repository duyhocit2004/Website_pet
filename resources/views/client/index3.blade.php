
<!DOCTYPE html>
<html lang="zxx">
   
<!-- Mirrored from pawly-html.wpthemeverse.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 May 2025 03:36:33 GMT -->
<head>
      <!-- Meta -->
      @include('client.layout.head')
      @yield('style')
   </head>
   <body>
      <!-- Header New Start -->
      @include('client.layout.header')
      <!-- Header New End --> 
      <!-- Owner Paradise Section Start -->
      @yield('banner')
   
      <!-- Banner Section End -->
      <!-- Page-Section Start -->
    @yield('main2')
      <!-- Footer Start -->
      @include('client.layout.footer')
      <!-- Footer End -->
      @include('client.layout.js')
   </body>

<!-- Mirrored from pawly-html.wpthemeverse.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 May 2025 03:36:57 GMT -->
</html>