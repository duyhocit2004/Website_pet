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
                        <a href="{{route('formLogin')}}" class="btn-theme-3">Đăng nhập</a>
                        <a href="{{route('formRegister')}}" class="btn-theme-2">Đăng ký</a>
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
                        <h3>Đăng nhập vào tài khoản của bạn</h3>
                        <form action="{{route('loginUser')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="first_field" class="form-label float-start">Email</label>
                                <input name="email" type="email" value="{{old('email')}}" class="form-control" id="first_field" placeholder="Email Address" aria-label="Email Address">
                                @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror   
                            </div>
                            <div class="form-group clearfix">
                                <label for="second_field" class="form-label float-start">Mật khẩu</label>
                                <input name="password" type="password" value="{{old('email')}}" class="form-control" autocomplete="off" id="second_field" placeholder="Password" aria-label="Password">
                                @error('password')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="checkbox form-group clearfix">
                                <a href="{{route('formForgotPassword')}}" class="link-light float-end forgot-password">Quên mật khẩu</a>
                            </div>
                            <div class="form-group clearfix">
                                <button type="submit" class="btn btn-lg btn-primary btn-theme"><span>Đăng nhập</span></button>
                            </div>
                        </form>
                        <p>Tôi không có tài khoản <a href="{{route('formRegister')}}" class="thembo" style="color:blue"> Đăng ký</a></p>
                       <div class="social-box d-flex justify-content-center"> 
                            <ul class="social-list d-flex gap-3 list-unstyled">
                                <li><a href="{{route('redirectToFacebook')}}" class="facebook-color"><span style="margin-left:10px;"  >Facebook</span></a></li>
                                <li><a href="{{route('redirectToBitbucket')}}" class="twitter-color"><span style="margin-left:12px;">Bitbucket</span></a></li>
                                <li><a href="{{route('redirectToGoogle')}}" class="google-color"><span style="margin-left:10px;">Google</span></a></li>
                            </ul>
                        </div>
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