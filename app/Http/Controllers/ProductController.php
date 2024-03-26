<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $products = Product::with('category')
            ->when(request('name'), fn($query) => $query->where('name', 'like', '%' . request('name') . '%'))
            ->get();

        return ProductResource::collection($products);
    }

    public function store(StoreProductRequest $request): ProductResource
    {
        $product = Product::query()->create($request->validated());

        return new ProductResource($product);
    }

    public function update(Product $product, StoreProductRequest $request): ProductResource
    {
        $product->update($request->validated());

        return new ProductResource($product);
    }

    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }

    public function destroy(Product $product): Response
    {
        $product->delete();

        return response()->noContent();
    }
}
