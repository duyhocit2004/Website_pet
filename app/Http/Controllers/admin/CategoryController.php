<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\Category\categoryService;
use App\Service\Category\ICategoryService;

class CategoryController extends Controller
{
     public ICategoryService $categorySerive;
     public function __construct(categoryService $categorySerive)
     {
          $this->categorySerive = $categorySerive;
     }

     public function GetListCategory(Request $request)
     {
          return $this->categorySerive->GetListCategory($request);
     }
     public function FormAddCategory()
     {
          return $this->categorySerive->FormAddCategory();
     }
     public function AddCategory(Request $request)
     {
          return $this->categorySerive->AddCategory($request);
     }
     public function GetCategoryById($id)
     {
          return $this->categorySerive->GetCategoryById($id);
     }
     public function UpdateCategoryById(Request $request, $id)
     {
          return $this->categorySerive->UpdateCategoryById($request, $id);
     }
     public function DeleteCategory($id)
     {
          return $this->categorySerive->DeleteCategory($id);
     }
}
