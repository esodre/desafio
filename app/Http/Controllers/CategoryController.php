<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return CategoryResource::collection(Category::all());
    }

    public function show(Category $category): CategoryResource
    {
        return new CategoryResource($category);
    }

    public function store(StoreCategoryRequest $request): CategoryResource
    {
        $category = Category::query()->create($request->validated());

        return new CategoryResource($category);
    }

    public function update(Category $category, StoreCategoryRequest $request): JsonResponse
    {
        $category->update($request->validated());

        return response()->json($category);
    }

    public function destroy(Category $category): \Illuminate\Http\Response
    {
        $category->delete();

        return response()->noContent();
    }
}
