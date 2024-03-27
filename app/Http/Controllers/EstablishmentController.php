<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstablishmentRequest;
use App\Http\Resources\EstablishmentResource;
use App\Models\Establishment;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class EstablishmentController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $establishments = Establishment::with(['category', 'product'])->get();

        return EstablishmentResource::collection($establishments);
    }

    public function show(Establishment $establishment): EstablishmentResource
    {
        return EstablishmentResource::make($establishment);
    }

    public function store(StoreEstablishmentRequest $request): EstablishmentResource | JsonResponse
    {
        try {
           $establishment =  Establishment::query()->create($request->validated());

            return EstablishmentResource::make($establishment);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function update(StoreEstablishmentRequest $request, Establishment $establishment): EstablishmentResource | JsonResponse
    {
        try {
            $establishment->update($request->validated());

            return EstablishmentResource::make($establishment);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }

    }

    public function destroy(Establishment $establishment): JsonResponse
    {
        try {
            $establishment->delete();
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }

        return response()->json(['message' => 'Establishment deleted successfully']);
    }
}
