@extends('admin.index')
@section('main')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Thêm mã giảm giá</h4>
                    </div>
                    <div class="card-body checkbox-checked">
                        <form action="{{route('AddVoucher')}}" method="POST" enctype="multipart/form-data" class="theme-form row g-3 needs-validation custom-input" novalidate="">
                            @csrf
                            <div class="col-6">
                                <label class="form-label" for="code">Tên mã giảm giá</label>
                                <input class="form-control" id="code" name="code" value="{{old('code')}}" type="text"
                                    placeholder="MUAHE2025">
                                @error('code')
                                    <div class="invalid-feedback code1">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label class="form-label" for="usage_limit">Số lượng</label>
                                <input class="form-control" id="usage_limit" value="{{old('usage_limit')}}"
                                    name="usage_limit" type="text">

                                @error('usage_limit')
                                    <div class="invalid-feedback usage_limit1 ">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="min_order_amount">Giá trị tối thiểu</label>
                                <input class="form-control" name="min_order_amount" value="{{old('min_order_amount')}}"
                                    id="min_order_amount" type="text" required="">

                                @error('min_order_amount')
                                    <div class="invalid-feedback min_order_amount1">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="max_discount">Giá trị đối ta</label>
                                <input class="form-control" name="max_discount" value="{{old('max_discount')}}"
                                    id="max_discount" type="text" required="">

                                @error('max_discount')
                                    <div class="invalid-feedback max_discount1">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="card-wrapper solid-border rounded-3 checkbox-checked">
                                    <h6 class="sub-title fw-bold">loại mã giảm</h6>
                                    <div class="radio-form">
                                        <div class="form-check">
                                            <input class="form-check-input" id="discount_type"
                                                value="{{old('discount_type', 'precent')}}" type="radio"
                                                name="discount_type" required="">
                                            <label class="form-check-label" for="discount_type">Phần trăm(%)</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="discount_type"
                                                value="{{old('discount_type', 'amount')}}" type="radio" name="discount_type"
                                                required="">
                                            <label class="form-check-label" for="discount_type">Giá
                                                tiền(VND)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="discount_value">Giá tiền voucher</label>
                                <input class="form-control" id="discount_value" value="{{old('discount_value')}}"
                                    name="discount_value" type="text" aria-label="file example">

                                @error('discount_value')
                                    <div class="invalid-feedback discount_value1"></div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="start_date">Ngày bắt đầu</label>
                                <input class="form-control" id="start_date" value="{{old('start_date')}}" name="start_date"
                                    type="date" aria-label="file example">

                                @error('start_date')
                                    <div class="invalid-feedback start_date1">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="end_date">Ngày kết thúc</label>
                                <input class="form-control" id="end_date" value="{{old('end_date')}}" name="end_date"
                                    type="date" aria-label="file example">

                                @error('end_date')
                                    <div class="invalid-feedback end_date1">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label" for="description">Nội dung Voucher</label>
                                <textarea class="form-control" id="description" value="{{old('description')}}"
                                    name="description" placeholder="mùa hè siêu hot vói voucher cuc ưu đãi"
                                    required=""></textarea>

                                @error('description')
                                    <div class="invalid-feedback description1">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Thêm </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid ends-->
@endsection

@section('js')
    <script>


           const eventForm = document.querySelector('form');
                eventForm.addEventListener("submit", (e) => {
                     const emojiRegex = /[\u{1F600}-\u{1F64F}]|[\u{1F300}-\u{1F5FF}]|[\u{1F680}-\u{1F6FF}]|[\u{2600}-\u{26FF}]|[\u{2700}-\u{27BF}]|[\u{1F1E6}-\u{1F1FF}]/gu;


                    const end_date = document.getElementById('end_date').value;
                    const start_date = document.getElementById('start_date').value;
                    const code = document.getElementById("code").value;
                    const usage_limit = document.getElementById('usage_limit').value;
                    const min_order_amount = document.getElementById('min_order_amount').value;
                    const max_discount = document.getElementById('max_dislimit').value;
                    const discount_value = document.getElementById('discount_limit').value;
                    const description = document.getElementById('descrilimit').value;
                    const discount_type = document.querySelector("input[name='discount_type']:checked");

                    console.log("hello")
                        e.defaultPrevented()
                })

    </script>
@endsection