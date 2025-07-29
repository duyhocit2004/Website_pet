@extends('admin.index')
@section('head')
    <style>
        .box {
            background-color: white
        }

        .title {
            font-size: 20px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 600
        }

        .title-son {
            filter: opacity(50%);

        }

        .box-1 {
            width: 100%;
            height: 70px;
            /* border: 1px solid wheat; */
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .quantity1 {
            color: black;
            font-weight: bold;
            padding-top: 10px;
        }

        .quantity {
            color: blue;
            font-weight: bold
        }

        .box-status {
            text-align: center;
            padding-left: 100px;
            padding-right: 100px;
        }

        #border {
            border-right: 1px solid rgb(206, 204, 204);
        }

        .box-2 {
            display: flex;
            justify-content: center;
            height: 100%;
        }

        .Chartjs {
            width: 50%;
            height: 100%;
            /* background-color:red; */

        }

        .information {
            width: 50%;
            height: 100%;
            padding-top: 50px;
            padding-left: 20px;
            padding-right: 10px;
            padding-bottom: 10px;

            /* background-color:rgb(13, 221, 186);  */
        }

        .information-box {
            display: flex;
            justify-content: center;
            align-content: center;

        }

        .box-chartjs {
            width: 200px;
            height: 80px;
        }
    </style>
@endsection
@section('main')

    <div class="container-fluid my-2 box">
        <div>
            <div class="listTitle" style="padding-top:20px;padding-bottom:20px">
                <p class="title">Danh sách cần làm</p>
                <p class="title-son">Những việc bạn phải làm</p>
            </div>
            <div class="box-1">
                <div class="box-status" id="border">
                    <p class="quantity" id="status-1">0</p>
                    <p>Chờ xác nhận</p>
                </div>
                <div class="box-status" id="border">
                    <p class="quantity" id="status-2">0</p>
                    <p>Đã xác nhận</p>
                </div>
                <div class="box-status" id="border">
                    <p class="quantity" id="status-3">0</p>
                    <p>Đang giao hàng</p>
                </div>
                <div class="box-status">
                    <p class="quantity" id="status-4">0</p>
                    <p>Đã Hủy</p>
                </div>
            </div>
        </div>




    </div>
    <div class="container-fluid my-2 box" style="height: 400px;">
        <div>
            <div class="listTitle" style="padding-top:20px;padding-bottom:20px">
                <p class="title">Phân tích bán hàng</p>
                <p class="title-son">Tổng quan dữ liệu và những đơn hàng đã xác nhận</p>
            </div>
        </div>
        <div class="box-2">
            <div class="Chartjs">
                <canvas id="myChart" width="300px" height="170px"></canvas>
            </div>
            <div class="information">
                <div class="information-box">
                    <div class="box-chartjs">
                        <p class="title-son">lượt truy cập</p>
                        <p class="quantity1" id="status-5">0</p>

                    </div>
                    <div class="box-chartjs">
                        <p class="title-son">Đơn hàng</p>
                        <p class="quantity1" id="status-6">0</p>

                    </div>
                </div>
                <hr>
                <div class="information-box">
                    <div class="box-chartjs">
                        <p class="title-son">lượt truy cập</p>
                        <p class="quantity1"></p>

                    </div>
                    <div class="box-chartjs">
                        <p class="title-son">Đơn hàng</p>
                        <p class="quantity1"></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{asset("jsAdmin/static.js")}}"></script>
    <script src="{{asset("jsAdmin/Chart.js")}}"></script>
@endsection