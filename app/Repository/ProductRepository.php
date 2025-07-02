<?php
namespace App\Repository;

use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\NetWeight;
use App\Models\AlbumImage;
use Cloudinary\Cloudinary;
use App\Common\Notification;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductRepository
{
    public $cloudinary;
    public $notification;
    public function __construct(Cloudinary $cloudinary, Notification $notification)
    {
        $this->cloudinary = $cloudinary;
        $this->notification = $notification;
    }
    public function GetAllProductPaginate(Request $request)
    {
        $perPage = 5;
        $page = $request->input('page', 1);

        $query = Product::query()->orderByDesc('created_at')->where('status', 'appear');
        $total = $query->count();
        $products = $query->skip(($page - 1) * $perPage)->take($perPage)->get();

        $lastPage = ceil($total / $perPage);

        return view('admin.product.listProuct', [
            'product' => $products,
            'currentPage' => $page,
            'lastPage' => $lastPage,
            'total' => $total,
            'perPage' => $perPage,
        ]);

    }
    public function FormAddProduct()
    {
        $category = Category::get();
        $net_weith = NetWeight::get();
        $color = Color::get();
        return view('admin.product.AddProduct', compact('category', 'net_weith', 'color'));
    }
    public function PostAddProduct(Request $data)
    {
        try {

            if (!$data->hasFile('image')) {
                return $this->notification->Error('GetAllProductPaginate', 'Hình ảnh chính là bắt buộc');
            }

            $uploadedImage = $this->cloudinary->uploadApi()->upload(
                $data->file('image')->getRealPath()
            );
            $fileImage = $uploadedImage['secure_url'];


            $productModel = Product::create([
                'name' => $data['name'],
                'discount' => $data['discount'] ?? 0,
                'category_id' => (int) $data['category_id'],
                'title' => $data['title'],
                'description' => $data['description'] ?? '',
                'image' => $fileImage,
                'SKU' => $this->generateSKU(),
            ]);


            if ($data->hasFile('image_path')) {
                foreach ($data->file('image_path') as $image_path) {
                    try {
                        $albumImage = $this->cloudinary->uploadApi()->upload($image_path->getRealPath());
                        $Album = $albumImage['secure_url'];

                        AlbumImage::create([
                            'product_id' => $productModel->id,
                            'image_path' => $Album
                        ]);
                    } catch (\Exception $e) {

                        \Log::error('Failed to upload album image: ' . $e->getMessage());
                    }
                }
            }


            $variants = $data->input('variant', []);
            if (!empty($variants)) {
                foreach ($variants as $variant) {
                    // Xác thực từng biến thể
                    if (empty($variant['price']) || $variant['price'] < 0) {
                        continue; // Bỏ qua các biến thể không hợp lệ
                    }

                    ProductVariant::create([
                        'product_id' => $productModel->id,
                        'net_weight_id' => $variant['net_weight_id'] ?? null,
                        'color_id' => $variant['color_id'] ?? null,
                        'price' => $variant['price'],
                        'stock' => $variant['stock'] ?? 0,
                    ]);
                }
            }

            return $this->notification->Success('GetAllProductPaginate', 'Thêm sản phẩm thành công');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->notification->Error('GetAllProductPaginate', 'Dữ liệu không hợp lệ: ' . implode(', ', $e->validator->errors()->all()));

        } catch (\Exception $e) {

            \Log::error('Product creation failed: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'data' => $data->all()
            ]);

            return $this->notification->Error('GetAllProductPaginate', 'Thêm sản phẩm thất bại: ' . $e->getMessage());
        }
    }
    private function generateSKU()
    {
        return 'PRD-' . strtoupper(uniqid());
    }
    public function GetProductById($id)
    {
        $category = Category::get();
        $net_weith = NetWeight::get();
        $color = Color::get();
        $product = Product::query()->Where('id', $id)
            ->with(['productVariant', 'AlbumImage', 'category'])->first();
        return view('admin.product.edit', compact('product', 'category', 'net_weith', 'color'));
    }
    public function UpdateProductById($id, Request $data)
    {
        // dd($data->all());

        // lấy dữ liệu theo id
        $OldProduct = Product::query()->findOrFail($id);
        $AlbumImage = AlbumImage::query()->where('product_id', $id)->get();
        try {
            DB::beginTransaction();
            // kiểm tra có ảnh không
            if ($data->hasfile('image')) {
                $this->cloudinary->adminApi()->deleteAssets([$OldProduct->image], ['resource_type' => 'image']);
                $uploadedImage = $this->cloudinary->uploadApi()->upload(
                    $data->file('image')->getRealPath()
                );
                $fileImage = $uploadedImage['secure_url'];
            }

            $OldProduct->update([
                'name' => $data['name'],
                'discount' => $data['discount'] ?? 0,
                'category_id' => (int) $data['category_id'],
                'title' => $data['title'],
                'description' => $data['description'] ?? '',
                'image' => $data->image !== null ? $fileImage : $OldProduct->image, // có ảnh thì lưu ảnh mới còn không thì lưu ảnh cũ
                'SKU' => $this->generateSKU(),
            ]);

            // ProductVariant::create([
            //             'product_id' => $id,
            //             'net_weight_id' => 1,
            //             'color_id' => 1 ,
            //             'price' => 1323,
            //             'stock' => 13232,
            //     ]);


            //   ProductVariant::create([
            //             'product_id' => $productModel->id,
            //             'net_weight_id' => $variant['net_weight_id'] ?? null,
            //             'color_id' => $variant['color_id'] ?? null,
            //             'price' => $variant['price'],
            //             'stock' => $variant['stock'] ?? 0,
            //         ]);
            // lưu Album ảnh
            if ($data->hasFile('image_path')) {

                foreach ($AlbumImage as $album) {
                    $album->delete();
                    $this->cloudinary->adminApi()->deleteAssets([$album->image_path], ['resource_type' => 'image']);
                }

                foreach ($data->file('image_path') as $album) {
                    try {
                        $albumImage = $this->cloudinary->uploadApi()->upload($album->getRealPath());
                        $imageAlbum = $albumImage['secure_url'];

                        AlbumImage::create([
                            'product_id' => $id,
                            'image_path' => $imageAlbum
                        ]);

                    } catch (\Throwable $th) {

                        return $this->notification->Error(`GetproductById`, $th);
                    }
                }
            }


            // xử lý biến thể
            $variants = $data->input('variant', []);
            if (!empty($variants)) {
                foreach ($variants as $variant) {
                    if (isset($variant['id'])) {
                        $listVariant = ProductVariant::query()->dint($variant['id']);
                        if ($listVariant) {
                            $listVariant->update([
                                'net_weight_id' => $variant['net_weight_id'] ?? null,
                                'color_id' => $variant['color_id'] ?? null,
                                'price' => $variant['price'],
                                'stock' => $variant['stock'] ?? 0,
                            ]);

                        }
                    }else{
                         ProductVariant::create([
                                'product_id' => $id,
                                'net_weight_id' => $variant['net_weight_id'] ?? null,
                                'color_id' => $variant['color_id'] ?? null,
                                'price' => $variant['price'],
                                'stock' => $variant['stock'] ?? 0,
                            ]);
                    }



                }

            }
            DB::commit();
            return $this->notification->Success('GetAllProductPaginate', 'sửa sản phẩm thành công');

        } catch (\Exception $e) {

            \Log::error('Product creation failed: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'data' => $data->all()
            ]);

            return $this->notification->Error('GetAllProductPaginate', 'sửa sản phẩm thất bại: ' . $e->getMessage());
        }
    }
    public function DeleteProductById($id)
    {
        $product = Product::query()->findOrFail($id);
        if (!$product) {
            return $this->notification->Error('GetAllProductPaginate', 'Sản phẩm không tồn tại,không thể xóa');
        }
        $product->update([
            'status' => 'hidden'
        ]);

        return $this->notification->Success('GetAllProductPaginate', 'bạn đã xóa sản phẩm thành cong');

    }
}