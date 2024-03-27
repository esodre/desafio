<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstablishmentRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class OrderController
{
    public function index(): AnonymousResourceCollection
    {
        return OrderResource::collection(Order::all());
    }

    public function show(Order $order): OrderResource
    {
        return OrderResource::make($order);
    }

    public function store(StoreOrderRequest $request): OrderResource | JsonResponse
    {
        try {
            $order = Order::query()->create($request->validated());

            return OrderResource::make($order);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function update(StoreEstablishmentRequest $request, Order $order): OrderResource | JsonResponse
    {
        try {
            $order->update($request->validated());

            return OrderResource::make($order);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);

        }
    }

    public function destroy(Order $order): Response | JsonResponse
    {
        try {
            $order->delete();

            return response()->noContent();
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
