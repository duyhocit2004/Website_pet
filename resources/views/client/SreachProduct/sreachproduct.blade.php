@extends('client.index2')

@section('banner')
    <div class="sisf-banner position-relative">
        <div class="banner-img">
            <figure>
                <img src="{{asset('asset/images/shop_hero_img.png')}}" alt="Pawly">
            </figure>
        </div>
        <div class="sisf-page-title sisf-m sisf-title--standard sisf-alignment--center">
            <div class="sisf-m-inner">
                <div class="sisf-m-content sisf-content-grid ">
                    <h1 class="sisf-m-title entry-title">Tìm kiếm sản phẩm</h1>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('main2')
    <div class="sisf-product-list border-0 p-0">
        <div class="row" id="product">
            <!-- Product-Item Start -->
            <!-- Product-Item End -->
        </div>
@endsection

    @section('js')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {

                filterProducts();

                $('.page_link').on('click', function (e) {
                    e.preventDefault();
                    let page = $(this).Data('page');
                    filterProducts(page);
                })

                $('.form-check-input').on('input', function () {
                    filterProducts();
                });

                $('.orderby').on('change', function () {
                    filterProducts();
                });

                function filterProducts(page = 1) {
                    let selectedCategories = [];
                    let sort = $('.orderby').val();
                    console.log(selectedCategories, sort);
                    $('.category-filter:checked').each(function () {
                        selectedCategories.push($(this).val());
                    });

                    return $.ajax({
                        url: 'http://127.0.0.1:8000/api/Sreachproduct',
                        method: "GET",
                        data: {
                            sort: sort,
                            selectedCategories: selectedCategories,
                            page: page
                        },
                        success: function (res) {
                            console.log("Dữ liệu trả về:", res.Data);
                            renderproduct(res.Data.data);
                            renderPagination(res.Data); // vẽ lại nút trang mới
                        },
                        error: function (error) {
                            console.log("lỗi" + error)
                        }
                    })

                }

                function renderproduct(data) {
                    console.log(data)
                    let html = '';

                    data.forEach(e => {
                        html += `<div class="col-lg-4 col-md-6">
                                        <div class="product">
                                            <div class="sisf-product-inner sisf-e-inner">
                                                <div class="sisf-product-image">
                                                    <a href="shop-single.html">
                                                        <figure>
                                                            <img src="${e.image}" class="image-fluid" alt="${e.name}">
                                                        </figure>
                                                    </a>
                                                    <div class="heart-icon">
                                                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                                                    </div>
                                                    <div class="sisf-m-button cart-icon-button text-center">
                                                        <a href="cart.html"
                                                           class="product_type_simple btn-default sisf-layout-filled add_to_cart_button">
                                                           <span><i class="fa-solid fa-cart-shopping me-2"></i> Add to cart</span>
                                                        </a>
                                                    </div>
                                                </div>
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
                                                        <a class="sisf-e-product-title-link shop-product" href="shop-single.html">${e.name}</a>
                                                    </h5>
                                                    <div class="sisf-product-price price">
                                                        <span class="product-price-amount"><sup></sup>${e.GiaMin}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;

                    });
                    return $('#product').html(html);
                }
                function renderPagination(paginationData) {
                    let html = '';
                    const currentPage = paginationData.current_page;
                    const lastPage = paginationData.last_page;

                    if (currentPage > 1) {
                        html += `<li><a href="#" class="page-link" data-page="${currentPage - 1}"><i class="fa-solid fa-arrow-left"></i></a></li>`;
                    }

                    for (let i = 1; i <= lastPage; i++) {
                        if (i === currentPage) {
                            html += `<li class="active"><a href="#">${i}</a></li>`;
                        } else {
                            html += `<li><a href="#" class="page-link" data-page="${i}">${i}</a></li>`;
                        }
                    }

                    if (currentPage < lastPage) {
                        html += `<li><a href="#" class="page-link" data-page="${currentPage + 1}"><i class="fa-solid fa-arrow-right"></i></a></li>`;
                    }

                    $('.pagination').html(html);
                }

            });

        </script>
    @endsection