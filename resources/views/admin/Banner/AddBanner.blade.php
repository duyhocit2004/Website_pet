@extends('admin.index')
@section('main')
    <div class="container-fluid my-2">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Thêm Banner</h4>
                    </div>
                    <div class="card-body">
                        <form class="theme-form row g-3 needs-validation custom-input" action="{{route('AddBanner')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="col-md-12 position-relative">
                                <label class="form-label" for="title">Tiêu đề</label>
                                <input class="form-control" id="title" name="title" value="{{old('title')}}" type="text">
                                <div class="valid-tooltip">@error('title')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-4 position-relative">
                                <label class="form-label" for="Link_video">Video</label>
                                <input class="form-control" name="Link_video" id="Link_video" type="file" value="{{old('Link_video')}}">
                                @error('Link_video')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-4 position-relative">
                                <label class="form-label" for="status">Trạng thái</label>
                                <select class="form-select" name="status" id="status" required="">
                                    <option hidden re value="">Trạng thái</option>
                                    <option value="active">hoạt động</option>
                                    <option value="lock">Không hoạt động</option>
                                </select>
                            </div>
                            <div class="col-md-4 position-relative">
                                <label class="form-label" for="role">Vị trí banner</label>
                                <select class="form-select" name="role" id="role" required="">
                                    <option hidden >Choose...</option>
                                    <option value="primary">Banner chính </option>
                                    <option value="secondary">Banner phụ</option>
                                </select>
                            </div>
                            <div class="col-md-7 position-relative">
                                <label class="form-label" for="descripton">Nội dung</label>
                                <div class="input-group has-validation">
                                    <input class="form-control" name="descripton" value="{{old('descripton')}}"
                                        id="descripton" type="text">
                                    <div class="invalid-tooltip">@error('descripton')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 position-relative">
                                <label class="form-label" for="Link_product">Đường dẫn sản phẩm</label>
                                <input class="form-control" name="Link_product" id="Link_product" value="{{old('Link_product')}}" type="text"
                                    required="">
                                <div class="invalid-tooltip">@error('Link_product')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                            </div>



                            <div class="col-12">
                                <button class="btn btn-primary">Submit form</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection