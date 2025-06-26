@extends('admin.index')
@section('main')
  <div class="container-fluid add-product">
    <form action = "{{route('PostAddProduct')}}" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="row">
      <div class="col-xl-7">
      <div class="card">
        <div class="card-body">
        <div class="product-info">
          <h4>Thông tin sản phẩm</h4>
          <div class="product-group">
          <div class="row">
            <div class="col-sm-12">
            <div class="mb-3">
              <label class="form-label">Tên sản phẩm</label>
              <input class="form-control" name="name" value="{{old('name')}}" placeholder="Enter Product Name" type="text">
              @error('name')
                 <span class="text-danger">{{$message}}</span>
              @enderror
             
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
            <div class="mb-3">
              <label class="form-label">Loại sản phẩm</label>
              <select name="category_id"  class="form-select">
              @foreach ($category as $categories)
          <option value="{{old('category_id',$categories->id) }}">{{$categories->name}}</option>
        @endforeach
              </select>
               @error('category_id')
                 <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            </div>
            <div class="col-sm-6">
            <div class="mb-3">
              <label class="form-label"> giảm giá % (không bắt buộc) </label>
              <input class="form-control"  name="discount" placeholder="10%" type="text"><span
              class="text-danger"></span>
            </div>
            </div>
          </div>
          </div>
          <h4 class="mt-4">Nội dung sản phẩm</h4>
          <div class="product-group">
          <div class="row">
            <div class="col-sm-12">
            <div class="mb-3">
              <label class="form-label">Tiêu đề</label>
              <textarea id="title" name="title" value="{{old('title')}}"  class="form-control" placeholder="tiêu đề"></textarea>
               @error('title')
                 <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
            <div class="mb-3">
              <label class="form-label">Miêu tả</label>
              <textarea value="{{old('description')}}" id="description" name="description" class="form-control"
              placeholder="miêu tả"></textarea>
               @error('description')
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
      <div class="col-xl-5">
      <div class="card">
        <div class="card-body">
        <div class="product-info">
          <h4>Ảnh sản phẩm</h4>
          <div class="dropzone" id="singleFileUpload">
          <div class="dz-message needsclick">
            <input type="file" value="{{old('image')}}" name="image" id="inputname" hidden>
            <div id="previewContainer" class="flex flex-wrap mt-4 gap-2">
               @error('image')
                 <span class="text-danger">{{$message}}</span>
              @enderror
            <h6>Bấm vào để chọn ảnh.</h6><span class="note needsclick">
            </div>
          </div>
          </div>
          <h4 class="mt-4">Album ảnh</h4>
          <div class="dropzone" id="AlbumFileUpload">
          <div class="dz-message needsclick">
            <input type="file" name="image_path[]"  value="{{old('image_path')}}"id="inputAlbum" hidden multiple>
            <div id="previewContainer2" class="flex flex-wrap mt-4 gap-2">
               @error('image_path')
                 <span class="text-danger">{{$message}}</span>
              @enderror
            <h6>Bấm vào để chọn ảnh.</h6><span class="note needsclick"></span>
            </div>
          </div>
          </div>
        </div>

        </div>
      </div>
      </div>
      {{-- Biến thể --}}
      <div class="col-xl-7">
      <div class="card">
        <div class="card-body">
        <div class="product-info">
          <h4>Biến thể sản phẩm</h4>
          <div id="group-variant">
          </div>
        </div>
        </div>
      </div>
      </div>
      {{-- Thông tin bổ sung --}}
      <div class="col-xl-5">
      <div class="card">
        <div class="card-body">
        <div class="product-info">
          <h4>Thông tin bổ sung(cải tiến trong tương lai)</h4>
          <div class="product-group">
          <div class="row">
            <div class="col-sm-12">
            <div class="mb-3">
              <label class="form-label">Đồ ăn lý tưởng cho</label>
              <input class="form-control" name="Ideal_For" placeholder="Enter Product Name" type="text"><span
              class="text-danger"></span>
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
            <div class="mb-3">
              <label class="form-label">Thương Hiệu</label>
              <input class="form-control" name="brands" placeholder="Enter Product Name" type="text"><span
              class="text-danger"></span>
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
        <button class="btn btn-secondary" type="reset"><i class="fa-solid fa-rotate-right"></i> </button>
          <p class="btn btn-primary" id="addVariant"><i class="fas fa-sliders-h"></i></p>
         <button class="btn btn-primary" ><i class="fa-solid fa-plus"></i></button>
        </div>
      </div>
      </div>
    </div>
    </form>
  </div>
@endsection

@section('js')


  {{-- Phần hình Xử lý phần hình ảnh --}}
  <script>
    document.getElementById('singleFileUpload').addEventListener('click', function () {
    document.getElementById('inputname').click();
    })

    document.getElementById('inputname').addEventListener('change', function (e) {
    const file = e.target.files[0];
    const viewFile = document.getElementById('previewContainer');
    viewFile.innerHTML = '';

    if (file.type.startsWith('image/')) {
      const reader = new FileReader();

      reader.onload = function (e) {
      const img = document.createElement('img');
      img.src = e.target.result;
      img.style.width = '100px';
      img.style.height = '100px';
      viewFile.appendChild(img);
      }
      reader.readAsDataURL(file);
    }


    })

    document.getElementById('AlbumFileUpload').addEventListener('click', function () {
    document.getElementById('inputAlbum').click();
    })
    document.getElementById('inputAlbum').addEventListener('change', function (e) {
    const files = e.target.files
    const viewFile2 = document.getElementById('previewContainer2');
    viewFile2.innerHTML = '';


    if (files.length > 3) {
      const notification = document.createElement('p');
      notification.style.color = "red";
      notification.innerText = "Chỉ chọn đối ta 3 bức ảnh"
      // alert("chọn đối ta được 3 bức ảnh");
      viewFile2.appendChild(notification);
      return;
    }

    // duyệt nhiều ảnh và hiển thị
    for (let i = 0; i < files.length; i++) {

      const file = files[i];
      const reader = new FileReader();

      if (file.type.startsWith('image/')) {

      const fileMain = e.target.files[i];
      reader.onload = function (e) {

        const img = document.createElement('img');
        img.src = e.target.result;
        img.style.width = '100px';
        img.style.height = '100px';
        img.style.marginLeft = '10px';
        // img.style.objectFit = 'cover';
        // img.style.marginRight = '10px';
        viewFile2.appendChild(img);
      }
      reader.readAsDataURL(file);
      }
    }
    })


  </script>

  {{-- Xử lý phần nội dung --}}
  <script>
    ClassicEditor
    .create(document.querySelector('#title'))
    .catch(error => {
      console.error(error);
    });
    ClassicEditor
    .create(document.querySelector('#description'))
    .catch(error => {
      console.error(error);
    });
  </script>

  {{-- Xử lý phần biến thể --}}
  <script>
    const net_weight = @json($net_weith);
    const color = @json($color);
    let i = 0;
    document.getElementById('addVariant').addEventListener('click', function () {
      i++

      // lấy các giá trị đã chọn
      const selectedNetWeight = getSelectedValues('select[name^="variant"][name$="[net_weight_id]"]')
      const selectedColors = getSelectedValues('select[name^="variant"][name$="[color_id]"]');

      // Tạo option cho net_weight và color, loại bỏ đã chọn
      let netWeightOptions = '<option value="" disabled selected hidden >----------Trọng lượng----------</option>';
      let colorOptions = '<option value="" disabled selected hidden>----------màu sắc----------</option>';


      // Tạo option cho net_weight (KHÔNG loại bỏ đã chọn)
      net_weight.forEach(element => {
          netWeightOptions += `<option value="${element.id}">${element.name}</option>`;
      }); 

      // Tạo option cho color (LOẠI BỎ đã chọn)
      color.forEach(e => {
          if (!selectedColors.includes(String(e.id))) {
              colorOptions += `<option value="${e.id}">${e.name}</option>`;
          }
      });

      console.log("xin chào");
      const groupVariant = document.getElementById('group-variant');
      const variant = `
      
      <div class="product-group my-1">
        <h4>Biến thể ${i}</h4>
            <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
              <label class="form-label">trọng lượng </label>
              <select name="variant[${i}][net_weight_id]" class="form-select">
                ${netWeightOptions}
              </select>

              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
              <label class="form-label">màu</label>
              <select name="variant[${i}][color_id]" class="form-select">
               ${colorOptions}
              </select>

              </div>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
              <label class="form-label">số lượng</label>
              <input class="form-control"  name="variant[${i}][stock]" placeholder="Nhập số lượng ..." type="text"> 

              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
              <label class="form-label"> Giá </label>
              <input class="form-control" name="variant[${i}][price]"  placeholder="Nhập giá ..." type="text"> 

              </div>
            </div>
            </div>
          </div>
       `;
        groupVariant.insertAdjacentHTML('beforeend', variant);
    });
    // Thêm HTML biến thể vào group-variant
    
    function getSelectedValues(selecter){
      return Array.from(document.querySelectorAll(selecter))
      .map(select=>select.value)
      .filter(val=>val !=="")
    }
    // return  groupVariant.sub = variant;
  </script>
@endsection