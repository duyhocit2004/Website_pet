@extends('client.index3')
@section('style')
    <style>
        .list2222{
            display: flex;
            justify-content: center;
            padding-top: 20px;
            padding-bottom: 20px;

        }
        ..list2222 a{
            text-decoration: none;
            color :black;
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
                    <h1 class="sisf-m-title entry-title">Danh sách đơn hàng</h1>
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
                                    <li class="myaccount-navigation-link myaccount-navigation-link-orders is-active">
                                        <a href="{{route('GetListOrderUser')}}">Đơn hàng</a>
                                    </li>
                                    <li class="myaccount-navigation-link myaccount-navigation-link-edit-address">
                                        <a href="{{route('getLocationUser')}}">Địa chỉ</a>
                                    </li>
                                    <li class="myaccount-navigation-link myaccount-navigation-link-edit-account">
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
                            <div class="myaccount-content cart-form-table">
                                <table class="sisforders-table shop_table">
                                    <thead>
                                        <tr>
                                            <th scope="col"><span class="nobr">Mã đơn hàng</span></th>
                                            <th scope="col"><span class="nobr">Ngày</span></th>
                                            <th scope="col"><span class="nobr">Trạng thái</span></th>
                                            <th scope="col"><span class="nobr">Tổng tièn</span></th>
                                            <th scope="col"><span class="nobr">Thao tác</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Order as $orders)
                                                <?php 
                                                    if($orders->payment_status_id === 1){
                                                        $color = "Gray";
                                                    }else{
                                                        $color = "green";
                                                    }
    
    
                                                ?>
                                            <tr>
                                                <th>
                                                    <span>{{$orders->code}}</span>
                                                <td>
                                                    <span>{{\Carbon\Carbon::parse($orders->created_at)->format('d/m/Y') }}</span>
                                                </td>
                                                <td>
                                                    <span style="color:{{$color}};border:1px solid {{$color}};padding:2px">{{$orders->trangthai}}</span>
                                                </td>
                                                <td>
                                                    <span class="price-amount"><span
                                                            class="price-currencysymbol"></span>{{$orders->total}}</span>VND
                                                </td>
                                                <td>
                                                    <a href="{{route('GetDetailOrderUser',$orders->id)}}"
                                                        class="button view sisf-button sisf-layout--outlined btn-big text-uppercase text-center">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                                @php 
                                        $user = Auth::user();
                                        $listOrder = \App\Models\Order::where('user_id',$user->id)->count();
                                    @endphp
                                        <div class="list2222">
                                            @if ($Order->currentPage() < $Order->lastPage())
                                            {{-- @if ($Order->currentPage() === 1) --}}

                                                <a href="{{url('GetListOrderUser?page='.$Order->currentPage()+5)}}">Xem thêm</a>
                                            @endif

                                            @if($Order->currentPage() > 1)
                                                <a href="{{ url('GetListOrderUser?page=' . ($Order->currentPage() - 5)) }}">Quay lại</a>
                                            @endif
                                        </div>
                                            

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection