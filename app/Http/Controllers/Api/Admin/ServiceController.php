<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ServiceController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ServiceResource::collection(Service::latest()->paginate(15));
    }

    public function store(ServiceRequest $request): JsonResponse
    {
        return ServiceResource::make(Service::create($request->validated()))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Service $service): ServiceResource
    {
        return ServiceResource::make($service);
    }

    public function update(ServiceRequest $request, Service $service): ServiceResource
    {
        $service->update($request->validated());

        return ServiceResource::make($service->refresh());
    }

    public function destroy(Service $service): JsonResponse
    {
        $service->delete();

        return response()->json(null, 204);
    }
}
