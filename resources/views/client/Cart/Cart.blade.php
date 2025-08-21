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
                    <h1 class="sisf-m-title entry-title">Địa chỉ</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main2')
    <form action="{{route('renderOrder')}}" method="POST">
      @csrf 
    <div class="sisf-page-section section">
        <div class="sisf-grid sisf-layout--template">
           <div class="sisf-grid-inner container">
              <div class="sisf--cart">
                 <div class="cart-form-table">
                    <table class="shop_table cart_table">
                       <thead>
                          <tr>
                             <th class="product-thumbnail">
                                <span class="screen-reader-text">Chọn </span>
                             </th>
                             <th class="product-name">Ảnh</th>
                             <th class="product-name">Sản phẩm</th>
                             <th class="product-price">Giá</th>
                             <th class="product-quantity">Số Lượng</th>
                             <th class="product-subtotal">Tổng</th>
                             <th class="product-remove">Thao tác</th>
                          </tr>
                       </thead>
                       <tbody>
                          <!-- Cart Item Start -->
                          @foreach ($product as $listCart )
                                <tr class="cart_item sisf-product-type-product">
                            <td class="product-thumbnail">
                                <input type="checkbox" name="cart[id][]" value="{{$listCart->id}}" id="changePrice">
                            </td>
                             <td class="product-thumbnail">
                                <a href="shop-single.html"><img src="{{$listCart->product->image}}" class="image-fluid" alt="Pawly"></a>
                             </td>
                             <td class="product-name" data-title="Product">
                                <a href="shop-single.html">{{$listCart->product->name}}</a>
                             </td>
                             <td class="product-price" data-title="Price"><span class="price-amount"><span class="woocommerce-Price-currencySymbol">{{number_format($listCart->ProductVariant->price ,3,'.',',' ) }}</span>VND</span>
                             </td>
                             <td class="product-quantity" data-title="Quantity">
                                <div class="sisf-quantity-buttons quantity">
                                   <span class="sisf-quantity-minus">
                                   <i class="fas fa-chevron-down custom-toggle-icon"></i>  
                                   </span>
                                   <input type="text" id="quantity"  class="sisf-quantity-input" value="{{$listCart->quantity}}" data-step="1" data-min="1" data-max="" name="quantity[{{ $listCart->id}}]" value="1" title="Qty" size="4" placeholder="">
                                   <span class="sisf-quantity-plus">
                                   <i class="fas fa-chevron-down custom-toggle-icon"></i>
                                   </span>
                                </div>
                             </td>
                             <td class="product-subtotal">
                                <span class="price-amount"><span class="price-currencysymbol">{{number_format($listCart->quantity * $listCart->ProductVariant->price ,3,'.',',')}}</span>VND</span>
                             </td>
                             <td class="product-remove">
                                <a href="#" class="remove"><i class="fa fa-times"></i></a>
                             </td>
                          </tr>
                          @endforeach
                      
                          <!-- Cart Item End -->
                       </tbody>

                    </table>
                    <div class="cart-collaterals">
                       <div class="cart_totals">
                          <div class="proceed-to-checkout text-center mt-3">
                             <button class="checkout-button button sisf-button sisf-layout--outlined">Proceed to checkout</button>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
      </div>
   </form>
@endsection
@section('js')
   <script>
      
   </script>
@endsection

