<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstablishmentRequest;
use App\Http\Resources\EstablishmentResource;
use App\Models\Establishment;
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

    public function show(Establishment $establishment): AnonymousResourceCollection
    {
        return EstablishmentResource::collection($establishment);
    }
    public function store(StoreEstablishmentRequest $request)
    {
        Establishment::query()->create($request->validated());

        return new EstablishmentResource::($establishment);
    }

    public function update(StoreEstablishmentRequest $request, Establishment $establishment): EstablishmentResource
    {
        $establishment->update($request->validated());

        return EstablishmentResource::make($establishment);
    }

    public function destroy(Establishment $establishment): Response
    {
        $establishment->delete();

        return response()->noContent();
    }
}
