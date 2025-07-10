let api = 'http://127.0.0.1:8000/api/';

const AllBanner = async ()=>{
    const response = await fetch(api+"Allbanner");
    const data = await response.json();
    return data;
}

const AllFeaturedProducts1 = async ()=>{
   const response = await fetch(api+"GetListFeaturedProducts");
   const data = await response.json();
   return data;
}

const ShopbyCategories1 = async ()=>{
   const response = await fetch(api+"ShopbyCategories");
   const data = await response.json();
   return data;
}

const Bannersecondary =  async () =>{
    const response = await fetch(api+"Bannersecondary");
    const data = await response.json();
    return data;
}

window.addEventListener('load',async()=>{
   await Promise.all([
    RenderAllBanner(),
   // GetListFeaturedProducts();
   ShopbyCategories(),
   renderBannerSecondary(),
   ])
 

});


 async function RenderAllBanner(){
    const data = await AllBanner();

    const renderBanner = document.getElementById('AllBanner');

    console.log(data);


    let html = '';
    data.Data.forEach(e =>{
            html +=  `
                    <div class="swiper-slide">
                     <div class="hero-slide hero-video">
                        <div class="hero-bg-video">
                           <!-- Video Start -->
                           <video autoplay="" muted="" loop="" id="Video">
                              <source src="${e.Link_video}" type="video/mp4">
                           </video>
                           <!-- Video End -->
                        </div>
                        <!-- Slider Content Start -->
                        <div class="container">
                           <div class="row align-items-center">
                              <div class="col-12">
                                 <!-- Hero Content Start -->
                                 <div class="hero-content">
                                    <!-- Hero Title Start -->
                                    <div class="section-title">
                                       <h1 class="text-anime-style-2 text-center text-heading wow fadeInUp" data-cursor="-opaque">${e.title}</h1>
                                       <div class="row">
                                          <div class="col-4">
                                             <div class="shop-item my-4">
                                                <figure>
                                                   <img src="{{asset('asset/images/home1_hero_img7.png')}}" class="half-rotate" alt="Pawly">
                                                </figure>
                                                <div class="shop-item--content">
                                                   <h3 class="title">Duck Confit With Cherry<br> Reduction</h3>
                                                   <span>GLUTEN-FREE / DAIRY-FREE / HIGH-PROTEIN</span>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-4">
                                             <div class="shop-item my-4">
                                                <figure>
                                                   <img src="{{asset('asset/images/home1_hero_img8.png')}}" class="half-rotate" alt="Pawly">
                                                </figure>
                                                <div class="shop-item--content">
                                                   <h3 class="title">Duck Confit With Cherry<br> Reduction</h3>
                                                   <span>GLUTEN-FREE / DAIRY-FREE / HIGH-PROTEIN</span>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-4">
                                             <div class="shop-item my-4">
                                                <figure>
                                                   <img src="{{asset('asset/images/home1_hero_img9.png')}}" class="half-rotate" alt="Pawly">
                                                </figure>
                                                <div class="shop-item--content">
                                                   <h3 class="title">Duck Confit With Cherry<br> Reduction</h3>
                                                   <span>GLUTEN-FREE / DAIRY-FREE / HIGH-PROTEIN</span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <p class="text-center ms-auto me-auto">${e.descripton}</p>
                                    </div>
                                    <!-- Hero Title End -->
                                    <!-- Hero Content Body Start -->
                                    <div class="sisf-m-button text-center hero-content-body wow fadeInUp">
                                       <a href="shop.html" class="btn-slider"><span>Mua ngay</span>
                                       </a>
                                    </div>
                                    <!-- Hero Content Body End -->
                                 </div>
                                 <!-- Hero Content End -->
                              </div>
                           </div>
                        </div>
                        <!-- Slider Content End -->
                     </div>
                  </div>
    ` ;
    
    });
   return  renderBanner.innerHTML = html;
}

   async function GetListFeaturedProducts(){
      const data = await AllFeaturedProducts1();
      
   }

   async function ShopbyCategories(){
      const data = await ShopbyCategories1();
      const renderBanner = document.getElementById('Category');

    console.log(data);


    let categories = '';
    data.Data.forEach(e =>{
    
            categories +=  `<div class="swiper-slide">
                           <div class="sisf-e-inner">
                              <div class="sisf-e-content-holder text-center">
                                 <div class="sisf-e-title sisf-item-content">
                                    <h4 class="sisf-e-title">
                                       <a href="shop.html">${e.name}</a>
                                    </h4>
                                 </div>
                                 <div class="sisf-category-button sisf-item-content mb-3">
                                    <a class="sisf-sis-button sisf-text-underline sisf-underline--left " href="shop.html">	
                                    <span class="sisf-m-text">Mua ngay</span>	
                                    </a>	
                                 </div>
                              </div>
                              <div class="sisf-e-images-holder">
                                 <div class="sisf-e-main-image text-center">
                                    <a href="shop.html">
                                    <img src="${e.image}" alt="Pawly">           
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>` ;
    
    });
   return  renderBanner.innerHTML = categories;
   }

   async function renderBannerSecondary(){
      const data = await Bannersecondary();
      console.log(data);
      
      const renderbanner = document.getElementById('renderBannerSecondary');

      renderbanner.innerHTML = data.Data.map((e)=>{
         return ` <div class="row">
               <div class="col-lg-12 col-md-12 p-0">
                  <div class="intro-video-box">
                  
                     <video class="bg-video" autoplay loop muted>
                        <source src="${e.Link_video}" type="video/mp4">
                     </video>
                     <!-- Section Title Start -->  
                     <div class="sisf-sis-section-title section-title content-overlay text-center wow bounce mb-0">
                        <h2 class="sisf-m-title mb-0">
                          ${e.title} <i class="fa fa-paw"> </i>	
                        </h2>
                        <div class="sis-m-text">
                           <p class="text-white">${e.descripton} </p>
                        </div>
                        <div class="sisf-m-button text-center mt-4">
                           <a href="shop.html" class="btn-default sisf-hover-reveal">Mua ngay</a>
                        </div>
                     </div>
                     <!-- Section Title End --> 
                     <div class="wave-img-bottom">
                        <figure>
                           <img src="/asset/images/pawly-Mask-group-white.png" alt="Pawly">	
                        </figure>
                     </div>
                     <div class="wave-img-top">
                        <figure>
                           <img src="/asset/images/pawly-Mask-group-white-top.png" alt="Pawly">	
                        </figure>
                     </div>
                  </div>
               </div>
            </div>`;
      }).join('');
   }




