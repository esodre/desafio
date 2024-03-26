<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
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

    public function store(StoreClientRequest $request): ClientResource
    {
        $client = Client::query()->create($request->validated());

        return ClientResource::make($client);
    }

    public function update(StoreClientRequest $request, Client $client): ClientResource
    {
        $client->update($request->validated());

        return ClientResource::make($client);
    }

    public function destroy(Client $client): Response
    {
        $client->delete();

        return response()->noContent();
    }
}
