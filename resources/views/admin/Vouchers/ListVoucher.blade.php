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
                                <th scope="col">Mã giảm</th>
                                <th scope="col">Số lượng sử dụng</th>
                                <th scope="col">Giá trị tối thiểu</th>
                                <th scope="col">Giá trị tối đa</th>
                                <th scope="col">Hạn sử dụng</th>
                                <th scope="col">Trạng thái mã</th>
                                <th scope="col">Thao tác</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($Voucher as $index => $listVoucher )
                                 <tr>
                                <th scope="row">{{$index+1}}</th>
                                <td>{{$listVoucher->code}}</td>
                                <td>{{$listVoucher->usage_limit - $listVoucher->used_count}}</td>
                                <td>{{$listVoucher->min_order_amount}}</td>
                                <td>{{$listVoucher->max_discount}}</td>
                                <td>{{\Carbon\Carbon::parse($listVoucher->end_date)->format('d-m-Y')}}</td>
                                <td style="color:{{$listVoucher->is_active == 'active' ? 'green' : 'red'}}">{{$listVoucher->is_active }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('GetVoucherById',$listVoucher->id)}}"><i class="fas fa-eye"></i></a>
                                    <form action="{{route("LockAndUnLockVoucher",$listVoucher->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        @if ($listVoucher->is_active === config('contast.active'))
                                            <button class="btn btn-danger my-2"><i class="fas fa-lock"></i></button>
                                        @else
                                            <button class="btn btn-danger my-2"><i class="fas fa-unlock"></i></button>
                                        @endif
                                    </form>
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