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
    <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0">
                    <h4>Thông tin tài khoản </h4>
                  </div>
                  <div class="card-body">
                    <form class="theme-form row g-3 needs-validation custom-input" novalidate="">
                      <div class="col-md-4 position-relative">
                        <label class="form-label" for="validationTooltip01">Tên</label>
                        <input class="form-control" id="validationTooltip01"   value="{{$IdAccount->name}}" disabled type="text" placeholder="Mark" required="">
                        <div class="valid-tooltip">Looks good!</div>
                      </div>
                      <div class="col-md-4 position-relative">
                        <label class="form-label" for="validationTooltip02">Email</label>
                        <input class="form-control" id="validationTooltip02"  value="{{$IdAccount->email}}" disabled type="text" placeholder="Otto" required="">
                        <div class="valid-tooltip">Looks good!</div>
                      </div>
                      <div class="col-md-4 position-relative">
                        <label class="form-label" for="validationTooltipUsername">Địa chỉ</label>
                        <div class="input-group has-validation">
                          <input class="form-control" id="validationTooltipUsername"  value="{{$IdAccount->address}}" disabled type="text" aria-describedby="validationTooltipUsernamePrepend" required="">
                          <div class="invalid-tooltip">Please choose a unique and valid username.</div>
                        </div>
                      </div>
                      <div class="col-md-6 position-relative">
                        <label class="form-label" for="validationTooltip03">Vai trò</label>
                        <input class="form-control" id="validationTooltip03" value="{{$IdAccount->role === config('contast.User') ? "Người dùng" : "Quản lý"}}" disabled type="text" required="">
                        <div class="invalid-tooltip">Please provide a valid city.</div>
                      </div>

                      <form action="" method="POST">
                        @csrf
                        <div class="col position-relative">
                          <label class="form-label" for="validationTooltip04">Trạng thái</label>
                          <select class="form-select" name="status" id="validationTooltip04" required="">
                            <option value="active"{{$IdAccount == 'active' ? "seleced" : ""}}>Hoạt động</option>
                            <option value="lock" {{$IdAccount == 'lock' ? "seleced" : ""}}> khóa</option>
                          </select>
                        </div>
                      </form>
                      <div class="col-12">
                        <button class="btn btn-primary" type="submit">Cập nhật</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection