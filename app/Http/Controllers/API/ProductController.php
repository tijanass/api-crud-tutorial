<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProduct;
use App\Http\Requests\Product\DeleteProduct;
use App\Http\Requests\Product\EditProduct;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id', auth()->id())->paginate(10);

        return ProductResource::collection($products);
    }

    public function store(CreateProduct $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_published' => $request->isPublished,
            'user_id' => auth()->id()
        ]);

        return new ProductResource($product);
    }

    public function show(Product $product)
    {
       return $product;
    }

    public function update(EditProduct $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'is_published' => $request->isPublished,
        ]);

        return new ProductResource($product);
    }

    public function destroy(DeleteProduct $request, Product $product)
    {
        $product->delete();

        return new ProductResource($product);
    }
}
