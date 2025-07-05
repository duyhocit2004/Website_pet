<?php

namespace App\Service\Category;

use Illuminate\Http\Request;

interface ICategoryService {
    public function GetListCategory(Request $request);
    public function FormAddCategory();
    public function AddCategory(Request $request);
    public function GetCategoryById($id);
    public function UpdateCategoryById(Request $request, $id);
    Public function DeleteCategory($id);
}