<script src="{{asset('login/main/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('login/main/assets/js/popper.min.js')}}"></script>
<script src="{{asset('login/main/assets/js/bootstrap.bundle.min.js')}}"></script>
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