<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PortfolioRequest;
use App\Http\Resources\PortfolioResource;
use App\Models\Portfolio;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PortfolioController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return PortfolioResource::collection(Portfolio::ordered()->paginate(15));
    }

    public function store(PortfolioRequest $request): JsonResponse
    {
        return PortfolioResource::make(Portfolio::create($request->validated()))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Portfolio $portfolio): PortfolioResource
    {
        return PortfolioResource::make($portfolio);
    }

    public function update(PortfolioRequest $request, Portfolio $portfolio): PortfolioResource
    {
        $portfolio->update($request->validated());

        return PortfolioResource::make($portfolio->refresh());
    }

    public function destroy(Portfolio $portfolio): JsonResponse
    {
        $portfolio->delete();

        return response()->json(null, 204);
    }
}
