<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PlanRequest;
use App\Models\Plan;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PlanController extends Controller
{
    public function index(): View
    {
        return view('admin.plans.index', [
            'title' => 'Plans',
            'plans' => Plan::latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.plans.create', [
            'title' => 'Create Plan',
            'plan' => new Plan(['highlight' => false]),
        ]);
    }

    public function store(PlanRequest $request): RedirectResponse
    {
        Plan::create($request->validated());

        return redirect()->route('admin.plans.index')->with('success', 'Plan berhasil dibuat.');
    }

    public function edit(Plan $plan): View
    {
        return view('admin.plans.edit', [
            'title' => 'Edit Plan',
            'plan' => $plan,
        ]);
    }

    public function update(PlanRequest $request, Plan $plan): RedirectResponse
    {
        $plan->update($request->validated());

        return redirect()->route('admin.plans.index')->with('success', 'Plan berhasil diperbarui.');
    }

    public function destroy(Plan $plan): RedirectResponse
    {
        $plan->delete();

        return redirect()->route('admin.plans.index')->with('success', 'Plan berhasil dihapus.');
    }
}
