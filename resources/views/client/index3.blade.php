
<!DOCTYPE html>
<html lang="en">
<head>
       @include('client.layout.head')
       
</head>
<body>
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
</html>
