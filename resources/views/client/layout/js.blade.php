<!-- Jquery Library File -->
      <script src="{{asset('asset/js/jquery-3.7.1.min.js')}}"></script>
      <!-- Bootstrap js file -->
      <script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
      <!-- Validator js file -->
      <script src="{{asset('asset/js/validator.min.js')}}"></script>
      <!-- SlickNav js file -->
      <script src="{{asset('asset/js/jquery.slicknav.js')}}"></script>
      <!-- Swiper js file -->
      <script src="{{asset('asset/js/swiper-bundle.min.js')}}"></script>
      <!-- Counter js file -->
      <script src="{{asset('asset/js/jquery.waypoints.min.js')}}"></script>
      <script src="{{asset('asset/js/jquery.counterup.min.js')}}"></script>
      <!-- Magnific js file -->
      <script src="{{asset('asset/js/jquery.magnific-popup.min.js')}}"></script>
      <!-- SmoothScroll -->
      <script src="{{asset('asset/js/SmoothScroll.js')}}"></script>
      <!-- Parallax js -->
      <script src="{{asset('asset/js/parallaxie.js')}}"></script>
      <!-- MagicCursor js file -->
      <script src="{{asset('asset/js/gsap.min.js')}}"></script>
      <!-- Text Effect js file -->
      <script src="{{asset('asset/js/SplitText.js')}}"></script>
      <script src="{{asset('asset/js/ScrollTrigger.min.js')}}"></script>
      <!-- YTPlayer js File -->
      <script src="{{asset('asset/js/jquery.mb.YTPlayer.min.js')}}"></script>
      <!-- Audio js File -->
      <script src="{{asset('asset/js/plyr.js')}}"></script>
      <!-- Wow js file -->
      <script src="{{asset('asset/js/wow.js')}}"></script>
      <!-- Main Custom js file -->
      <script src="{{asset('asset/js/function.js')}}"></script>
      <!-- jQuery + Toastr JS -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

      <script>
            @if(session('success'))
                  toastr.success("{{ session('success') }}");
            @endif

            @if(session('error'))
                  toastr.error("{{ session('error') }}");
            @endif
      </script>