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
    <div class="sisf-page-section section ">
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
                                    <li class="myaccount-navigation-link myaccount-navigation-link-edit-address">
                                        <a href="{{route('getLocationUser')}}">Địa chỉ</a>
                                    </li>
                                    <li class="myaccount-navigation-link myaccount-navigation-link-edit-account">
                                        <a href="{{route('accountUser')}}">Thông tin </a>
                                    </li>
                                    <li class="myaccount-navigation-link myaccount-navigation-link-edit-account  is-active">
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
                                <form action="{{route('UpdatePassword')}}" method="POST"
                                    class="billing-form">
                                    @csrf

                                    <div class="sisf-billing-fields mb-3"  >
                                        <div class="billing-field-wrapper" >
                                            <div class="row" >
                                                <div class="col-lg-12">
                                                    <div class="form-row">
                                                        <label>mật khẩu hiện tại của bạn<span
                                                                class="required"></span></label>
                                                        <input type="text" placeholder="wwww" id="valueinput"
                                                            name="password" class="input-text">
                                                    </div>
                                                    <div>
                                                        <p id="checkPassword">Kiểm tra</p>
                                                    </div>
                                                </div>
                                                 <div class="col-lg-12" id="renderFormPassword">

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-row">
                                                        <button type="submit" id="submit" disabled
                                                            class="button sisf-button sisf-layout--outlined btn-big text-uppercase">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
        $(document).ready(() => {
            $('#checkPassword').on('click',() => {
                const password = $('#valueinput').val();
                console.log(password);
                $.ajax({
                    url: "{{route('checkPassword')}}",
                    type: 'POST',
                    // contenType: "application/json",
                    data: {
                        password:password,
                        _token: '{{ csrf_token() }}'
                    }
                    ,
                    success: function (data) {

                        renderInput(data);
                    },
                    error: function (error) {
                        console.log(JSON.stringify(error));
                    }
                })

            })
            function renderInput(data) {

                const formrender = `
                                <div class="form-row">
                                    <label>Nhập mật khẩu mới<span class="required"></span></label>
                                    <input type="text" placeholder="wwww" id="valueinput" name="password" class="input-text">
                                </div>
                    `
                console.log(data.status);
                const status = data.status;
                if (status == true) {
                    $('#renderFormPassword').html(formrender);
                    $('#submit').attr('disabled',false);
                    }
            }

        })
    </script>
@endsection
