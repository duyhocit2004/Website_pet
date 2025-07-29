<aside class="page-sidebar" data-sidebar-layout="stroke-svg">
    <div class="left-arrow" id="left-arrow">
        <svg class="feather">
            <use href="https://admin.pixelstrap.net/edmin/assets/svg/feather-icons/dist/feather-sprite.svg#arrow-left">
            </use>
        </svg>
    </div>
    <div id="sidebar-menu">
        <ul class="sidebar-menu" id="simple-bar">
            <li class="pin-title sidebar-list p-0">
                <h5 class="sidebar-main-title">Pinned</h5>
            </li>
            <li class="line pin-line"></li>
            <li class="sidebar-main-title">Chung</li>
            <li class="sidebar-list">
                <svg class="pinned-icon">
                    <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#Pin"></use>
                </svg><a class="sidebar-link" href="javascript:void(0)">
                    <svg class="stroke-icon">
                        <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#Home">
                        </use>
                    </svg><span>bảng điều khiển</span>
                    <div class="badge badge-primary rounded-pill">3</div>
                    <svg class="feather">
                        <use
                            href="https://admin.pixelstrap.net/edmin/assets/svg/feather-icons/dist/feather-sprite.svg#chevron-right">
                        </use>
                    </svg>
                </a>
                <ul class="sidebar-submenu">
                    <li><a href="{{route("homeAdmin")}}">
                            <svg class="svg-menu">
                                <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#right-3">
                                </use>
                            </svg>Thống kê</a></li>
                   
                </ul>
            </li>

            

            <li class="line"> </li>
            <li class="sidebar-main-title">Danh sách</li>
            <li class="sidebar-list">
                <svg class="pinned-icon">
                    <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#Pin"></use>
                </svg><a class="sidebar-link" href="javascript:void(0)">
                    <svg class="stroke-icon">
                        <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#Info-circle">
                        </use>
                    </svg><span> tài khoản</span>
                    <svg class="feather">
                        <use
                            href="https://admin.pixelstrap.net/edmin/assets/svg/feather-icons/dist/feather-sprite.svg#chevron-right">
                        </use>
                    </svg></a>

                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('GetPageUser')}}">
                            <svg class="svg-menu">
                                <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#right-3">
                                </use>
                            </svg>Người dùng</a>
                    </li>
                    <li> <a href="{{route('GetPageStaff')}}">
                            <svg class="svg-menu">
                                <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#right-3">
                                </use>
                            </svg>Nhân viên</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-list">
                <svg class="pinned-icon">
                    <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#Pin"></use>
                </svg><a class="sidebar-link" href="{{route('GetAllProductPaginate')}}">
                    <svg class="stroke-icon">
                        <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#Paper">
                        </use>
                    </svg><span>Sản phẩm</span></a>
            </li>
            <li class="sidebar-list">
                <svg class="pinned-icon">
                    <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#Pin"></use>
                </svg><a class="sidebar-link" href="{{route('GetNetWeight')}}">
                    <svg class="stroke-icon">
                        <use href="">
                        </use>
                    </svg><span>Khối lương sản phẩm</span></a>
            </li>
            <li class="sidebar-list">
                <svg class="pinned-icon">
                    <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#Pin"></use>
                </svg><a class="sidebar-link" href="{{route('GetListCategory')}}">
                    <svg class="stroke-icon">
                        <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#Paper">
                        </use>
                    </svg><span>Thể loại</span></a>
            </li>
            <li class="sidebar-list">
                <svg class="pinned-icon">
                    <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#Pin"></use>
                </svg><a class="sidebar-link" href="javascript:void(0)">
                    <svg class="stroke-icon">
                        <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#Info-circle">
                        </use>
                    </svg><span> Banner</span>
                    <svg class="feather">
                        <use
                            href="https://admin.pixelstrap.net/edmin/assets/svg/feather-icons/dist/feather-sprite.svg#chevron-right">
                        </use>
                    </svg></a>

                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('GetAllBanner')}}">
                            <svg class="svg-menu">
                                <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#right-3">
                                </use>
                            </svg>Danh sách</a>
                    </li>
                    <li>
                        <a href="{{route('FormAddBanner')}}">
                            <svg class="svg-menu">
                                <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#right-3">
                                </use>
                            </svg>Thêm banner</a>
                    </li>

                </ul>
            </li>
            <li class="sidebar-list">
                <svg class="pinned-icon">
                    <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#Pin"></use>
                </svg><a class="sidebar-link" href="javascript:void(0)">
                    <svg class="stroke-icon">
                        <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#Info-circle">
                        </use>
                    </svg><span> Đơn hàng</span>
                    <svg class="feather">
                        <use
                            href="https://admin.pixelstrap.net/edmin/assets/svg/feather-icons/dist/feather-sprite.svg#chevron-right">
                        </use>
                    </svg></a>

                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('GetAllOrder')}}">
                            <svg class="svg-menu">
                                <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#right-3">
                                </use>
                            </svg>Danh sách</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-list">
                <svg class="pinned-icon">
                    <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#Pin"></use>
                </svg><a class="sidebar-link" href="javascript:void(0)">
                    <svg class="stroke-icon">
                        <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#Info-circle">
                        </use>
                    </svg><span> Mã giảm giá</span>
                    <svg class="feather">
                        <use
                            href="https://admin.pixelstrap.net/edmin/assets/svg/feather-icons/dist/feather-sprite.svg#chevron-right">
                        </use>
                    </svg></a>

                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('getAllVoucher')}}">
                            <svg class="svg-menu">
                                <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#right-3">
                                </use>
                            </svg>Danh sách</a>
                    </li>
                    <li>
                        <a href="{{route('FormAddVoucher')}}">
                            <svg class="svg-menu">
                                <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#right-3">
                                </use>
                            </svg>Thêm Phiếu Giảm</a>
                    </li>
                </ul>
            </li>
            <div class="right-arrow" id="right-arrow">
                <svg class="feather">
                    <use
                        href="https://admin.pixelstrap.net/edmin/assets/svg/feather-icons/dist/feather-sprite.svg#arrow-right">
                    </use>
                </svg>
            </div>
</aside>