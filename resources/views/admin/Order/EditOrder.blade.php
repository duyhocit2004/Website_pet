@extends('admin.index')
@section('head')
  <style>
    p {
    padding: 5px;
    font-size: 15px
    }
    /* b{
      color : darkgrey
    } */
     #payment{
      width: 200px;
      border-radius: 10px 10px;
      border: 1px solid #a0a0a0 ;
     }
     #payment1{
      width: 200px;
      border-radius: 10px 10px;
      border: 1px solid #a0a0a0 ;
     }
  </style>

@endsection
@section('main')
 <form action="{{route('UpdateOrder', $detailOrder->id)}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  
  <div class="container-fluid my-1 d-flex justify-content-end">
      <button class="btn btn-primary ">Cập nhập</button>
  </div>

  <div class="container-fluid add-product">
    <div class="row">
      <div class="my-2 card ">
      <h4 class="py-2">Đơn hàng : {{$detailOrder->code}} </h4>
      <div class="container  d-flex justify-content-center">
        <div class="detail1 col-xl-5">
        <p><b>Họ tên :</b>{{$detailOrder->username}}</p>
        <p><b>địa chỉ :</b>{{$detailOrder->province_name}}{{$detailOrder->district_name}}{{$detailOrder->ward_name}}
        </p>
        <p> <b>Số điện thoại :</b>{{$detailOrder->phone}} </p>
        <p><b>Email : </b>{{$detailOrder->email}}</p>
        <div class="d-flex my-2">
           <label for="payment"><b>Trạng thái Thanh toán : </b></label>
          <select name="payment_status_id" id="payment" >
            
            @foreach ( $PaymentStatus as $listStatus )
               <option value="{{$listStatus->id}}"
                {{$listStatus->id == $detailOrder->payment_status_id ? "selected" : ""}}
                {{$detailOrder->payment_status_id > $listStatus->id ? "disabled" : ""}}
                >{{$listStatus->name}}
               </option>
            @endforeach
             
          </select>
        </div>
         
        </div>

        <div class="detail2 col-xl-5">
          <p><b>Ghi chú :</b>{{$detailOrder->note}}</p>
          <div class="d-flex my-2">
           <label for="payment1"><b>Trạng thái đơn hàng : </b></label>
          <select name="status_order_id" id="payment1" >
            
            @foreach ( $statusOrder as $listStatusOrder )
               <option value="{{$listStatusOrder->id}}"
                {{$listStatusOrder->id == $detailOrder->status_order_id ? "selected" : ""}}
                {{$detailOrder->status_order_id > $listStatusOrder->id ? "disabled" : ""}}
                >{{$listStatusOrder->name}}
               </option>
            @endforeach
             
          </select>
          </div>
        </div>
      </div>
      </div>
    </div>
     </form>
  </div>
  <div>

  </div  class="container-fluid add-product">
    <div class="row">
            <div class="col-sm-12 my-2">
                  <div class="card">
                    <div class="card-header">
                      <h4>Danh sách đơn hàng</h4>
                    <div class="card-block row">
                      <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                          <table class="table table-dashed">
                            <thead>
                              <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">giá gốc</th>
                                <th scope="col">Tổng tiền</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                 <?php 
                                  $sum = 0; 
                                ?>
                                @foreach ($DetailProductOrder as $index => $ListProduct )
                                  <?php $sum  += $ListProduct->total_price ?>
                                  <td>{{$index + 1}}</td>
                                  <td>{{$ListProduct->product_name}}</td>
                                  <td><img src="{{$ListProduct->product->image}}" width="200px" alt=""></td>
                                  <td>{{$ListProduct->quantity}}</td>
                                  <td>{{number_format( $ListProduct->price ,0,'.',',' )}} VND</td>
                                  <td>{{number_format($ListProduct->total_price,0,'.','.')}} VND</td>
                                @endforeach
                              </tr>
                            </tbody>
                          </table>
                          <hr>
                          <div class="col">
                            <p class="text-end">Tổng tiền sản phẩm : {{number_format($sum,0,'.','.')}} VND</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

    </div>
  </div>
      <div class="container-fluid add-product">
          <div class="row">
            <div class="col-sm-12 my-2">
                  <div class="card">
                    <div class="card-header">
                      <h4>Lịch sử trạng thái đơn hàng</h4>
                    <div class="card-block row">
                      <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                          <table class="table table-dashed">
                            <thead>
                              <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Người Thay đổi</th>
                                <th scope="col">Ghi chú</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                @foreach ($Status_Order_histories as $index => $ListOrderHistories   )

                                  <td>{{$index + 1}}</td>
                                  <td>{{$ListOrderHistories->order_status_old}} -> {{$ListOrderHistories->order_status_new}}</td>
                                  <td>{{$ListOrderHistories->User_edit_method}}</td>
                                  <td>{{$ListOrderHistories->note}}</td>
                                @endforeach
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

    </div>
      </div>
        <div class="container-fluid add-product">
          <div class="row">
            <div class="col-sm-12 my-2">
                  <div class="card">
                    <div class="card-header">
                      <h4>Lịch sử trạng thái Thanh toán</h4>
                    <div class="card-block row">
                      <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                          <table class="table table-dashed">
                            <thead>
                              <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Người Thay đổi</th>
                                <th scope="col">Ghi chú</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                @foreach ( $Payment_status_histories as $index => $ListStatusPayment   )

                                  <td>{{$index + 1}}</td>
                                  <td>{{$ListStatusPayment->status_old}} -> {{$ListStatusPayment->status_new}}</td>
                                  <td>{{$ListStatusPayment->User_edit_status}}</td>
                                  <td>{{$ListStatusPayment->note}}</td>
                                @endforeach
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

    </div>
      </div>
@endsection

@section('js')

@endsection