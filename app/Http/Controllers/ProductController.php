<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::all();

        return response()->json($products);
    }

    public function store(): JsonResponse
    {
        $product = Product::query()->create([
            'name' => request('name'),
            'price' => request('price'),
            'category_id' => request('category_id'),
        ]);

        return response()->json($product);
    }

    public function update(Product $product): JsonResponse
    {
        $product->update([
            'name' => request('name'),
            'price' => request('price'),
            'category_id' => request('category_id'),
        ]);

        return response()->json($product);
    }

    public function show(Product $product): JsonResponse
    {
        return response()->json($product);
    }

    public function destroy(Product $product): JsonResponse
    {
        $product->delete();

        return response()->json(['message' => 'Product deleted']);
    }

    public function search(): JsonResponse
    {
        $products = Product::query()
            ->where('name', 'like', '%' . request('name') . '%')
            ->get();

        return response()->json($products);
    }
}
