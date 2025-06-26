<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from admin.pixelstrap.net/edmin/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 May 2025 08:20:34 GMT -->

<head>
    @include('admin.layout.head')
</head>

<body>
    <!-- tap to top-->
    <div class="tap-top">
        <svg class="feather">
            <use href="https://admin.pixelstrap.net/edmin/assets/svg/feather-icons/dist/feather-sprite.svg#arrow-up">
            </use>
        </svg>
    </div>
    <!-- login page start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div class="login-card login-dark">
                    <div>
                            <div>
                                <a class="logo text-center" href=""><img class="img-fluid for-light" src="{{asset('asset/images/pawly_logo.png')}}" alt="looginpage">
                                    <img class="img-fluid for-dark m-auto" src="{{asset('asset/images/pawly_logo.png')}}" alt="logo">
                                </a>
                            </div>
                        <div class="login-main">
                            <form class="theme-form" action="{{route('loginAdmin')}}" method="POST">
                                @csrf
                                <h2 class="text-center" style="margin-bottom: 20px;">Đăng nhập quản trị viên</h2>
                                <div class="form-group">
                                    <label class="col-form-label">email</label>
                                    <input class="form-control" name="email" type="email" required=""
                                        placeholder="Test@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" name="password" type="password"
                                            required="" placeholder="*********">
                                    </div>
                                </div>
                                <div class="form-group mb-0 checkbox-checked">

                                    <div class="text-end mt-3" style="margin-bottom:25px;">
                                        <button class="btn btn-primary btn-block w-100 text-white"> Đăng nhập</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layout.js')
</body>

<!-- Mirrored from admin.pixelstrap.net/edmin/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 May 2025 08:21:14 GMT -->

</html>