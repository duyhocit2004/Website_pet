<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from admin.pixelstrap.net/edmin/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 May 2025 08:20:34 GMT -->

<head>
    @include('admin.layout.head')
</head>

<body>
    @include('admin.layout.header')
    <!-- Page header end-->
    <div class="page-body-wrapper">
        <!-- Page sidebar start-->
        <div class="overlay"></div>
        @include('admin.layout.sidebar')
        <!-- Page sidebar end-->
        <div class="page-body">
            <div class="container-fluid">
                @yield('main')
                {{-- <div class="row page-title">
                    <div class="col-sm-6">
                        <h3>Admin</h3>
                    </div>
                {{-- <div class="row page-title">
                    <div class="col-sm-6">
                        <h3>Admin</h3>
                    </div>
                </div>
            </div>
            <div class="container-fluid default-dashboard">
                <div class="row">
                    Nội dung trang admin
                </div>
            </div> --}}
        </div>

        @include('admin.layout.footer')
    </div>
    </main>
    @include('admin.layout.js')
   
</body>

<!-- Mirrored from admin.pixelstrap.net/edmin/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 May 2025 08:21:14 GMT -->
 
</html>
