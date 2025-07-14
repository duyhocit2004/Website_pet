<?php

namespace App\Repository;

use App\Models\AlbumImage;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;

class ClientRepository
{
    const PATH_VIEW = 'client.DetailProduct.';
    public function DetailProductClient($id)
    {

        $AlbumImage = AlbumImage::query()->where('product_id', $id)->get();

        $product = Product::with('category')
            ->Where('id', $id)
            ->first();

        $variant = ProductVariant::select(
            'color.name as NameColor',
            'net_weight.name as NameNetWeight',
            'color.id as colorID',
            'net_weight.id as net_weightID'
        )
            ->join('color', 'product_vartiant.color_id', '=', 'color.id')
            ->join('net_weight', 'product_vartiant.net_weight_id', '=', 'net_weight.id')
            ->Where('product_id', $id)
            ->get();
        $price = $variant->first();


        // Rút gọn màu sắc
        $color = $variant->map(function ($item) {
            return [
                'id' => $item->colorID,
                'name' => $item->NameColor
            ];
        })->unique('name')->values();



        // Rút gọn khối lượng:
        $netweight = $variant->map(function ($item) {
            return [
                'id' => $item->net_weightID,
                'name' => $item->NameNetWeight
            ];
        })->unique('name')->values();

        // $color = $variant->pluck('NameColor')->unique();
        // $netweight = $variant->pluck('NameNetWeight')->unique();


        // $comment = comment::where('product_id',$id)->get();



        $products = [
            "id" => $id,
            "name" => $product->name,
            "category_name" => $product->category->name,
            'SKU' => $product->SKU,
            "image" => $product->image,
            "title" => $product->title,
            'description' => $product->description,
            "rating" => $product->rating,
            "ListColor" => $color,
            "NetWeight" => $netweight,
            "pricedefault" => number_format($price->price, 0, ',', '.'),
            "album" => $AlbumImage
        ];
        // dd($products);

        return view(self::PATH_VIEW . __FUNCTION__, compact('products'));
    }
}