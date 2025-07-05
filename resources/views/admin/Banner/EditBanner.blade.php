@extends('admin.index')
@section('main')
    <div class="container-fluid add-product">
        <form action="{{route('UpdateCategoryById',$list->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-info">
                                <h4> Thêm hình ảnh</h4>
                                <div class="product-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label">Tên thể loại</label>
                                                <input class="form-control" name="name" value="{{old('name',$list->name)}}"
                                                    placeholder="Enter Product Name" type="text">
                                                @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror

                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Hình ảnh </label>
                                                <input class="form-control" name="image" value="{{old('image',$list->image)}}"
                                                    placeholder="Enter Product Name" type="file">
                                                @error('image')
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