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
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Danh sách banner </h4>
                    </div>
                    <div class="card-header ">
                        <form action="{{route('GetAllBanner')}}" class="d-flex justify-content-end" style="height: 40px;" method="get">
                            @csrf
                            <div class="row col-3">
                                <select name="status" class="form-control">
                                    <option value="" hidden  selected>vai trò</option>
                                    <option value="primary">Chính
                                    </option>
                                    <option value="secondary">Phụ</option>
                                </select>
                            </div>
                            <div class="row col-3 mx-3">
                                <select name="status" class="form-control">
                                    <option value="" hidden  selected >trạng thái</option>
                                    <option value="active">hoạt động
                                    </option>
                                    <option value="lock">Khóa</option>
                                </select>
                            </div>
                            <div class="row " >
                                <button class="btn btn-primary " >Tìm kiếm</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Tiêu đề</th>
                                            <th scope="col">video</th>
                                            <th scope="col"> Trạng thái</th>
                                            <th scope="col d-flex gap-2">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Banner as $key => $lists)
                                            <tr>
                                                <td  scope="row">{{$key +1}}</td>
                                                <td>{{$lists->title}}</td>
                                                <td><video src="{{$lists->Link_video}}" width="150px" type="video/mp4"></video></td>
                                                <th scope="col">{{$lists->status == config('contast.active') ? "hoạt động" : "không hoạt động"}}</th>
                                                <td >
                                                    <div class="wizard-footer d-flex gap-2">
                                                        <a href="{{route('GetBannerById', $lists->id)}}"
                                                            class="btn alert-light-primary" id="backbtn">
                                                            Sửa</a>
                                                        <form action="{{route('DeleteBannerById', $lists->id)}}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" id="nextbtn">Xóa</button>
                                                        </form>

                                                    </div>
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