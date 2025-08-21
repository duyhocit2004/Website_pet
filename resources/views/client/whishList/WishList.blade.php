@extends('client.index3')
@section('style')
    <style>
        #box-container {
            display: flex;
            justify-content: space-between;
            height: 100%;
        }

        #location {
            width: 200px;
            height: 70px;
            display: flex;
            justify-content: center;
            align-content: center
        }

        #location>button {
            width: 150px;
            height: 50px;
            background-color: purple;
            color: white;
            border-radius: 5px 4px;
            border: none;
        }

        #location>h3 {
            width: 230px;
            height: 100px;
        }

        .formadd {
            position: absolute;
            z-index: 200;
            background-color: rgba(0, 0, 0, 0.39);
            width: 100%;
            height: 100%;
            display: none;

        }

        .formadd>.renderForm {
            opacity: 100%;
        }

        .renderForm {
            position: absolute;
            z-index: 300;
            background-color: white;
            width: 50%;
            height: auto;
            top: 5px;
            left: 29%;
            border-radius: 5px;

        }

        #input {
            display: flex;
            justify-content: end;
        }
        #nutan{
            position: absolute;
            right: 60px;
            top:0px;
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
    <div class="sisf-page-section section">
        <div class="sisf-grid sisf-layout--template">
           <div class="sisf-grid-inner container">
              <div class="sisf--wishlist">
                <div class="wishlist-title">
                    <h2>Danh sách yêu thích</h2>
                </div>
                 <div class="wishlist-form-table">
                    <table class="shop_table wishlist_table">
                       <thead>
                          <tr>
                            <th class="product-remove"><span class="screen-reader-text"> </span></th>
                             <th class="product-thumbnail">
                                <span class="screen-reader-text"> </span>
                             </th>
                             <th class="product-name">Tên sản phẩm</th>
                             <th class="product-price">Giá</th>
                             <th class="product-quantity">Trạng thái</th>
                             <th class="product-add-to-cart"><span class="nobr"></span></th>
                          </tr>
                       </thead>
                       <tbody>
                          <!-- Wishlist Item Start -->
                          @foreach ($GetWishList as $WhishList )
                               <tr class="wishlist_item sisf-product-type-product">
                            <td class="product-remove">
                                <a href="#" class="remove"><i class="fa fa-times"></i></a>
                             </td>
                             <td class="product-thumbnail">
                                <a href="shop-single.html"><img src="{{$WhishList->image}}" class="image-fluid" alt="Pawly"></a>
                             </td>
                             <td class="product-name" data-title="Product">
                                <a href="shop-single.html">{{$WhishList->name}}</a>
                             </td>
                             <td class="product-price" data-title="Price"><span class="price-amount"><span class="currencySymbol">{{ number_format($WhishList->GiaDoiTa -($WhishList->GiaDoiTa*$WhishList->price/100),3,'.',',' ) }}</span>VND</span>
                             </td>
                             <td class="product-stock-status">
                                <span class="wishlist-in-stock " style="color:{{$WhishList->status === "appear" ? " green" : "red" }}" >{{$WhishList->status === "appear" ? " Còn hàng" : "Hết hàng"  }}</span>
                              </td>
                              <td>
                                <a class="button product_type_simple add-to-cart add_to_cart_button text-black" href="{{route('DetailProduct',$WhishList->product_id)}}">
                                    <span>Xem chi tiết</span>
                                </a>
                              </td>
                          </tr>
                          @endforeach
                         
                          <!-- Wishlist Item End -->
                       </tbody>
                    </table>
                 </div>
              </div>
           </div>
        </div>
     </div>
@endsection

