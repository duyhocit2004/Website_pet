      <!-- jquery-->
      <script src="{{asset('admin/assets/js/vendors/jquery/dist/jquery.min.js')}}"></script>
      <!-- bootstrap js-->
      <script src="{{asset('admin/assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('admin/assets/js/config.js')}}"></script>
      <!-- Sidebar js-->
      <script src="{{asset('admin/assets/js/sidebar.js')}}"></script>
      <!-- Apexchart js-->
      <script src="{{asset('admin/assets/js/vendors/apexcharts/dist/apexcharts.min.js')}}"></script>
      <!-- Chart js-->
      <script src="{{asset('admin/assets/js/vendors/chart.js/dist/chart.umd.js')}}"></script>
      <!-- Datatable js-->
      <script src="{{asset('admin/assets/js/vendors/simple-datatables/dist/umd/simple-datatables.js')}}"></script>
      <!-- default dashboard js-->
      <script src="{{asset('admin/assets/js/dashboard/default.js')}}"></script>
      <!-- scrollbar js-->
      <script src="{{asset('admin/assets/js/scrollbar/simplebar.js')}}"></script>
      <script src="{{asset('admin/assets/js/scrollbar/custom.js')}}"></script>
      <!-- scrollable-->
      <!-- customizer-->
      <script src="{{asset('admin/assets/js/theme-customizer/customizer.js')}}"></script>
      <!-- custom script -->
      <script src="{{asset('admin/assets/js/script.js')}}"></script>
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
      <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
       @yield('js')

