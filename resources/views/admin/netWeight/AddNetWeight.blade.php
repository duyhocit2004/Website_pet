@extends('admin.index')
@section('main')
    <div class="container-fluid add-product">
        <form action="{{route('AddNetWeight')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-info">
                                <h4>Thêm khối lượng</h4>
                                <div class="product-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label">Tên khối lượng</label>
                                                <input class="form-control" name="name" value="{{old('name')}}"
                                                    placeholder="Enter Product Name" type="text">
                                                @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-2">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <button class="btn btn-secondary" type="reset"><i class="fa-solid fa-rotate-right"></i>
                            </button>
                            <button class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection