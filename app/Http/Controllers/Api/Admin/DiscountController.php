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
        return DiscountResource::collection(Discount::with('product')->latest()->paginate(15));
    }

    public function store(DiscountRequest $request): JsonResponse
    {
        return DiscountResource::make(Discount::create($request->validated())->load('product'))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Discount $discount): DiscountResource
    {
        return DiscountResource::make($discount->load('product'));
    }

    public function update(DiscountRequest $request, Discount $discount): DiscountResource
    {
        $discount->update($request->validated());

        return DiscountResource::make($discount->refresh()->load('product'));
    }

    public function destroy(Discount $discount): JsonResponse
    {
        $discount->delete();

        return response()->json(null, 204);
    }
}
