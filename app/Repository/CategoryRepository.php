<?php

namespace App\Repository;

use App\Models\Category;
use Illuminate\Http\Request;

use function PHPUnit\Framework\stringStartsWith;
use App\Common\Notification;
use Cloudinary\Cloudinary;

class CategoryRepository
{
    public $notification;
    public $Cloudinary;
    public function __construct(Notification $notification, Cloudinary $Cloudinary)
    {
        $this->Cloudinary = $Cloudinary;
        $this->notification = $notification;
    }
    public function GetListCategory(Request $request)
    {

        // lấy danh sách theo trang
        $perPage = 5;
        $List = $request->input('page', 1);
        $query = Category::query()->orderByDesc('created_at');

        // tổng sô lượng
        $total = $query->count();

        $NetWeight = $query->skip(($List - 1) * $perPage)->take($perPage)->get();
        $lastpage = ceil($total / $perPage);

        return view('admin.categories.list', ['NetWeight' => $NetWeight, 'currentPage' => $List, 'lastPage' => $lastpage, 'total' => $total, 'perPage' => $perPage,]);
    }
    public function FormAddCategory()
    {
        return view('admin.categories.AddCategory');
    }
    public function AddCategory(Request $request)
    {
        try {
            // kiểm tra giá trị đã tồn tại hay chưa
            $name = mb_strtolower($request->input('name'));
            $check = Category::whereRaw('name = ?', [$name])->exists();
            if ($check) {
                return $this->notification->Error('GetListCategory', " đã tồn tại");
            }

            //lưu ảnh vào phần mềm thứ 3
            if ($request->hasFile('image')) {
                $album = $this->Cloudinary->uploadApi()->upload($request->file('image')->getRealPath());
                $file = $album['secure_url'];
            }

            // thêm dữ liệu
            Category::create([
                'name' => $request->input('name'),
                'image' => $file
            ]);
            return $this->notification->Success('GetListCategory', 'Thêm Thể loại thành công');
        } catch (\Throwable $th) {
            return $this->notification->Error('GetListCategory', $th);
        }

    }
    public function GetCategoryById($id)
    {
        $list = Category::findOrFail($id);
        return view('admin.categories.EditCategory', compact('list'));
    }
    public function UpdateCategoryById(Request $request, $id)
    {
        try {
            // tìm kiếm sản phẩm
            $GetByid = Category::findOrFail($id);

            // kiểm tra giá trị đã tồn tại hay chưa
            $name = mb_strtolower($request->input('name'));


            if ($GetByid->name !== $name) {
                $check = Category::whereRaw('name = ?', [$name])->exists();
                if ($check) {
                    return $this->notification->Error('GetListCategory', " đã tồn tại");
                }
            }



            //lưu ảnh vào phần mềm thứ 3
            if ($request->hasFile('image')) {
                if ($GetByid->image) {
                    // xóa ảnh phần mềm thứ 3 nếu có ảnh mới
                    $filename = pathinfo($GetByid->image, PATHINFO_FILENAME);
                    $this->Cloudinary->uploadApi()->destroy($filename);
                }

                $album = $this->Cloudinary->uploadApi()->upload($request->file('image')->getRealPath());
                $file = $album['secure_url'];
            }

            // sửa dữ liệu
            $GetByid->update([
                'name' => $request->input('name'),
                'image' => $file
            ]);
            return $this->notification->Success('GetListCategory', 'sửa Thể loại thành công');
        } catch (\Throwable $th) {
            return $this->notification->Error('GetListCategory', $th->getMessage());
        }
    }
    public function DeleteCategory($id)
    {

        $cate = Category::find($id);

        if (!$cate) {
           return $this->notification->Error('GetListCategory', 'xóa Thể loại thất bại hoac the loai khong ton tai');
        } 
         $cate->delete();
        return $this->notification->Success('GetListCategory', 'xóa thành công');
        


    }
}