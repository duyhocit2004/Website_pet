@extends('admin.index')
@section('head')
    <Style>
        .pagination {
            display: flex;
            justify-content: center;
            padding-left: 0;
            list-style: none;
        }

        .page-item {
            margin: 0 2px;
        }

        .page-link {
            display: block;
            padding: 0.375rem 0.75rem;
            color: #0d6efd;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            text-decoration: none;
            transition: background-color 0.2s, color 0.2s;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .page-item.disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            background-color: #fff;
            border-color: #dee2e6;
        }

        .page-link:hover {
            background-color: #e9ecef;
            color: #0a58ca;
        }
    </Style>
@endsection
@section('main')
    <div class="container-fluid table-space basic_table">
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
                                <th scope="col">Mã đơn hàng</th>
                                <th scope="col">Ngày đặt</th>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Trạng thái đơn</th>
                                <th scope="col">Phương thức thanh toán</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Thao tác</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($Order as $index => $listOrder )
                                 <tr>
                                <th scope="row">?{{$index+1}}</th>
                                <td>{{$listOrder->code}}</td>
                                <td>{{date_format($listOrder->created_at,'d/m/Y')}}</td>
                                <td>{{$listOrder->username}}</td>
                                <td>{{$listOrder->phone}}</td>
                                <td style="color:{{$listOrder->PaymenStatus->name == 'Chưa thanh toán' ? "red" : "green"}};">{{$listOrder->PaymenStatus->name}}</td>
                                <td>{{$listOrder->PaymentMethod->name}}</td>
                                <td>{{number_format($listOrder->TongTien,0,',','.') }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('GetDetailOrder',$listOrder->id)}}"><i class="fas fa-eye"></i></a>
                                </td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                           <div class="pagination-custom d-flex gap-2 mt-3">
                                    <ul class="pagination justify-content-center mt-3">
                                        {{-- Previous --}}
                                        <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                                            <a class="page-link"
                                                href="{{ $currentPage == 1 ? '#' : request()->fullUrlWithQuery(['page' => $currentPage - 1]) }}">Previous</a>
                                        </li>

                                        {{-- Trang đầu --}}
                                        @if ($currentPage > 3)
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ request()->fullUrlWithQuery(['page' => 1]) }}">1</a></li>
                                            @if ($currentPage > 4)
                                                <li class="page-item disabled"><span class="page-link">...</span></li>
                                            @endif
                                        @endif

                                        {{-- Các trang gần trang hiện tại --}}
                                        @for ($i = max(1, $currentPage - 2); $i <= min($lastPage, $currentPage + 2); $i++)
                                            @if ($i == $currentPage)
                                                <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                                            @else
                                                <li class="page-item"><a class="page-link"
                                                        href="{{ request()->fullUrlWithQuery(['page' => $i]) }}">{{ $i }}</a></li>
                                            @endif
                                        @endfor

                                        {{-- Trang cuối --}}
                                        @if ($currentPage < $lastPage - 2)
                                            @if ($currentPage < $lastPage - 3)
                                                <li class="page-item disabled"><span class="page-link">...</span></li>
                                            @endif
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ request()->fullUrlWithQuery(['page' => $lastPage]) }}">{{ $lastPage }}</a>
                                            </li>
                                        @endif

                                        {{-- Next --}}
                                        <li class="page-item {{ $currentPage == $lastPage ? 'disabled' : '' }}">
                                            <a class="page-link"
                                                href="{{ $currentPage == $lastPage ? '#' : request()->fullUrlWithQuery(['page' => $currentPage + 1]) }}">Next</a>
                                        </li>
                                    </ul>
                                </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

        </div>
    </div>
@endsection