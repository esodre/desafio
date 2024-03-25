<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class ClientController extends Controller
{
    public function index(): JsonResponse
    {
       $clients = Client::all();

       return response()->json($clients);
    }

    public function show(Client $client): JsonResponse
    {
        return response()->json($client);
    }

    public function store(): JsonResponse
    {
        $client = Client::query()->create([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'address' => request('address'),
        ]);

        return response()->json($client);
    }

    public function update(Client $client): JsonResponse
    {
        $client->update([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'address' => request('address'),
        ]);

        return response()->json($client);
    }

    public function destroy(Client $client): JsonResponse
    {
        $client->delete();

        return response()->json(['message' => 'Client deleted']);
    }
}
