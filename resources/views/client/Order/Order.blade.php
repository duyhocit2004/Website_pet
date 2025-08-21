@extends('client.index3')
@section('style')
    <style>
        .box_location {
            display: flex;
            justify-content: space-between;
        }

        #location {
            display: inline-block;
            border: 1px solid black;
            color: purple;
            height: 40px;
            width: 100px;
            text-align: center;
            line-height: 36px;
        }

        .box-container {
            width: 100%;
            height: 1200px;
            background-color: rgba(9, 4, 4, 0.329);
            position: absolute;
            z-index: 9999;
            display: none;

        }

        .container1 {
            width: 50%;
            height: auto;
            position: absolute;
            background-color: white;
            top: 10%;
            left: 25%;
        }

        /* #titleLocation h1{

                    } */
        .container2 {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid black;
        }
        .ddd p{
            margin-left: 10px;
        }
    </style>
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
                    <h1 class="sisf-m-title entry-title">Địa chỉ</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main2')

    <div id="box-container" class="box-container">
        <div class="container1">
            <div id="titleLocation" style="padding: 10px 20px 10px 20px">
                <h3>Địa chỉ của tôi</h3>
            </div>
            <hr>
            @foreach ($GetLocation as $Location)
                <div class="Location">
                    <div class="container2" style="padding: 20px">
                        <div>
                            <input type="radio" name="id_Location" value="{{$Location->id}}" style="width: 25px;height:25px;">
                        </div>
                        <div>
                            <p>{{$Location->name | $Location->name}}</p>
                            <p>{{$Location->location_detail}}</p>
                        </div>
                        <div>
                            <span id="editLocation" style="color:black;"> Chỉnh sửa</span>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="ddd" style="display: flex;justify-content: end;margin-top:20px; margin-right: 20px">
                <p id="return" class="btn btn-secondary">Trở lại</p>
                <p id="confirm" class="btn btn-primary">Xác nhận</p>
            </div>

        </div>

    </div>
    <form action="" class="checkout-form" method="post">
        @csrf
        <div class="sisf-page-section section">

            <div class="sisf-grid sisf-layout--template">
                <div class="sisf-grid-inner container">
                    <div class="sisf-checkout">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="sisf-checkout-left">
                                    <div class="sisf-checkout-left-inner">
                                        <div class="sisf-billing-fields mb-3">
                                            <div class="box_location">
                                                <h3 class="checkout-title">Thông tin vận chuyển</h3>
                                                <span id="location" style="color:black">Thay đổi</span>
                                            </div>

                                            <div class="billing-field-wrapper">
                                                 <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-row">
                                                            <input type="text" class="input-text " name="username"
                                                                id="username" placeholder="Họ tên" disabled value=""
                                                                aria-required="true" autocomplete="given-name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-row">
                                                            <input type="text" class="input-text" name="phone"
                                                                id="phone"
                                                                placeholder="Số điện thoại" value=""
                                                                aria-required="true" disabled autocomplete="address-line1"
                                                                data-placeholder="House number and street name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-row">
                                                            <input type="text" class="input-text " name="email"
                                                                id="email" disabled
                                                                placeholder="tien@gmail.com"
                                                                value="" autocomplete="address-line2">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-row">
                                                            <input type="text" class="input-text " name="province_code"
                                                                id="province_code" placeholder="Phố/Tỉnh" disabled value=""
                                                                aria-required="true" autocomplete="given-name">
                                                            <input type="text" class="input-text " name="province_name"
                                                                id="province_name" placeholder="Họ tên" hidden value=""
                                                                aria-required="true" autocomplete="given-name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-row">
                                                            <input type="text" class="input-text " name="district_code"
                                                                id="district_code" placeholder="huyện/xã" disabled value=""
                                                                autocomplete="organization">
                                                            <input type="text" class="input-text " name="district_name"
                                                                id="district_name" placeholder="" hidden value=""
                                                                autocomplete="organization">
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-row">
                                                            <input type="text" class="input-text " name="ward_code"
                                                                id="ward_code" placeholder="phường" disabled value=""
                                                                autocomplete="organization">
                                                            <input type="text" class="input-text " name="ward_name"
                                                                id="ward_name" placeholder="phường" hidden value=""
                                                                autocomplete="organization">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-row">
                                                            <textarea  name="note" id="note"  placeholder="Ghi chú" >

                                                            </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                {{-- <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-row">
                                                            <input type="text" class="input-text " name="billing_postcode"
                                                                id="billing_postcode" placeholder="ZIP Code" value=""
                                                                aria-required="true" autocomplete="postal-code"
                                                                data-placeholder="ZIP Code">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-row">
                                                            <input type="tel" class="input-text " name="billing_phone"
                                                                id="billing_phone" placeholder="Phone" value=""
                                                                aria-required="true" autocomplete="tel">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-row">
                                                            <input type="email" class="input-text " name="billing_email"
                                                                id="billing_email" placeholder="Email address" value=""
                                                                aria-required="true">
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="sisf-additional-fields">
                                            <h3 class="checkout-title">Thông tin bổ sung</h3>
                                            <div class="additional-field-wrapper">
                                            </div>
                                        </div>
                                        <div class="sisf-checkout-payment">
                                            <h3 class="checkout-title">Phương thức thanh toán</h3>
                                            <div class="sisf-payment_methods">
                                                <ul class="payment_methods">
                                                    @foreach ($getMethodPayment as $method )
                                                    <li class="payment_method_cod">
                                                        <input id="payment_method_id" type="radio" class="input-radio"
                                                            name="payment_method" value="{{$method->id}}" checked="checked">
                                                        <label for="payment_method_cod">Thanh toán {{$method->name}}</label>
                                                        <p>Thanh toán {{$method->name === "COD" ? "Sau khi nhận hàng" : "Trực tiếp"}}</p>
                                                    </li>
                                                    @endforeach
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="form-row place-order">
                                            <a class="button back-to-cart" href="shop.html"><i
                                                    class="fa-solid fa-arrow-left me-3"></i>Back to Cart</a>
                                            <a class="button sisf-button sisf-layout--outlined btn-big text-uppercase"
                                                href="my-account.html">Place order</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="sisf-checkout-right">
                                    <div class="sisf-checkout-cart-items">
                                        <h3 class="checkout-title">Giỏ hàng của bạn</h3>
                                        <ul class="sisf-checkout-cart-items-content list-unstyled">
                                            @foreach ($getList as $list)
                                                 <li class="cart_item sisf-product-type-product">
                                                <div class="cart_item-inner d-flex align-items-center">
                                                    <div class="sisf-e-image">
                                                        <a href="{{route('DetailProduct',$list->product->id)}}"><img src="{{$list->product->image}}" class="image-fluid"
                                                                alt="Dishify"></a>
                                                    </div>
                                                    <div class="product-name">
                                                        <h5>{{$list->product->name}}</h5>
                                                        <p class="sisf-e-quantity-price mb-0"><strong
                                                                class="product-quantity">{{$list->quantity}}<i
                                                                    class="fa fa-times px-2"></i></strong>{{number_format($list->price,3,'.',',') }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                           
                                        </ul>
                                    </div>
                                    <div class="sisf-checkout-cart-totals cart-form-table pt-3">
                                        <h3 class="checkout-title">tổng giỏ hàng</h3>
                                        <table class="shop_table">
                                            <tbody>
                                                <tr class="cart-subtotal">
                                                    <th>Tổng phụ</th>
                                                    <td><span class="price-amount"><span
                                                                class="price-currencysymbol">{{ number_format($list->price * $list->quantity,3,'.',',') }}</span>VND</span></td>
                                                </tr>
                                                <tr class="cart-shipping-fee">
                                                    <th>Mã giảm giá</th>
                                                    <td><span class="price-amount"><span
                                                                class="price-currencysymbol">{{number_format(0,3,'.',',')}}</span>VND</span></td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Tổng cộng</th>
                                                    <td><strong><span class="price-amount"><span
                                                                    class="price-currencysymbol">{{ number_format($list->price * $list->quantity ,3,'.',',')}}</span>VND</span></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-coupon-toggle mt-3">
                                        <div class="coupon-info">
                                            <a href="#"
                                                class="showcoupon button sisf-button sisf-layout--outlined btn-big w-100 text-center">
                                                Bạn có mã giảm không</a>
                                            <div class="checkout_coupon form-coupon pt-3">
                                                <p>Nếu bạn có mã giảm giá, vui lòng áp dụng bên dưới.</p>
                                                <div class="d-flex align-items-start coupon-code-box">
                                                    <input type="text" name="coupon_code" class="input-text mb-0"
                                                        placeholder="Áp dụng phiếu giảm giá" id="coupon_code" value="">
                                                    <p class="button sisf-button sisf-layout--outlined btn-big text-uppercase">Áp dụng</p>
                                                    {{-- <button type="submit"
                                                        class="button sisf-button sisf-layout--outlined btn-big text-uppercase"
                                                        name="apply_coupon" value="Apply coupon">Áp dụng</button> --}}
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
        <!-- Page Section End -->
    </form>
@endsection

@section('js')
    <script>

        const ListLocation = @json($GetLocation)

        document.getElementById('location').addEventListener('click',(e)=>{
            document.getElementById('box-container').style.display = "block"
        })
        document.getElementById('return').addEventListener('click',(e)=>{
            document.getElementById('box-container').style.display = "none"
        })
        document.getElementById('confirm').addEventListener('click',()=>{
            
            renderLocation();
            

            
        })
        function renderLocation(){

            let location = document.querySelector("input[name='id_Location']:checked");
            let value = location.value ?? null;

            console.log(value,location)

            if(value){
                document.getElementById('box-container').style.display = "none"
            }
            
            document.getElementById()
        }
        // console.log(document.getElementById('editLocation'));
    </script>
@endsection