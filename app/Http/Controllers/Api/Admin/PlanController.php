<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PlanRequest;
use App\Http\Resources\PlanResource;
use App\Models\Plan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PlanController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return PlanResource::collection(Plan::latest()->paginate(15));
    }

    public function store(PlanRequest $request): JsonResponse
    {
        return PlanResource::make(Plan::create($request->validated()))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Plan $plan): PlanResource
    {
        return PlanResource::make($plan);
    }

    public function update(PlanRequest $request, Plan $plan): PlanResource
    {
        $plan->update($request->validated());

        return PlanResource::make($plan->refresh());
    }

    public function destroy(Plan $plan): JsonResponse
    {
        $plan->delete();

        return response()->json(null, 204);
    }
}
