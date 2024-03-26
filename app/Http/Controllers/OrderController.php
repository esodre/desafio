<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstablishmentRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\EstablishmentResource;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class OrderController
{
    public function index(): Collection
    {
        return Order::all();
    }

    public function show(Order $order): Order
    {
        return $order;
    }

    public function store(StoreOrderRequest $request): EstablishmentResource
    {
        $order = Order::query()->create($request->validated());

        return EstablishmentResource::make($order);
    }

    public function update(StoreEstablishmentRequest $request, Order $order): EstablishmentResource
    {
        $order->update($request->validated());

        return EstablishmentResource::make($order);
    }

    public function destroy(Order $order): Response
    {
        $order->delete();

        return response()->noContent();
    }
}
