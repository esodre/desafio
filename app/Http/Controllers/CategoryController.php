<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{

    public function index(): JsonResponse
    {
        $categories = Category::all();

        return response()->json($categories);
    }

    public function store(): JsonResponse
    {
        $category = Category::query()->create([
            'name' => request('name'),
        ]);

        return response()->json($category);
    }

    public function update(Category $category): JsonResponse
    {
        $category->update([
            'name' => request('name'),
        ]);

        return response()->json($category);
    }

    public function show(Category $category): JsonResponse
    {
        return response()->json($category);
    }

    public function destroy(Category $category): JsonResponse
    {
        $category->delete();

        return response()->json(['message' => 'Category deleted']);
    }
}
