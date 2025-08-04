@extends('client.index3')
@section('style')

@endsection
@section('banner')
    <div class="sisf-banner position-relative">
        <div class="banner-img">
            <figure>
                <img src="{{asset('asset/images/inner-page-banner_img.png')}}" alt="Pawly">
            </figure>
        </div>
        <div class="sisf-page-title sisf-m sisf-title--standard sisf-alignment--center">
            <div class="sisf-m-inner">
                <div class="sisf-m-content sisf-content-grid ">
                    <h1 class="sisf-m-title entry-title">Thay đổi mật khẩu</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main2')
    <!-- Page Section Start -->
    <div class="sisf-page-section section">
        <div class="sisf-grid sisf-layout--template">
            <div class="sisf-grid-inner container">
                <div class="sisf-myaccount-sec">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="myaccount-navigation">
                                <ul class="list-unstyled">
                                    <li class="myaccount-navigation-link myaccount-navigation-link-orders">
                                        <a href="orders.html">Đơn hàng</a>
                                    </li>
                                    <li class="myaccount-navigation-link myaccount-navigation-link-edit-address is-active">
                                        <a href="edit-address.html">Địa chỉ</a>
                                    </li>
                                    <li class="myaccount-navigation-link myaccount-navigation-link-edit-account ">
                                        <a href="{{route('accountUser')}}">Thông tin </a>
                                    </li>
                                    <li class="myaccount-navigation-link myaccount-navigation-link-edit-account  ">
                                        <a href="{{route('formPassword')}}">Thay Đổi mật khẩu</a>
                                    </li>
                                    <li class="myaccount-navigation-link myaccount-navigation-link-customer-logout">
                                        <a href="{{route('logout')}}">Log out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="myaccount-content">
                                <p>The following addresses will be used on the checkout page by default.</p>
                                <div class="sisf-myaccount-addresses">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="sisf-address-box">
                                                <div class="sisf-address-title">
                                                    <h3>Billing address</h3>
                                                    <a href="#" class="edit">Edit</a>
                                                </div>
                                                <address>
                                                    1532 Park Serrena Street,<br>Selgoes Park,<br> Los Angeles<br>90001, US
                                                </address>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="sisf-address-box">
                                                <div class="sisf-address-title">
                                                    <h3>Shipping address</h3>
                                                    <a href="#" class="edit">Add</a>
                                                </div>
                                                <address>
                                                    1532 Park Serrena Street,<br>Selgoes Park,<br> Los Angeles<br>90001, US
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>

    </script>
@endsection