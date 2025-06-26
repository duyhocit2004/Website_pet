<!DOCTYPE html>
<html lang="zxx">
   
<!-- Mirrored from storage.googleapis.com/theme-vessel-items/checking-sites/logdy-2-html/HTML/main/login-12.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 May 2025 15:22:11 GMT -->
<head>
     @include('client.login.layout_login.head')

</head>
<body id="top">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TAGCODE"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="page_loader"></div>

<!-- Login 12 start -->
<div class="login-12 tab-box">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-12 bg-img">
                <div class="informeson">
                    <div class="logo">
                        <a href="login-12.html">
                            <img src="{{asset('asset/images/pawly_logo.png')}}" alt="logo">
                        </a>
                    </div>
                    <div class="animated-text">
                        <h2>Chúng tôi có những thú cưng dễ thương</h2>
                    </div>
                    <p>Thú cưng không chỉ đơn giản là những loài vật nuôi trong nhà, mà còn là những người bạn trung thành, mang đến niềm vui và sự gắn bó cho con người. Từ những chú chó hiền lành, mèo đáng yêu, đến các loài chim hót líu lo hay cá cảnh bơi lội tung tăng, mỗi loài đều có một nét đáng yêu và tính cách riêng biệt</p>
                    <div class="btn-section">
                        <a href="{{route('formLogin')}}" class="btn-theme-2">Đăng nhập</a>
                        <a href="{{route('formRegister')}}" class="btn-theme-3">Đăng ký</a>
                    </div>
                </div>
                
            </div>
             <div class="col-lg-6 col-md-12 form-section">
                <div class="login-inner-form">
                    <div class="details">
                        <div class="logo-2">
                            <a href="login-12.html">
                                <img src="{{asset('asset/images/pawly_logo.png')}}" alt="logo">
                            </a>
                        </div>
                        <h1>Chào mừng</h1>
                        <h3>Tạo tài khoản</h3>
                        <form action="{{route('register')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="first_field" class="form-label float-start">Tên của bạn</label>
                                <input name="name" type="text" value="{{old('name')}}" class="form-control" id="first_field" placeholder="Full Name" aria-label="Full Name">
                                @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="second_field" class="form-label float-start">Email</label>
                                <input name="email" type="email"  value="{{old('email')}}" class="form-control" id="second_field" placeholder="Email Address" aria-label="Email Address">
                                   @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group clearfix">
                                <label for="third_field" class="form-label float-start">mật khẩu</label>
                                <input name="password" type="password"  value="{{old('password')}}" class="form-control" autocomplete="off" id="third_field" placeholder="Password" aria-label="Password">
                                   @error('password')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group checkbox clearfix">
                                <div class="clearfix float-start">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rememberme">
                                        <label class="form-check-label" for="rememberme">
                                           Tôi đồng ý với các điều khoản dịch vụ
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <button type="submit" class="btn btn-lg btn-primary btn-theme"><span>Register</span></button>
                            </div>
                        </form>
                        <p>Tôi đã có tài khoản <a href="login-12.html" style="color: blue">Đăng nhập</a></p>
                         
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login 12 end -->

<!-- External JS libraries -->
    @include('client.login.layout_login.js')
<!-- Custom JS Script -->

</body>

<!-- Mirrored from storage.googleapis.com/theme-vessel-items/checking-sites/logdy-2-html/HTML/main/login-12.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 May 2025 15:22:11 GMT -->
</html>