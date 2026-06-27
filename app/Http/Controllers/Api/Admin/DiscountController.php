<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DiscountRequest;
use App\Http\Resources\DiscountResource;
use App\Models\Discount;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DiscountController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        // Kirim semua diskon; frontend memfilter yang aktif berdasarkan tanggal.
        return DiscountResource::collection(Discount::latest()->get());
    }

    public function store(DiscountRequest $request): JsonResponse
    {
        return DiscountResource::make(Discount::create($request->validated()))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Discount $discount): DiscountResource
    {
        return DiscountResource::make($discount);
    }

    public function update(DiscountRequest $request, Discount $discount): DiscountResource
    {
        $discount->update($request->validated());

        return DiscountResource::make($discount->refresh());
    }

    public function destroy(Discount $discount): JsonResponse
    {
        $discount->delete();

        return response()->json(null, 204);
    }
}
