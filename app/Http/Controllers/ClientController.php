<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ClientController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
       $clients = Client::with(['orders'])->get();

       return ClientResource::collection($clients);
    }

    public function show(Client $client): ClientResource
    {
        return ClientResource::make($client);
    }

    public function store(StoreClientRequest $request): ClientResource | JsonResponse
    {
        try {
            $client = Client::query()->create($request->validated());

            return ClientResource::make($client);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function update(StoreClientRequest $request, Client $client): ClientResource | JsonResponse
    {
        try {
            $client->update($request->validated());

            return ClientResource::make($client);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function destroy(Client $client): Response | JsonResponse
    {
        try {
            $client->delete();

            return response()->noContent();
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
