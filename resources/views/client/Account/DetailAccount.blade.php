@extends('client.index3')

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
            <h1 class="sisf-m-title entry-title">Thông tin tài khoản</h1>
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
                              <li class="myaccount-navigation-link myaccount-navigation-link-edit-account is-active">
                                   <a href="{{route('accountUser')}}">Thông tin </a>
                              </li>
                               <li class="myaccount-navigation-link myaccount-navigation-link-edit-account">
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
                          <form action="{{route('UpdateAccountClient',$AccountUser->id)}}" method="POST" class="billing-form">
                            @csrf
                            @method('PUT')
                               <div class="sisf-billing-fields mb-3">
                                   <div class="billing-field-wrapper">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-row">
                                                <label>Họ Tên<span class="required">*</span></label>
                                                <input type="text" placeholder="wwww" name="name" value="{{old('name',$AccountUser->name)}}" class="input-text">
                                            </div>
                                            @error('name')
                                                    <p>{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                       <div class="row">
                                           <div class="col-lg-12">
                                                <div class="form-row">
                                                    <label>email<span class="required">*</span></label>
                                                    <input type="email"  disabled name="email" value="{{old('email',$AccountUser->email)}}" class="input-text">
                                                </div>
                                                @error('email')
                                                        <p>{{$message}}</p>
                                            @enderror
                                           </div>
                                       </div>
                                        <div class="row">
                                           <div class="col-lg-12">
                                               <div class="form-row">
                                                   <label>Số điện thoại<span class="required">*</span></label>
                                                   <input type="text" placeholder="phone" name="phone" value="{{old('phone',$AccountUser->phone)}}" class="input-text">
                                               </div>
                                               @error('phone')
                                                    <p>{{$message}}</p>
                                            @enderror
                                           </div>
                                       </div>
                                        <div class="row">
                                           <div class="col-lg-12">
                                               <div class="form-row">
                                                   <label>tuổi<span class="required">*</span></label>
                                                   <input type="text" placeholder="23" name="age" value="{{old('age',$AccountUser->age)}}" class="input-text">
                                               </div>
                                               @error('age')
                                                    <p>{{$message}}</p>
                                            @enderror
                                           </div>
                                       </div>

                                        <div class="row">
                                           <div class="col-lg-12">
                                               <div class="form-row">
                                                  <button type="submit" class="button sisf-button sisf-layout--outlined btn-big text-uppercase">Save changes</button>
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
