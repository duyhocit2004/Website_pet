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
            <h1 class="sisf-m-title entry-title">Về chúng tôi</h1>
          </div>
        </div>
      </div>
   </div>
@endsection
@section('main2')
   <!-- About Pet Care Section Start -->
      <div class="about-pet-care section">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-md-2">
                    <div class="sisf-m-button text-center wow fadeInLeft my-4">
                        <a href="contact.html" class="btn-default sisf-hover-reveal">Về chúng tôi</a>
                     </div>
                </div>
                <div class="col-md-8">
                    <!-- Section Title Start -->
                  <div class="sisf-sis-section-title text-center section-title wow zoomIn">
                    <h2 class="sisf-m-title">
                        Chăm sóc thú cưng tận tâm cho người bạn lông lá của bạn mỗi ngày, cả ngày!<i class="fa fa-paw"> </i>	
                    </h2>
                    <div class="sisf-m-text">
                        <p>Sự kiện dành cho chúng ta bây giờ và Leo thúc giục họ cũng phải đứng ở đó hoặc do đó khiêm tốn này. Sự kiện dành cho chúng ta bây giờ và Leo thúc giục họ cũng phải đứng ở đó hoặc do đó khiêm tốn này.</p>
                    </div>
                 </div>
                 <!-- Section Title End -->
                </div>
                <div class="col-md-2">
                    <div class="wow fadeInRight text-center my-4">
                        <figure>
                            <img src="{{asset('asset/images/abt-top.png')}}" alt="Pawly">
                        </figure>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="wow fadeInLeft">
                            <figure>
                                <img src="{{asset('asset/images/abt_img1.png')}}" alt="Pawly">
                            </figure>
                        </div> 
                    </div>
                    <div class="col-md-4">
                        <div class="wow zoomIn">
                            <figure>
                                <img src="{{asset('asset/images/abt_img2.png')}}" alt="Pawly">
                            </figure>
                        </div> 
                    </div>
                    <div class="col-md-4">
                        <div class="wow fadeInRight">
                            <figure>
                                <img src="{{asset('asset/images/abt_img3.png')}}" alt="Pawly">
                            </figure>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- About Pet Care Section End -->
      <!-- Best Product Section Start -->
      <div class="best-products section position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Title Start -->
                  <div class="sisf-sis-section-title text-center section-title wow zoomIn">
                    <h2 class="sisf-m-title">
                        Chúng tôi cung cấp những điều tốt nhất<br>Sản phẩm dành cho thú cưng của bạn<i class="fa fa-paw"> </i>	
                    </h2>
                  </div>
                 <!-- Section Title End -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="wow fadeInLeft text-center mb-4">
                        <figure>
                            <img src="{{asset('asset/images/abt-gromming.png')}}" alt="Pawly">
                        </figure>
                        <div class="box-content">
                            <h5 class="box-title">Chải chuốt</h5>
                        </div>
                    </div> 
                    <div class="wow fadeInLeft text-center mb-4">
                        <figure>
                            <img src="{{asset('asset/images/abt-pet_accessories.png')}}" alt="Pawly">
                        </figure>
                        <div class="box-content">
                            <h5 class="box-title">Phụ kiện vệ sinh</h5>
                        </div>
                    </div> 
                    <div class="wow fadeInLeft text-center">
                        <figure>
                            <img src="{{asset('asset/images/abt-training_camp.png')}}" alt="Pawly">
                        </figure>
                        <div class="box-content">
                            <h5 class="box-title">Trại huấn luyện</h5>
                        </div>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="wow zoomIn text-center position-relative">
                        <figure>
                            <img src="{{asset('asset/images/abt-we_are.png')}}" alt="Pawly">
                        </figure>

                        <div class="about-center-img-1">
                            <figure>
                                <img src="{{asset('asset/images/abt-we_are_graphic1.png')}}" alt="Pawly">
                            </figure>
                        </div>
                        <div class="about-center-img-2">
                            <figure>
                                <img src="{{asset('asset/images/abt-we_are_graphic2.png')}}" alt="Pawly">
                            </figure>
                        </div>
                        <div class="about-center-img-3">
                            <figure>
                                <img src="{{asset('asset/images/abt-we_are_graphic3.png')}}" alt="Pawly">
                            </figure>
                        </div>
                        <div class="about-center-img-4">
                            <figure>
                                <img src="{{asset('asset/images/abt-we_are_graphic4.png')}}" alt="Pawly">
                            </figure>
                        </div>
                    </div> 
                </div>
                <div class="col-md-3 d-flex flex-column align-con justify-content-between">
                        <div class="wow fadeInRight text-center">
                            <figure>
                                <img src="{{asset('asset/images/abt-hygiene.png')}}" alt="Pawly">
                            </figure>
                            <div class="box-content mt-3">
                                <h5 class="box-title">Chăm sóc vệ sinh</h5>
                            </div>
                        </div>
                        <div class="wow fadeInRight text-center">
                            <figure>
                                <img src="{{asset('asset/images/abt-hygiene1.png')}}" alt="Pawly">
                            </figure>
                        </div> 
                </div>
            </div>
        </div>
      </div>
      <!-- Best Product Section End -->
       <!-- Partners Logo Section Start -->
      <div class="partner-logo section">
        <div class="container-fluid">
           <div class="row p-0">
              <div class="partener-logo-slider">
                 <div class="swiper d-flex justify-content-center">
                    <div class="swiper-wrapper">
                       <div class="swiper-slide wow fadeInUp">
                          <div class="logo-images">
                             <div class="logo-light-img">
                                <figure>
                                   <img src="{{asset('asset/images/partner_logo1_1.png')}}" class="w-100" alt="Pawly">
                                </figure>
                             </div>
                             <div class="logo-dark-img">
                                <figure>
                                   <img src="{{asset('asset/images/partner_logo1.png')}}" class="w-100" alt="Pawly">
                                </figure>
                             </div>
                          </div>
                       </div>
                       <div class="swiper-slide wow fadeInUp">
                          <div class="logo-images">
                             <div class="logo-light-img">
                                <figure>
                                   <img src="{{asset('asset/images/partner_logo2_2.png')}}" class="w-100" alt="Pawly">
                                </figure>
                             </div>
                             <div class="logo-dark-img">
                                <figure>
                                   <img src="{{asset('asset/images/partner_logo2.png')}}" class="w-100" alt="Pawly">
                                </figure>
                             </div>
                          </div>
                       </div>
                       <div class="swiper-slide wow fadeInUp">
                          <div class="logo-images">
                             <div class="logo-light-img">
                                <figure>
                                   <img src="{{asset('asset/images/partner_logo3_3.png')}}" class="w-100" alt="Pawly">
                                </figure>
                             </div>
                             <div class="logo-dark-img">
                                <figure>
                                   <img src="{{asset('asset/images/partner_logo3.png')}}" class="w-100" alt="Pawly">
                                </figure>
                             </div>
                          </div>
                       </div>
                       <div class="swiper-slide wow fadeInUp">
                          <div class="logo-images">
                             <div class="logo-light-img">
                                <figure>
                                   <img src="{{asset('asset/images/partner_logo4_4.png')}}" class="w-100" alt="Pawly">
                                </figure>
                             </div>
                             <div class="logo-dark-img">
                                <figure>
                                   <img src="{{asset('asset/images/partner_logo4.png')}}" class="w-100" alt="Pawly">
                                </figure>
                             </div>
                          </div>
                       </div>
                       <div class="swiper-slide wow fadeInUp">
                          <div class="logo-images">
                             <div class="logo-light-img">
                                <figure>
                                   <img src="{{asset('asset/images/partner_logo5_5.png')}}" class="w-100" alt="Pawly">
                                </figure>
                             </div>
                             <div class="logo-dark-img">
                                <figure>
                                   <img src="{{asset('asset/images/partner_logo5.png')}}" class="w-100" alt="Pawly">
                                </figure>
                             </div>
                          </div>
                       </div>
                       <div class="swiper-slide wow fadeInUp">
                          <div class="logo-images">
                             <div class="logo-light-img">
                                <figure>
                                   <img src="{{asset('asset/images/partner_logo6_6.png')}}" class="w-100" alt="Pawly">
                                </figure>
                             </div>
                             <div class="logo-dark-img">
                                <figure>
                                   <img src="{{asset('asset/images/partner_logo6.png')}}" class="w-100" alt="Pawly">
                                </figure>
                             </div>
                          </div>
                       </div>
                       <div class="swiper-slide wow fadeInUp">
                          <div class="logo-images">
                             <div class="logo-light-img">
                                <figure>
                                   <img src="{{asset('asset/images/partner_logo7_7.png')}}" class="w-100" alt="Pawly">
                                </figure>
                             </div>
                             <div class="logo-dark-img">
                                <figure>
                                   <img src="{{asset('asset/images/partner_logo7.png')}}" class="w-100" alt="Pawly">
                                </figure>
                             </div>
                          </div>
                       </div>
                       <div class="swiper-slide wow fadeInUp">
                          <div class="logo-images">
                             <div class="logo-light-img">
                                <figure>
                                   <img src="{{asset('asset/images/partner_logo8_8.png')}}" class="w-100" alt="Pawly">
                                </figure>
                             </div>
                             <div class="logo-dark-img">
                                <figure>
                                   <img src="{{asset('asset/images/partner_logo8.png')}}" class="w-100" alt="Pawly">
                                </figure>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!-- Partners Logo Section End -->
      <!-- Full Width Image Slider Start -->
      <div class="full-width-image-gallery">
         <div class="container-fluid">
            <div class="full-width-image-slider">
               <div class="swiper">
                     <div class="swiper-wrapper">
                        <div class="swiper-slide">
                           <div class="row">
                             <div class="col-6">
                                <div class="image-with-content">
                                    <div class="sisf-e-image-holder">
                                        <figure>
                                            <img src="{{asset('asset/images/hm5-big-gallery-1.png')}}" alt="Pawly">
                                        </figure>
                                    </div>
                                    <div class="text-on-image">
                                       <div class="title text-white mb-3">
                                          <h1>Don Felinos</h1>
                                       </div>
                                       <div class="sisf-m-text text-white">
                                          <p>Vào thời cổ đại, mèo được tôn thờ như thần linh <br> họ không quên điều này.</p>
                                       </div>
                                    </div>
                                </div>
                                <div class="image-with-content">
                                    <div class="sisf-e-image-holder">
                                        <figure>
                                            <img src="{{asset('asset/images/hm5-big-gallery-4.png')}}" alt="Pawly">
                                        </figure>
                                    </div>
                                    <div class="text-on-image">
                                       <div class="title text-white mb-3">
                                          <h1>Ông Paw</h1>
                                       </div>
                                       <div class="sisf-m-text text-white">
                                          <p>Đàn ông trông giống như gấu trúc khi họ cố gắng trang điểm.</p>
                                       </div>
                                    </div>
                                </div>
                             </div>
                             <div class="col-6">
                                <div class="image-with-content">
                                    <div class="sisf-e-image-holder">
                                        <figure>
                                            <img src="{{asset('asset/images/hm5-big-gallery-2.png')}}" alt="Pawly">
                                        </figure>
                                    </div>
                                    <div class="text-on-image">
                                       <div class="title text-white mb-3">
                                          <h1>Ngài Doge</h1>
                                       </div>
                                       <div class="sisf-m-text text-white">
                                          <p>Ngoài chó ra, sách là người bạn tốt nhất của con người. Nhưng bên trong chó, trời quá tối để đọc.</p>
                                       </div>
                                    </div>
                                </div>
                                <div class="image-with-content">
                                    <div class="sisf-e-image-holder">
                                        <figure>
                                            <img src="{{asset('asset/images/hm5-big-gallery-3.png')}}" alt="Pawly">
                                        </figure>
                                    </div>
                                    <div class="text-on-image">
                                       <div class="title text-white mb-3">
                                          <h1>Ông Paw</h1>
                                       </div>
                                       <div class="sisf-m-text text-white">
                                          <p>Đàn ông trông giống như gấu trúc khi họ cố gắng trang điểm.</p>
                                       </div>
                                    </div>
                                </div>
                             </div>
                           </div> 
                        </div>
                        <div class="swiper-slide">
                           <div class="row">
                              <div class="col-5">
                                 <div class="image-with-content">
                                    <div class="sisf-e-image-holder">
                                          <figure>
                                             <img src="{{asset('asset/images/hm5-big-gallery-5.png')}}" alt="Pawly">
                                          </figure>
                                    </div>
                                    <div class="text-on-image">
                                       <div class="title text-white mb-3">
                                          <h1>Ngài Doge</h1>
                                       </div>
                                       <div class="sisf-m-text text-white">
                                          <p>Ngoài chó ra, sách là người bạn tốt nhất của con người. Nhưng bên trong chó, trời quá tối để đọc.</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="image-with-content">
                                    <div class="sisf-e-image-holder">
                                          <figure>
                                             <img src="{{asset('asset/images/hm5-big-gallery-6.png')}}" alt="Pawly">
                                          </figure>
                                    </div>
                                    <div class="text-on-image">
                                       <div class="title text-white mb-3">
                                          <h1>Ông Paw</h1>
                                       </div>
                                       <div class="sisf-m-text text-white">
                                          <p>Đàn ông trông giống như gấu trúc khi họ cố gắng trang điểm.
</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-7">
                                 <div class="image-full-content">
                                    <div class="sisf-e-image-holder">
                                          <figure>
                                             <img src="{{asset('asset/images/hm5-big-gallery-7.png')}}" class="single-image w-100" alt="Pawly">
                                          </figure>
                                    </div>
                                    <div class="text-on-image">
                                       <div class="title text-white mb-3">
                                          <h1>Don Felinos</h1>
                                       </div>
                                       <div class="sisf-m-text text-white">
                                          <p>Vào thời cổ đại, mèo được tôn thờ như thần linh <br>họ không quên điều này.</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div> 
                        </div>
                        <div class="swiper-slide">
                           <div class="row">
                             <div class="col-7">
                                <div class="image-full-content">
                                    <div class="sisf-e-image-holder">
                                        <figure>
                                            <img src="{{asset('asset/images/hm5-big-gallery-8.png')}}" class="single-image w-100" alt="Pawly">
                                        </figure>
                                    </div>
                                    <div class="text-on-image">
                                       <div class="title text-white mb-3">
                                          <h1>Don Felinos</h1>
                                       </div>
                                       <div class="sisf-m-text text-white">
                                          <p>Ngày xưa mèo được tôn thờ như thần linh <br> và họ không quên điều này.</p>
                                       </div>
                                    </div>
                                </div>
                             </div>
                             <div class="col-5">
                                <div class="image-with-content">
                                    <div class="sisf-e-image-holder">
                                        <figure>
                                            <img src="{{asset('asset/images/hm5-big-gallery-9.png')}}" alt="Pawly">
                                        </figure>
                                    </div>
                                    <div class="text-on-image">
                                       <div class="title text-white mb-3">
                                          <h1>Ngài Doge</h1>
                                       </div>
                                       <div class="sisf-m-text text-white">
                                         <p>Ngoài chó ra, sách là người bạn tốt nhất của con người. Nhưng bên trong chó, trời quá tối để đọc.</p>
                                       </div>
                                    </div>
                                </div>
                                <div class="image-with-content">
                                    <div class="sisf-e-image-holder">
                                        <figure>
                                            <img src="{{asset('asset/images/hm5-big-gallery-10.png')}}" alt="Pawly">
                                        </figure>
                                    </div>
                                    <div class="text-on-image">
                                       <div class="title text-white mb-3">
                                          <h1>Ông Paw</h1>
                                       </div>
                                       <div class="sisf-m-text text-white">
                                         <p>Đàn ông trông giống như gấu trúc khi họ cố gắng trang điểm.</p>
                                       </div>
                                    </div>
                                </div>
                             </div>
                           </div> 
                        </div>
                     </div>
                      <!-- Navigation Arrows -->
                     <div class="swiper-button-prev charvolen-left"></div>
                     <div class="swiper-button-next charvolen-right"></div>
               </div>
            </div>
         </div>
      </div>
      <!-- Full Width Image Slider End -->
      <!-- Our Team Section Start -->
      <div class="our-team-section ours-team section mb-0">
        <div class="container-fluid px-5">
           <div class="row">
              <div class="col-6 ms-auto me-auto">
                 <!-- Section Title Start -->
                 <div class="sisf-sis-section-title section-title text-center animated fadeInDown">
                    <h2 class="sisf-m-title mb-0">
                        Gặp gỡ đội ngũ xinh đẹp của chúng tôi<i class="fa fa-paw"> </i>	
                    </h2>
                    <div class="sis-m-text">
                        <p class="mb-0">Đội ngũ năng động và đa năng, gắn kết bởi năng lực và chuyên môn vượt trội trong nhiều lĩnh vực. Dù là giải quyết những thách thức phức tạp, đưa ra các giải pháp sáng tạo hay đạt được những mục tiêu đầy tham vọng, Skillful Squad luôn là một tập thể đoàn kết, vững mạnh</p>
                    </div>
                 </div>
                 <!-- Section Title End -->
              </div>
           </div>
           <div class="row">
              <div class="col-lg-3 col-md-6">
                 <div class="sis-team-member sisf-item-layout--info-below wow zoomIn">
                    <div class="team-members-img">
                       <figure>
                          <img src="{{asset('anhcanhan/anh1.jpg')}}" alt="Pawly">
                       </figure>
                    </div>
                    <div class="team-member-content">
                       <h4 class="sisf-m-title">Hoàng Quốc Duy</h4>
                       <p class="sisf-m-role">Người đồng sáng lập</p>
                       <div class="social-icons">
                          <a href="#"> <i class="fa-brands fa-facebook"></i></a>
                          <a href="#"> <i class="fa-brands fa-x-twitter"></i></a>
                          <a href="#"> <i class="fa-brands fa-linkedin-in"></i></a>
                          <a href="#"> <i class="fa-brands fa-instagram"></i></a>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="col-lg-3 col-md-6">
                 <div class="sis-team-member sisf-item-layout--info-below wow zoomIn">
                    <div class="team-members-img">
                       <figure>
                          <img src="{{asset('anhcanhan/anh2.jpg')}}" alt="Pawly">
                       </figure>
                    </div>
                    <div class="team-member-content">
                       <h4 class="sisf-m-title">Nguyễn Quốc Cường</h4>
                       <p class="sisf-m-role">CEO</p>
                       <div class="social-icons">
                          <a href="#"> <i class="fa-brands fa-facebook"></i></a>
                          <a href="#"> <i class="fa-brands fa-x-twitter"></i></a>
                          <a href="#"> <i class="fa-brands fa-linkedin-in"></i></a>
                          <a href="#"> <i class="fa-brands fa-instagram"></i></a>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="col-lg-3 col-md-6">
                 <div class="sis-team-member sisf-item-layout--info-below wow zoomIn">
                    <div class="team-members-img">
                       <figure>
                          <img src="{{asset('anhcanhan/anh3.jpg')}}" alt="Pawly">
                       </figure>
                    </div>
                    <div class="team-member-content">
                       <h4 class="sisf-m-title">Nguyễn Chính</h4>
                       <p class="sisf-m-role">Quản lý trực tiếp</p>
                       <div class="social-icons">
                          <a href="#"> <i class="fa-brands fa-facebook"></i></a>
                          <a href="#"> <i class="fa-brands fa-x-twitter"></i></a>
                          <a href="#"> <i class="fa-brands fa-linkedin-in"></i></a>
                          <a href="#"> <i class="fa-brands fa-instagram"></i></a>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="col-lg-3 col-md-6">
                 <div class="sis-team-member sisf-item-layout--info-below wow zoomIn">
                    <div class="team-members-img">
                       <figure>
                          <img src="{{asset('anhcanhan/anh4.jpg')}}" alt="Pawly">
                       </figure>
                    </div>
                    <div class="team-member-content">
                       <h4 class="sisf-m-title">Lê Đình Chính</h4>
                       <p class="sisf-m-role">Nhân viên bán hàng</p>
                       <div class="social-icons">
                          <a href="#"> <i class="fa-brands fa-facebook"></i></a>
                          <a href="#"> <i class="fa-brands fa-x-twitter"></i></a>
                          <a href="#"> <i class="fa-brands fa-linkedin-in"></i></a>
                          <a href="#"> <i class="fa-brands fa-instagram"></i></a>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!-- Our Team Section End -->
      <!-- Testimonial Section Start -->
      <div class="testimonial-section section">
        <div class="container">
           <div class="row align-items-center">
              <div class="col-md-6"></div>
              <div class="col-md-6">
                 <div class="sisf-testimonials-slider animated fadeInRight">
                    <div class="swiper">
                       <div class="swiper-wrapper">
                          <div class="testimonial-slide swiper-slide">
                             <div class="sisf-e-inner bg-black">
                                <div class="sisf-e-content">
                                   <div class="sisf-e-media-image">
                                      <img src="{{asset('asset/images/profile1.png')}}" alt="Pawly">	
                                   </div>
                                   <div class="sisf-e-quote mb-4 text-end">
                                      <i class="fa-solid fa-quote-right"></i>
                                   </div>
                                   <p class="sisf-e-text text-white">Website Tiện lợi áp dụng nhiều chức năng với nhau</p>
                                </div>
                                <div class="sisf-e-bottom">
                                   <div class="info">
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
                                      <div class="sisf-e-author">
                                         <h5 class="sisf-e-client-name">Nguyễn phương</h5>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                          <div class="testimonial-slide swiper-slide">
                             <div class="sisf-e-inner bg-black">
                                <div class="sisf-e-content">
                                   <div class="sisf-e-media-image">
                                      <img src="{{asset('asset/images/profile2.png')}}" alt="Pawly">	
                                   </div>
                                   <div class="sisf-e-quote mb-4 text-end">
                                      <i class="fa-solid fa-quote-right"></i>
                                   </div>
                                   <p class="sisf-e-text text-white">Tôi cảm thấy website này quá tuyệt vời và tôi muốn trải nghiệm lại nhiều hơn</p>
                                </div>
                                <div class="sisf-e-bottom">
                                   <div class="info">
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
                                      <div class="sisf-e-author">
                                         <h5 class="sisf-e-client-name">NGuyenx thịnh</h5>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                          <div class="testimonial-slide swiper-slide">
                             <div class="sisf-e-inner bg-black">
                                <div class="sisf-e-content">
                                   <div class="sisf-e-media-image">
                                      <img src="{{asset('asset/images/profile3.png')}}" alt="Pawly">	
                                   </div>
                                   <div class="sisf-e-quote mb-4 text-end">
                                      <i class="fa-solid fa-quote-right"></i>
                                   </div>
                                   <p class="sisf-e-text text-white">Ứng dụng này thật tuyệt nó khiến tôi đang ở thành phố chó với đầy trải nghiệm thú vị</p>
                                </div>
                                <div class="sisf-e-bottom">
                                   <div class="info">
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
                                      <div class="sisf-e-author">
                                         <h5 class="sisf-e-client-name">Nam định</h5>
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
     </div>
     <!-- Testimonial Section End -->
      <!-- Frequently Asked Section Start -->
      <div class="sisf-faq-section section sisf-extended-grid sisf-extended-grid--right">
        <div class="container pe-0">
           <div class="row align-items-center">
              <div class="col-md-6">
                 <div class="sisf-accordian wow fadeInLeft">
                    <div class="accordion shadow-none" id="faqAccordion">
                        <!-- Accordion Item Start-->
                        <div class="accordion-item-1">
                            <h3 class="accordion-header">
                                <button class="accordion-button accordion-btn-1 border-0" data-bs-toggle="collapse" data-bs-target="#faqOne" aria-expanded="true">
                                    <span> Các công thức nấu ăn này có phù hợp với người mới bắt đầu không?</span>
                                </button>
                            </h3>
                            <div id="faqOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body pt-4">
                                    <div class="sisf-e-content-inner">
                                        <p class="mb-0">Vâng, chúng tôi cung cấp các công thức nấu ăn phù hợp với mọi trình độ, kể cả người mới bắt đầu. Mỗi công thức đều có hướng dẫn rõ ràng, mẹo nhỏ và đôi khi có cả video hướng dẫn chi tiết để giúp bạn nấu ăn thành công, bất kể kinh nghiệm nấu nướng của bạn.</p>	
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion Item End-->
                        
                        <!-- Accordion Item Start-->
                        <div class="accordion-item-2 border-0">
                            <h3 class="accordion-header">
                                <button class="accordion-button accordion-btn-2 border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#faqtwo">
                                    <span>Tôi có thể tìm thấy những công thức nấu ăn nào trên trang web của bạn?</span>
                                </button>
                            </h3>
                            <div id="faqtwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body pt-4">
                                    <div class="sisf-e-content-inner">
                                        <p class="mb-0">Trang web của chúng tôi cung cấp đa dạng các công thức nấu ăn phù hợp với nhiều khẩu vị và sở thích ăn uống khác nhau. Bạn có thể tìm thấy mọi thứ, từ những bữa ăn nhanh chóng, dễ dàng đến các món ăn cao cấp, các lựa chọn chay và thuần chay, công thức nấu ăn lành mạnh, món ăn dễ làm, và nhiều hơn nữa.</p>	
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion Item End-->
                
                        <!-- Accordion Item Start-->
                        <div class="accordion-item-3 border-0">
                            <h3 class="accordion-header">
                                <button class="accordion-button accordion-btn-3 border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#faqthree">
                                    <span>Bạn có cung cấp mẹo và kỹ thuật nấu ăn không?</span>
                                </button>
                            </h3>
                            <div id="faqthree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body pt-4">
                                    <div class="sisf-e-content-inner">
                                        <p class="mb-0">Vâng, ngoài công thức nấu ăn, chúng tôi còn cung cấp các mẹo, kỹ thuật và hướng dẫn nấu ăn hữu ích để nâng cao kỹ năng nấu nướng của bạn. Cho dù bạn muốn thành thạo các phương pháp nấu ăn cơ bản hay học các kỹ thuật nâng cao, trang web của chúng tôi là một nguồn tài nguyên quý giá cho những người nấu ăn tại nhà ở mọi trình độ..</p>	
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion Item End-->
                
                        <!-- Accordion Item Start-->
                        <div class="accordion-item-4 border-0">
                            <h3 class="accordion-header">
                                <button class="accordion-button accordion-btn-4 border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#faqfour">
                                    <span>Tôi có thể yêu cầu công thức hoặc nguyên liệu cụ thể không?</span>
                                </button>
                            </h3>
                            <div id="faqfour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body pt-4">
                                    <div class="sisf-e-content-inner">
                                        <p class="mb-0">Hoàn toàn đồng ý! Chúng tôi hoan nghênh các yêu cầu công thức và đề xuất từ người dùng. Nếu bạn muốn giới thiệu một món ăn hoặc nguyên liệu cụ thể nào đó trên trang web của chúng tôi, vui lòng liên hệ với chúng tôi qua trang liên hệ hoặc các kênh mạng xã hội. Chúng tôi sẽ cố gắng hết sức để đáp ứng yêu cầu của bạn.</p>	
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion Item End-->  
                        <!-- Accordion Item Start-->
                        <div class="accordion-item-5 border-0">
                            <h3 class="accordion-header">
                                <button class="accordion-button accordion-btn-5 border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#faqfive">
                                    <span>Chúng tôi chấp nhận những phương thức thanh toán nào?</span>
                                </button>
                            </h3>
                            <div id="faqfive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body pt-4">
                                    <div class="sisf-e-content-inner">
                                        <p class="mb-0">Hoàn toàn đồng ý! Chúng tôi hoan nghênh các yêu cầu công thức và đề xuất từ người dùng. Nếu bạn muốn giới thiệu một món ăn hoặc nguyên liệu cụ thể nào đó trên trang web của chúng tôi, vui lòng liên hệ với chúng tôi qua trang liên hệ hoặc các kênh mạng xã hội. Chúng tôi sẽ cố gắng hết sức để đáp ứng yêu cầu của bạn.</p>	
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion Item End-->                       
                    </div> 
                </div>
                
              </div>
              <div class="col-md-6">
                <!-- Section Title Start -->
                <div class="sisf-sis-section-title section-title wow zoomIn">
                    <h2 class="sisf-m-title">
                        Câu hỏi <br> thường gặp <i class="fa fa-paw"> </i>	
                    </h2>
                 </div>
                 <!-- Section Title End -->
                 <div class="wow fadeInRight">
                    <figure>
                        <img src="{{asset('asset/images/faq.png')}}" class="animate-hover" alt="Pawly">
                     </figure>
                 </div>
              </div>
           </div>
        </div>
      </div>
     <!-- Frequently Asked Section End -->
@endsection

