@extends('client.index3')
@section('style')
   <style>
      .food-button {
        background-color: black;
        color: white;
        padding: 10px 20px;
        margin-right: 10px;
        border-radius: 999px;
        font-weight: bold;
        cursor: pointer;
        user-select: none;
        transition: 0.3s;
      }

      .food-button1 {
        background-color: black;
        color: white;
        padding: 10px 20px;
        margin-right: 10px;
        border-radius: 999px;
        font-weight: bold;
        cursor: pointer;
        user-select: none;
        transition: 0.3s;
      }

      /* Khi radio được chọn */
      input[type="radio"]:checked+.food-button {
        background-color: #b132af;
        /* hoặc màu tím của bạn */
        color: white;
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
            <h1 class="sisf-m-title entry-title">Cửa hàng</h1>
          </div>
        </div>
      </div>
   </div>
@endsection
@section('main2')
   <div class="sisf-page-section section">
      <div class="sisf-single">
        <div class="container">
          <div class="sisf-single-top">
            <div class="row sisf-single-top-row align-items-center">
               <div class="col-md-2">
                 <div class="gallery-section position-relative small-gallery">
                   <div class="gallery-items page-gallery-box align-items-center">
                     @foreach ($products['album'] as $as)
                   <div class="premium-gallery small-gallry">
                     <figure class="mb-0">
                       <img src="{{$as->image_path}}" class="image-fluid" alt="Pawly">
                     </figure>
                   </div>
                 @endforeach

                   </div>
                 </div>
               </div>
               <div class="col-md-5">
                 <div class="sisf-single-image">
                   <div class="product-gallery">
                     <div class="gallery-section position-relative product-main-gallery">
                        <div class="gallery-items page-gallery-box">
                          <div class="product-gallery">
                            <div class="wow fadeInUp">
                              <a href="images/product15.png">
                                 <figure>
                                   <img src="{{$products['image']}}" class="image-fluid" alt="Pawly">
                                 </figure>
                              </a>
                            </div>
                          </div>
                        </div>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="col-md-5">
                 <form action="{{route('AddCart')}}" method="post" enctype="multipart/form-data">
                   @csrf
                   <input type="text" hidden value="{{$products['id']}}" name="id">
                   <div class="single-product-summary">
                     <div class="sisf-product-title-box">
                        <h2 class="sisf-product-title">{{$products['name']}}</h2>
                     </div>
                     <div class="product_meta">
                        <span class="sku_wrapper">
                          <span class="sisf-meta">{{$products['SKU']}}</span>
                          <span class="sku sisf-meta-value ps-4"></span>
                        </span>
                     </div>
                     <div class="price d-flex align-items-center">
                        <span class="price-amount">
                          {{-- <span class="price-currencysymbol">$</span>40.00</span>
                        <span class="big-dash">-</span> --}}
                        <span class="price-amount">

                          <input type="text" class="price" value="{{$products['pricedefault']}}" hidden
                            name="price">
                          <span class="price-currencysymbol price1">{{$products['pricedefault']}}</span>VND</span>
                     </div>
                     <div class="sisf-ratings mt-3">
                        <span class="sisf-stars">
                          <span class="sisf-stars-items">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                          </span>
                        </span>
                        {{-- đếm số comment --}}
                        <a href="#reviews" class="review-link">
                          <span class="count"> 3 Đánh giá </span>
                        </a>
                     </div>
                     <div class="product-details-short-description mt-3">
                        <p>{!! $products['title'] !!}</p>
                     </div>
                     <!-- MÀU SẮC -->
                     <div class="food-size-container">
                        <span class="label">MÀU SẮC</span>
                        <div class="button-group mt-3">
                          @foreach ($products['ListColor'] as $index => $color)
                       <input type="radio" name="color" class="color" id="color_{{ $index }}"
                        value="{{ $color['id'] }}" hidden>
                       <label for="color_{{ $index }}" class="food-button">{{ $color['name'] }}</label>
                     @endforeach
                        </div>
                     </div>

                     <!-- KHỐI LƯỢNG -->
                     <div class="food-size-container" style="margin-top:20px">
                        <span class="label">KHỐI LƯỢNG</span>
                        <div class="button-group mt-3">
                          @foreach ($products['NetWeight'] as $index => $weight)
                       <input type="radio" name="weight" class="weight" id="weight_{{ $index }}"
                        value="{{ $weight['id'] }}" hidden>
                       <label for="weight_{{ $index }}" class="food-button">{{ $weight['name'] }}</label>
                     @endforeach
                        </div>
                     </div>
                     <div class="sisf-product_cart mt-5">
                        <div class="d-flex">
                          <div class="sisf-quantity-buttons quantity">
                            <span class="sisf-quantity-minus">
                              <i class="fas fa-chevron-down custom-toggle-icon"></i>
                            </span>
                            <input type="text" id="quantity" class="sisf-quantity-input" data-step="1" data-min="1"
                              data-max="" name="quantity" value="1" title="Qty" size="4" placeholder="">
                            <span class="sisf-quantity-plus">
                              <i class="fas fa-chevron-down custom-toggle-icon"></i>
                            </span>
                          </div>
                          <div class="sisf-m-button text-center w-100">
                            <button class="btn-default w-100 id"><span> Thêm vào giỏ hàng</span></button>
                          </div>
                        </div>
                        <div class="sisf-m-button text-center w-100 mt-3">
                          <a class="btn-default w-100" href="cart.html"><span> Mua ngay</span></a>
                        </div>
                     </div>
                     <div class="product_meta mt-4">
                        <span class="posted_in">
                          <span class="sisf-meta-label">Thể loại :</span>
                          <span class="sisf-meta-value"><a href="#"> {{$products['category_name']}}</a></span>
                        </span>
                        {{-- <span class="tagged_as"><span class="sisf-meta-label">Tags:</span>
                          <span class="sisf-meta-value"><a href="#">High Protein, Limited Ingredient, Natural
                              Ingredients</a></span>
                        </span> --}}
                        <span class="sisf-social--share">
                          <span class="sisf-meta-label text-uppercase">Chia sẻ</span>
                          <span class="sisf-meta-value">
                            <a href="#"> <i class="fa-brands fa-facebook-f me-3"></i></a>
                            <a href="#"> <i class="fa-brands fa-twitter me-3"></i></a>
                            <a href="#"> <i class="fa-brands fa-linkedin-in"></i></a>
                          </span>
                        </span>
                     </div>
                   </div>
                 </form>
               </div>
            </div>
          </div>
          <div class="product-tabs wc-tabs-wrapper">
            <div class="row">
               <div class="col-md-6">
                 <!-- product tab Nav start -->
                 <div class="product-tab-nav wow fadeInUp" data-wow-delay="0.25s">
                   <ul class="nav nav-tabs" id="myTab" role="tablist">
                     <li class="nav-item mt-0" role="presentation">
                        <button class="nav-link btn active" id="home-tab" data-bs-toggle="tab"
                          data-bs-target="#description" type="button" role="tab" aria-selected="true"><span>Nội
                            dung</span> <span><i class="icon fa fa-minus"></i></span></button>
                     </li>
                     <li class="nav-item" role="presentation">
                        <button class="nav-link btn" id="profile-tab" data-bs-toggle="tab"
                          data-bs-target="#additionalinformation" type="button" role="tab"
                          aria-selected="false">Thông tin bổ sung <i class="icon fa fa-plus"></i></button>
                     </li>
                     <li class="nav-item" role="presentation">
                        <button class="nav-link btn" id="contact-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                          type="button" role="tab" aria-selected="false">Đánh giá(2) <i
                            class="icon fa fa-plus"></i></button>
                     </li>
                   </ul>
                 </div>
                 <!-- product tab Nav End -->
               </div>
               <div class="col-md-6">
                 <!-- Product Tab Box Start -->
                 <div class="product-tab-box tab-content mt-0" id="myTabContent">
                   <div class="our-vision-item tab-pane fade show active" id="description" role="tabpanel">
                     <div class="product-tab-content">
                        <div class="discription mb-4">
                          <h5>Nội dung </h5>
                        </div>
                        <p class="mb-0">{!! $products['description'] !!}</p>
                     </div>
                   </div>
                   <div class="our-vision-item tab-pane fade" id="additionalinformation" role="tabpanel">
                     <div class="product-tab-content">
                        <div class="discription mb-4">
                          <h5>Thông tin bổ sung</h5>
                        </div>
                        <div class="product-tab-body">
                          <table class="product-information">
                            <tbody>
                              <tr>
                                 <th>Dimensions:</th>
                                 <td>10 &times; 20 &times; 15 cm</td>
                              </tr>
                              <tr>
                                 <th>Ideal For: </th>
                                 <td>Playful Kitten, Curious adult, Wise senior</td>
                              </tr>
                              <tr>
                                 <th>food-size:</th>
                                 <td>1kg, 3kg, 500gm</td>
                              </tr>
                              <tr>
                                 <th>brands:</th>
                                 <td>Optimum</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                     </div>
                   </div>
                   <div class="our-mission-item tab-pane fade" id="reviews" role="tabpanel">
                     <div class="product-tab-content">
                        <div class="product-tab-body">
                          <div class="product-reviews-col">
                            <div class="comments">
                              <h2 class="reviews-title">2 reviews for <span>Whiskas Cat Food</span></h2>
                              <ul class="commentlist">
                                 <li class="review-list">
                                   <div class="comment_container">
                                     <div class="sisf-e-image mt-1">
                                       <figure>
                                          <img src="{{$products['image']}}" class="image-fluid" alt="Pawly">
                                       </figure>
                                     </div>
                                     <div class="comment-text">
                                       <div class="meta d-flex align-items-center">
                                          <strong class="review-author">James Barton</strong>
                                          <span class="review-published-date">October 10, 2024</span>
                                       </div>
                                       <div class="sisf-ratings">
                                          <span class="sisf-stars">
                                            <span class="sisf-stars-items">
                                              <i class="fas fa-star" aria-hidden="true"></i>
                                              <i class="fas fa-star" aria-hidden="true"></i>
                                              <i class="fas fa-star" aria-hidden="true"></i>
                                              <i class="fas fa-star" aria-hidden="true"></i>
                                              <i class="fas fa-star" aria-hidden="true"></i>
                                            </span>
                                          </span>
                                       </div>
                                     </div>
                                   </div>
                                   <div class="description">
                                     <p>Good Product.</p>
                                   </div>
                                 </li>
                              </ul>
                            </div>
                            <div class="review_form_wrapper mt-2">
                              <div class="review_form">
                                 <h2 class="comment-reply-title">Add a review</h2>
                                 <form id="commentform">
                                   <p class="comment-notes">Your email address will not be published. Required
                                     fields are marked
                                     <span class="required">*</span>
                                   </p>
                                   <div class="comment-form-rating">
                                     <label>Your Rating <span class="required">*</span></label>
                                     <div class="star-rating my-2">
                                       <input type="radio" id="star5" name="rating" value="5">
                                       <label for="star5">★</label>
                                       <input type="radio" id="star4" name="rating" value="4">
                                       <label for="star4">★</label>
                                       <input type="radio" id="star3" name="rating" value="3" checked="">
                                       <label for="star3">★</label>
                                       <input type="radio" id="star2" name="rating" value="2">
                                       <label for="star2">★</label>
                                       <input type="radio" id="star1" name="rating" value="1">
                                       <label for="star1">★</label>
                                     </div>
                                   </div>
                                   <div class="review_form_box">
                                     <div class="form_box-grid">
                                       <div class="form_box-item w-100">
                                          <input id="author" name="author" placeholder="Your Name *"
                                            type="text" value="" size="30" maxlength="245"
                                            required="required">
                                       </div>
                                       <div class="form_box-item w-100">
                                          <input id="email" name="email" placeholder="Email *" type="text"
                                            value="" size="30" maxlength="100" required="required">
                                       </div>
                                     </div>
                                     <div class="comment-form-comment">
                                       <textarea id="comment" name="comment" placeholder="Your Review *"
                                          cols="45" rows="4" maxlength="65525" required="required"></textarea>
                                     </div>
                                     <div class="form-check d-flex align-items-center">
                                       <input class="form-check-input" name="wp-comment-cookies-consent"
                                          type="checkbox" value="yes">
                                       <label class="form-check-label comment-box ms-2 mt-1">Save my name, and
                                          email in this browser for the next time I comment.</label>
                                     </div>
                                     <div class="sisf-m-button mt-4">
                                       <a href="#" class="sisf-button sisf-layout--outlined"><span>Submit<i
                                              class="fa-solid fa-arrow-right ps-2"></i></span></a>
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
                 <!-- Product Tab Box End -->
               </div>
            </div>
          </div>
          <div class="related_products">
            <h2>Related products</h2>
            <div class="sisf-product-list border-0 p-0">
               <div class="row">
                 <!-- Product-Item Start -->
                 <div class="col-lg-3 col-md-6">
                   <div class="product">
                     <div class="sisf-product-inner sisf-e-inner">
                        <!-- Product Image Start -->
                        <div class="sisf-product-image">
                          <a href="shop-single.html">
                            <figure>
                              <img src="images/product9.png" class="image-fluid" alt="Pawly">
                            </figure>
                          </a>
                          <div class="heart-icon">
                            <a href="#">
                              <i class="fa-regular fa-heart"></i>
                            </a>
                          </div>
                          <div class="sisf-m-button cart-icon-button text-center">
                            <a href="cart.html"
                              class="product_type_simple btn-default sisf-layout-filled add_to_cart_button">
                              <span><i class="fa-solid fa-cart-shopping me-2"></i> Add to cart</span>
                            </a>
                          </div>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="sisf-e-product-content text-center">
                          <div class="sisf-e-ratings sisf-m">
                            <div class="sisf-m-inner">
                              <div class="sisf-m-star sisf--initial">
                                 <i class="fa-solid fa-star"></i>
                                 <i class="fa-solid fa-star"></i>
                                 <i class="fa-solid fa-star"></i>
                                 <i class="fa-solid fa-star"></i>
                                 <i class="fa-solid fa-star"></i>
                              </div>
                            </div>
                          </div>
                          <h5 class="sisf-e-product-title sisf-e-title entry-title my-2">
                            <a class="sisf-e-product-title-link shop-product" href="shop-single.html">Humpy
                              Head</a>
                          </h5>
                          <div class="sisf-product-price price">
                            <span class="product-price-amount"><sup
                                 class="product-price-currencysymbol">$</sup>49.00</span>
                          </div>
                        </div>
                        <!-- Product Content End -->
                     </div>
                   </div>
                 </div>
                 <!-- Product-Item End -->
               </div>
            </div>
          </div>
        </div>
      </div>
   </div>
@endsection

@section('js')
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script>
      const product = @json($products);
      // console.log(product.id);
      $(document).ready(function () {
        CheckProduct(product.id);
        function CheckProduct(id) {

          $('input[name=color], input[name=weight]').on('change', function () {

            const colorID = $('input[name=color]:checked').val();
            const weightID = $('input[name=weight]:checked').val();

            console.log(colorID, weightID)
            return fetchVariantData(colorID, weightID, id);
          })
        }




        // conssole.log()
        function fetchVariantData(selectcolorID, selectNetWeightID, id) {
          console.log(id)
          return $.ajax({
            url: `http://127.0.0.1:8000/api/productVariant/${id}`,
            method: "GET",
            success: function (res) {
               console.log(res.Data)
               checkdata(res, selectcolorID, selectNetWeightID);
            },
            error: function (error) {
               console.log("lỗi" + error)
            }
          });

        }

        function checkdata(res, idColor, NetWeight) {
          console.log(res, idColor, NetWeight);
          const quantityProduct = $('input[name=quantity]').val();
          let found = false;
          return $.each(res.Data, function (index, value) {
            if (value.color_id == idColor && value.net_weight_id == NetWeight) {
               $('.sku').html(value.stock);
               $('.price1').html(formatPrice(value.price));
               $('input[name=price]').val(value.price);
                $('#quantity').attr('data-max',value.stock)
              $('button').removeAttr("disabled");
                
               currentStock = parseInt(value.stock); // gán lại biến stock

               validateQuantity();
               found = true;
               
               return false;
            }
            if (found == false) {
                  // Nếu không tìm thấy variant phù hợp
                  $('button').attr("disabled","disabled");
                  $('.sku').html('--');
                  $('.price1').html('--');
                  $('input[name=price]').val('');
                  $('#id').attr('disabled',true);
               }
          })
          

        }
        // Tự động kiểm tra mỗi khi số lượng thay đổi
        $(document).on('input', 'input[name=quantity]', function () {
          validateQuantity();
        });

        function validateQuantity() {
          const quantity = parseInt($('input[name=quantity]').val());
          if (quantity > currentStock) {
            $('.sisf-quantity-input').attr('disabled', false);
          } else {
            $('.sisf-quantity-input').removeAttr('disabled');
          }
        }
        function formatPrice(price) {
          if (!price) return '0';
          return Number(price).toLocaleString('vi-VN');
        }

      })
   </script>
@endsection