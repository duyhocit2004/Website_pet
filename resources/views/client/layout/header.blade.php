<header id="sisf-page-header" class="sisf-main-header sisf-standerd-header">
         <div class="header-top sisf-skin--light">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-12 p-0">
                     <div class="header_col">
                        <div class="sisf-widget-holder sisf--left">
                           <div id="sis_core_icon_list_item-3" class="widget widget_sis_core_icon_list_item sisf-top-bar-widget">
                              <div class="sisf-icon-list-item sisf-icon--icon-pack">                  
                                 <a href="tel:206176232338" target="_self">                  
                                 <span class="sisf-e-title-inner">                           
                                 <span class="sisf-e-title-text"><img src="{{asset('asset/images/Header-call-icon.png')}}" alt="Pawly"> Gọi chúng tôi : 0337035875</span>
                                 </span>                 
                                 </a>            
                              </div>
                           </div>
                        </div>
                        <div class="header-center-icons">
                           <a href="#"><i class="fa-brands fa-facebook"></i></a>
                           <a href="#"><i class="fa-brands fa-instagram"></i></a>
                           <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                           <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                        </div>
                        <div class="mail-us me-1">
                           <a href="mailto:info@pawly.com"><span class="sisf-e-title-text"><img src="{{asset('asset/images/home-mail-icon.png')}}" alt="Pawly"> Mail : hoangduyoffline@gmail.com</span></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="sisf-page-header-inner" class="sisf-skin--light position-relative d-flex align-items-center">
            <!-- Logo Start -->
            <a class="navbar-brand sisf-header-logo-link mobile-none" href="index.html">
            <img src="{{asset('asset/images/pawly_logo.png')}}" alt="Logo">
            </a>
            <!-- Logo End -->
            <!-- Logo Start -->
            <a class="navbar-brand mobile-block" href="index.html">
            <img src="{{asset('asset/images/pawly_logo_dark.png')}}" alt="Logo">
            </a>
            <!-- Logo End -->
            <div class="sisf-divided-header-right-wrapper d-flex justify-content-between align-items-center">
               <nav class="navbar navbar-expand-lg">
                  <!-- Main Menu Start -->
                     @include('client.layout.menu')
                  <!-- Main Menu End -->
               </nav>
               <div class="header-icon d-flex align-items-center">
                  <div class="sis_core_woo_dropdown_cart me-3">
                     <div class="sisf-dropdown-cart-inner">
                        <a href="cart.html" class="sisf-m-opener">
                        <span class="sisf-m-opener-icon">
                        <i class="fa-solid fa-cart-shopping"></i>
                        </span>
                        <span class="sisf-m-opener-count">2</span>
                        </a>
                        <div class="sisf-dropdown-cart-content">
                           <p class="sisf-m-posts-not-found d-none">No products in the cart.</p>
                           <ul class="sisf-mini-cart">
                              <li class="sisf-mini-cart-item d-flex align-items-center">
                                 <div class="sisf-e-image me-3">
                                    <figure class="image-anime reveal"> 
                                       <img src="{{asset('asset/images/product1.png')}}" alt="Pawly">
                                    </figure>
                                 </div>
                                 <div class="sisf-e-content pe-4">
                                    <h4 class="sisf-e-title mb-2">Dog Harness</h4>
                                    <span class="product-price-amount">1 X <span class="product-price-currencysymbol">$</span>49.00</span>
                                 </div>
                                 <a href="#" class="remove_from_cart_button"><i class="fa-solid fa-xmark"></i></a>
                              </li>
                              <li class="sisf-mini-cart-item d-flex align-items-center">
                                 <div class="sisf-e-image me-3">
                                    <figure class="image-anime reveal"> 
                                       <img src="{{asset('asset/images/product2.png')}}" alt="Pawly">
                                    </figure>
                                 </div>
                                 <div class="sisf-e-content pe-4">
                                    <h4 class="sisf-e-title mb-2">Dog Cushion</h4>
                                    <span class="product-price-amount">1 X <span class="product-price-currencysymbol">$</span>48.00</span>
                                 </div>
                                 <a href="#" class="remove_from_cart_button"><i class="fa-solid fa-xmark"></i></a>
                              </li>
                           </ul>
                           <div class="sisf-m-order-details d-flex align-items-center py-3 justify-content-between">
                              <strong class="sisf-m-order-label">Sub total:</strong><span class="price-amount"><span class="price-currencysymbol">$</span>97.00</span>
                           </div>
                           <div class="sisf-m-action d-flex justify-content-between gap-4">
                              <a href="cart.html" class="btn-default">View Cart</a>
                              <a href="checkout.html" class="btn-default btn-default-rev">Checkout</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="header-favorite-icon mx-3">
                     <a href="#"> 
                        <i class="fa-regular fa-heart"></i>
                     </a>
                     <span class="sisf-m-opener-count">0</span>
                  </div>
                  <div class="user-icon mx-3">
                  
                  @if(!auth()->check())
                      <span class="sisf-shortcode sisf-m  sisf-icon-holder sisf-size--default sisf-layout--normal">			
                     <a href="{{route('formLogin')}}">		
                     <span class="sisf-icon-dripicons dripicons-user sisf-icon sisf-e">
                     <i class="fa-regular fa-user"></i>
                     </span>			
                     </a>	
                     </span>
                     
                  @else
                      <span class="sisf-shortcode sisf-m  sisf-icon-holder sisf-size--default sisf-layout--normal">			
                     <a href="#">		
                     <span class="sisf-icon-dripicons dripicons-user sisf-icon sisf-e">
                     <i class="fa-regular fa-user"></i>
                     </span>			
                     </a>	
                     </span>
                  @endif

                    
                     
                  </div>
                  <div class="sisf-icon-list-item ms-3">
                     <div class="search-container">
                        <input type="text" class="search-input" placeholder="Search...">
                        <button class="search-btn">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="navbar-toggle"></div>
            <div class="responsive-menu"></div>
         </div>
      </header>