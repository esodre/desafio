<?php

namespace App\Http\Controllers;

use App\Enums\CategoryType;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return CategoryResource::collection(Category::query()->whereIn('type', [CategoryType::ESTABLISHMENT, CategoryType::PRODUCT])->get());
    }

    public function show(Category $category): CategoryResource
    {
        return new CategoryResource($category);
    }

    public function store(StoreCategoryRequest $request): CategoryResource | JsonResponse
    {
        try {
            $category = Category::query()->create($request->validated());

            return CategoryResource::make($category);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function update(Category $category, StoreCategoryRequest $request): CategoryResource | JsonResponse
    {
        try {
            $category->update($request->validated());

            return new CategoryResource($category);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);

        }
    }

    public function destroy(Category $category): Response | JsonResponse
    {
        try {
            $category->delete();

            return response()->noContent();
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
