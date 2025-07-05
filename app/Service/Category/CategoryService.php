<?php 
namespace App\Service\Category;
use Illuminate\Http\Request;
use App\Repository\CategoryRepository;
use Illuminate\Support\Facades\Validator;
class CategoryService implements ICategoryService{
    
    public $Category;
    public function __construct(CategoryRepository $Category){
        return $this->Category = $Category;
    }

    public function GetListCategory(Request $request){
        return $this->Category->GetListCategory($request);
    }
    public function FormAddCategory(){
        return $this->Category->FormAddCategory();
    }
    public function AddCategory(Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'image'=> 'required|image|mimes : jpeg,jpg,png'
        ],[
            'name.required' => 'vui lòng nhập tên',
            'name.max:50' =>'vui độ dài ten là 50 ký tự',
            'image.required' => 'vui lòng chọn ảnh',
            'image.image'=>'phải chọn là anh',
            'image.mimes' => ' chỉ chứ ảnh định dạng jpeg,jpg,png' ,
        ]);
        return $this->Category->AddCategory($request);
    }
    public function GetCategoryById($id){
        return $this->Category->GetCategoryById($id);
    }
    public function UpdateCategoryById(Request $request, $id){
         $request->validate([
            'name' => 'required|max:50',
            'image'=> 'required|image|mimes : jpeg,jpg,png'
        ],[
            'name.required' => 'vui lòng nhập tên',
            'name.max:50' =>'vui độ dài ten là 50 ký tự',
            'image.required' => 'vui lòng chọn ảnh',
            'image.image'=>'phải chọn là anh',
            'image.mimes' => ' chỉ chứ ảnh định dạng jpeg,jpg,png' ,

        ]);
        return $this->Category->UpdateCategoryById($request, $id);
    }
    Public function DeleteCategory($id){
        return $this->Category->DeleteCategory($id);
    }
}