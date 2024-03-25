<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class EstablishmentController extends Controller
{
    public function index(): JsonResponse
    {
        $establishments = Establishment::all();

        return response()->json($establishments);
    }

    public function show(Establishment $establishment): JsonResponse
    {
        return response()->json($establishment);
    }
    public function store(): JsonResponse
    {
        $establishment = Establishment::query()->create([
            'name' => request('name'),
            'category_id' => request('category_id'),
        ]);

        return response()->json($establishment);
    }

    public function update(Establishment $establishment): JsonResponse
    {
        $establishment->update([
            'name' => request('name'),
            'category_id' => request('category_id'),
        ]);

        return response()->json($establishment);
    }

    public function destroy(Establishment $establishment): JsonResponse
    {
        $establishment->delete();

        return response()->json(['message' => 'Establishment deleted']);
    }
}
