<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReorderRequest;
use App\Http\Requests\Admin\ServiceRequest;
use App\Models\Service;
use App\Support\ModelOrder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        return view('admin.services.index', [
            'title' => 'Services',
            'services' => Service::ordered()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.services.create', [
            'title' => 'Create Service',
            'service' => new Service(['availability' => 'ready']),
        ]);
    }

    public function store(ServiceRequest $request): RedirectResponse
    {
        Service::create($request->validated());

        return redirect()->route('admin.services.index')->with('success', 'Service berhasil dibuat.');
    }

    public function edit(Service $service): View
    {
        return view('admin.services.edit', [
            'title' => 'Edit Service',
            'service' => $service,
        ]);
    }

    public function update(ServiceRequest $request, Service $service): RedirectResponse
    {
        $service->update($request->validated());

        return redirect()->route('admin.services.index')->with('success', 'Service berhasil diperbarui.');
    }

    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service berhasil dihapus.');
    }

    public function reorder(ReorderRequest $request): JsonResponse
    {
        ModelOrder::update(Service::class, $request->validated('items'));

        return response()->json(['message' => 'Urutan service berhasil disimpan.']);
    }
}
