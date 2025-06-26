<?php

namespace App\Service\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repository\ProductRepository;


class ProductService implements IproductService{
    public ProductRepository $ProductRepository;
    public function __construct(ProductRepository $ProductRepository){
        $this->ProductRepository=$ProductRepository;
    }
    public function GetAllProductPaginate(Request $request){

        $this->notificationRoleAccessUser();
        return $this->ProductRepository->GetAllProductPaginate($request);
    }
    public function FormAddProduct(){
        $this->notificationRoleAccessUser();
         return $this->ProductRepository->FormAddProduct();
    }
    public function postAddProduct(Request $data){
        $this->notificationRoleAccessUser();
          $data->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'discount' => 'nullable|numeric|min:0|max:100',
            'category_id' => 'required|exists:category,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_path.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'variant' => 'nullable|array',
            'variant.*.net_weight_id' => 'nullable|exists:net_weight,id',
            'variant.*.color_id' => 'nullable|exists:color,id',
            'variant.*.price' => 'required|numeric|min:0',
            'variant.*.stock' => 'required|integer|min:0',
        ]);
        return $this->ProductRepository->PostAddProduct($data);
    }
    public function GetProductById($data){
        $this->notificationRoleAccessUser();
        return $this->ProductRepository->GetProductById($data);
    }
    public function UpdateProductById($id,Request $data){
            $this->notificationRoleAccessUser();
         return $this->ProductRepository->UpdateProductById( $id,$data);
    }
    public function DeleteProductById($id){
        $this->notificationRoleAccessUser();
        return $this->ProductRepository->DeleteProductById($id);
    }
    private function notificationRoleAccessUser(){
        $user = Auth::user();
        if(!empty($user) || $user['role'] !== config('contast.Admin')){
            return view('client.index')->with('error','bạn không có quyền truy cập vào trang quản trị');
        }
        return true;
    }
}