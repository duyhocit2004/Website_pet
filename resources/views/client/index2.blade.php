
<!DOCTYPE html>
<html lang="zxx">
   
<!-- Mirrored from pawly-html.wpthemeverse.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 May 2025 03:36:33 GMT -->
<head>
      <!-- Meta -->
      @include('client.layout.head')
   </head>
   <body>
      <!-- Header New Start -->
      @include('client.layout.header')
      <!-- Header New End --> 
      <!-- Owner Paradise Section Start -->
      @yield('banner')
   
      <!-- Banner Section End -->
      <!-- Page-Section Start -->
      <div class="sisf-page-section section">
         <div class="sisf-grid sisf-layout--template">
            <div class="sisf-grid-inner container">
               <div class="row">
                  <div class="col-md-3">
                     <div class="sisf-page-sidebar">
                        <!-- Product Categories Start -->
                        <div class="sidebar-widget widget_categories filter-section">
                           <div class="filter-header sidebar-title">Filter by:</div>
                           <div class="filter-category d-flex align-items-center justify-content-between" data-bs-toggle="collapse" data-bs-target="#category-list" role="button" aria-expanded="true">
                              <span>Category</span>
                              <span><i class="fas fa-chevron-down custom-toggle-icon"></i></span> <!-- down arrow -->
                           </div>
                           <div class="collapse show" id="category-list">
                              <div class="form-check mt-2">
                                 <input class="form-check-input category-filter" value="2" type="checkbox" id="cat1">
                                 <label class="form-check-label" for="cat1">Chó</label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input category-filter" value="3" type="checkbox" id="cat2">
                                 <label class="form-check-label" for="cat2">Vẹt</label>
                              </div>
                              <div class="form-check hidden-item">
                                 <input class="form-check-input category-filter" value="4" type="checkbox" id="cat3">
                                 <label class="form-check-label" for="cat3">Cá</label>
                              </div>
                              <div class="form-check hidden-item">
                                 <input class="form-check-input category-filter" value="7" type="checkbox" id="cat4">
                                 <label class="form-check-label" for="cat4">Mèo</label>
                              </div>
                              <div class="form-check hidden-item">
                                 <input class="form-check-input category-filter" value="9" type="checkbox" id="cat5">
                                 <label class="form-check-label" for="cat5">Phụ kiện</label>
                              </div>
                              <div class="sisf-m-button view-toggle" id="toggleView">
                                 <span class="toggle-icon fa fa-plus"></span>
                                 <span class="toggle-text">View More</span>
                              </div>
                           </div>
                        </div>
                        <!-- Product Categories End -->
                        <div class="sidebar-separator">
                           <hr class="separator sidebar-line">
                        </div>
                        <!-- Shop By Brand Start -->
                        <div class="sidebar-widget widget_categories filter-section">
                           <div class="filter-category d-flex align-items-center justify-content-between"
                              data-bs-toggle="collapse" data-bs-target="#brand-list" role="button" aria-expanded="true">
                              <span>Brands</span>
                              <span><i class="fas fa-chevron-down custom-toggle-icon-brand"></i></span>
                           </div>
                           <div class="collapse show" id="brand-list">
                              <div class="sisf-e-options-inner mt-2">
                                 <a href="#" class="sisf-label-holder sisf-e-link"><span class="sisf-e-label">Henlo</span></a>
                              </div>
                              <div class="sisf-e-options-inner">
                                 <a href="#" class="sisf-label-holder sisf-e-link"><span class="sisf-e-label">Optimum</span></a>
                              </div>
                              <div class="sisf-e-options-inner hidden-brand">
                                 <a href="#" class="sisf-label-holder sisf-e-link"><span class="sisf-e-label">Oscar</span></a>
                              </div>
                              <div class="sisf-e-options-inner hidden-brand">
                                 <a href="#" class="sisf-label-holder sisf-e-link"><span class="sisf-e-label">Peter World</span></a>
                              </div>
                              <div class="sisf-e-options-inner hidden-brand">
                                 <a href="#" class="sisf-label-holder sisf-e-link"><span class="sisf-e-label">Ruffwear</span></a>
                              </div>
                              <div class="sisf-e-options-inner hidden-brand">
                                 <a href="#" class="sisf-label-holder sisf-e-link"><span class="sisf-e-label">Tunai</span></a>
                              </div>
                              <div class="sisf-m-button view-toggle view-toggle-brand" id="toggleViewBrand">
                                 <span class="toggle-icon-brand fa fa-plus me-1"></span>
                                 <span class="toggle-text-brand">View More</span>
                              </div>
                           </div>
                        </div>
                        <!-- Shop By Brand End -->
                        <div class="sidebar-separator">
                           <hr class="separator sidebar-line">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-9">
                     <div class="sisf-shop-results">
                        <p class="product-result-count">Mỗi trang có 10 sản phẩm</p>
                        <form class="product-ordering" >
                           <select name="orderby" class="orderby" data-minimum-results-for-search="Infinity" aria-label="Shop order" tabindex="-1" aria-hidden="true">
                              <option value="define">Mặc định</option>
                              <option value="lowtohigh">Giá từ thấp đến cao</option>
                              <option value="hightolow">xắp xếp từ cao đến thấp</option>
                              <option value="rating">Theo lượt xao</option>
                           </select>
                           <i class="fas fa-chevron-down custom-toggle-icon"></i>
                        </form>
                     </div>
                     <!-- Product List Start -->
                     @yield('main2')
                    
                        <div class="page-pagination wow fadeInUp">
                           <ul class="pagination page_link">
                              <li><a href="#"><i class="fa-solid fa-arrow-left"></i></a></li>
                              <li class="active"><a href="#">1</a></li>
                              <li><a href="#">2</a></li>
                              <li><a href="#"><i class="fa-solid fa-arrow-right"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <!-- Product List End -->
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Footer Start -->
      @include('client.layout.footer')
      <!-- Footer End -->
      @include('client.layout.js')
   </body>

<!-- Mirrored from pawly-html.wpthemeverse.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 May 2025 03:36:57 GMT -->
</html>