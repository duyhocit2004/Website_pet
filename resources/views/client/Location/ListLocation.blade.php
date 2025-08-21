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
    <div class="formadd" id="formadd">
        <div class="renderForm" id="renderForm">
            <form action="{{route('AddLocation')}}" class="container-xl" id="form" method="post">
                @csrf
                <h2>Địa chỉ mới</h2>
                <hr>
                <div>
                    <label for="">Họ và tên</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div>
                    <label for="">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div>
                    <label for="">Chi tiết vị trí</label>
                    <input type="text" name="location_detail" class="form-control">
                </div>
                <div>
                    <label for="">Tỉnh/Thành phố</label>
                    <select name="province_code" class="form-control" id="province_name">
                        <option value="" hidden>tinh/Thành phố</option>
                    </select>
                </div>
                <div>
                    <label for="">Quận/Huyện</label>
                    <select name="district_code" class="form-control" id="district_name">
                        <option value="" hidden>Huyện</option>
                    </select>
                </div>
                <div>
                    <label for="">Phường/Xã</label>
                    <select name="ward_code" class="form-control" id="ward_name">
                        <option value="" hidden>Phường/Xã</option>
                    </select>
                </div>
                <div style="padding-bottom: 20px" id="input">
                    <a id="return" class="btn btn-light" style="margin-right: 10px">trở lại</a>
                    <button id="add" class="btn btn-primary">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Page Section Start -->
    <div class="sisf-page-section section">
        <div class="sisf-grid sisf-layout--template">
            <div class="sisf-grid-inner container">
                <div class="sisf-myaccount-sec">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="myaccount-navigation">
                                <ul class="list-unstyled">
                                    <li class="myaccount-navigation-link myaccount-navigation-link-orders">
                                        <a href="orders.html">Đơn hàng</a>
                                    </li>
                                    <li class="myaccount-navigation-link myaccount-navigation-link-edit-address is-active">
                                        <a href="{{route('getLocationUser')}}">Địa chỉ</a>
                                    </li>
                                    <li class="myaccount-navigation-link myaccount-navigation-link-edit-account ">
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
                            <div class="myaccount-content">
                                <div class="container" id="box-container">
                                    <div id="location">
                                        <h3>Địa chỉ của tôi</h3>
                                    </div>
                                    <div id="location">
                                        <button id="button">Thêm địa chỉ</button>
                                    </div>
                                </div>
                                <div class="sisf-myaccount-addresses">
                                    <div class="row">
                                        @foreach ($ListLocation as $location)
                                            <div class="col-md-6">
                                                <div class="sisf-address-box">
                                                    <div class="sisf-address-title">
                                                        <h3>Địa chỉ nhận hàng</h3>
                                                        <form id="nutan"  action="{{route('deleteLocation',$location->id)}}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger">Xóa</button>
                                                        </form>
                                                        <a class="edit" id="edit" data-id="{{$location->id}}">sửa</a>
                                                    </div>
                                                    <p>{{$location->name}}</p>
                                                    <p>{{$location->phone}}</p>
                                                    <p>{{$location->province_name}}</p>
                                                    <p>{{$location->district_name}}</p>
                                                    <p>{{$location->ward_name}}</p>
                                                    <address>
                                                        {{$location->location_detail}}
                                                    </address>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        getIdLocation()
        let renderclass = document.getElementById('formadd');


        document.getElementById("button").addEventListener('click', (e) => {

            renderclass.style.display = "block";

        })

        document.getElementById('return').addEventListener('click', () => {
            renderclass.style.display = "none";
        })

        document.addEventListener('DOMContentLoaded', async () => {
            await renderform();
            ProvinceListener();
            DistrictListener();

        })

        async function renderform() {
            try {
                const res = await fetch(`https://provinces.open-api.vn/api/v1/p/`);
                const data = await res.json();


                // console.log(data);

                let List = '';
                data.forEach(element => {
                    List += `<option value="${element.code}">${element.name}
                                             <input type="hidden" name="province_name" value="${element.name}">
                                            </option>

                                        `;
                });

                // console.log(List);

                province = document.getElementById('province_name');
                province.innerHTML = List;

            } catch (error) {
                const a = new Error(error);
                // console.log(a);
            }
        }

        function ProvinceListener() {
            document.getElementById('province_name').addEventListener('change', async (e) => {
                const code = e.target.value;

                const res = await fetch(`https://provinces.open-api.vn/api/v1/p/${code}/?depth=2`);
                const data = await res.json();

                const districts = data.districts;

                // console.log(districts);

                let Listdistricts = ``;
                districts.forEach((e) => {
                    Listdistricts += `<option value="${e.code}">${e.name}
                                             <input type="hidden" name="district_name" value="${e.name}">
                                            </option>`
                })


                const district = document.getElementById('district_name');
                district_name.innerHTML = Listdistricts;
            })
        }
        function DistrictListener() {
            document.getElementById('district_name').addEventListener('change', async (e) => {
                const code = e.target.value;

                const res = await fetch(`https://provinces.open-api.vn/api/v1/d/${code}/?depth=2`);
                const data = await res.json();

                const wards = data.wards;

                let listWards = ``;
                wards.forEach((e) => {
                    listWards += `<option value="${e.code}">${e.name}
                                            <input type="hidden" name="ward" value="${e.name}"> 
                                            </option>`
                })

                const renderWards = document.getElementById('ward_name');
                renderWards.innerHTML = listWards;
                // console.log(wards);

            })
        }

        function getIdLocation() {
            const location = document.querySelectorAll('.edit')
            location.forEach((e) => {
                e.addEventListener('click', () => {
                    const id = e.getAttribute('data-id');
                    renderclass.style.display = "block";
                    render(id);
                })
            })
        }
        async function render(id) {

            try {
                const url = '{{route("GetLocationById", 0)}}'.replace('/0', '/' + id);
                const urlUpdate = '{{route("updateLocation",0)}}'.replace('/0','/'+ id);
                const res = await fetch(url);
                const data = await res.json();

                data1 = data.Data;

                console.log(data.Data);
                let file = document.getElementById('renderForm');
                file.innerHTML = `
                                    <form action="${urlUpdate}" class="container-xl" id="form" method="post">
                                    @csrf
                                    @method('PUT')
                                    <h2>Sửa địa chỉ</h2>
                                    <hr>
                                    <div>
                                        <label for="">Họ và tên</label>
                                        <input type="text" name="name" value="${data1.name}" class="form-control">
                                    </div>
                                    <div>
                                        <label for="">Số điện thoại</label>
                                        <input type="text" name="phone" value="${data1.phone}" class="form-control">
                                    </div>
                                     <div>
                                        <label for="">Chi tiết vị trí</label>
                                        <input type="text" name="location_detail" value="${data1.location_detail}" class="form-control">
                                    </div>
                                    <div>
                                        <label for="">Tỉnh/Thành phố</label>
                                        <select name="province_code" class="form-control" id="province_name">
                                           <option value="${data1.province_code}" selected hidden>${data1.province_name}</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="">Quận/Huyện</label>
                                        <select name="district_code" class="form-control" id="district_name">
                                            <option value="${data1.district_code}" selected hidden>${data1.district_name}</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="">Phường/Xã</label>
                                        <select name="ward_code" class="form-control" id="ward_name">
                                            <option value="${data1.ward_code}" selected hidden>${data1.ward_name}</option>
                                        </select>
                                    </div>
                                    <div style="padding-bottom: 20px" id="input">
                                        <a id="return" class="btn btn-light" style="margin-right: 10px">trở lại</a>
                                        <button id="add" class="btn btn-primary">Thêm mới</button>
                                    </div>
                                </form>

                                `
                await renderform();
                ProvinceListener();
                DistrictListener();

                document.getElementById('return').addEventListener('click', () => {
                    renderclass.style.display = "none";
                })
            } catch (error) {
                console.log(new Error(error));
            }



        }
    </script>
@endsection