<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PortfolioRequest;
use App\Models\Portfolio;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        return view('admin.portfolio.index', [
            'title' => 'Portfolio',
            'portfolios' => Portfolio::latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.portfolio.create', [
            'title' => 'Create Portfolio',
            'portfolio' => new Portfolio(),
        ]);
    }

    public function store(PortfolioRequest $request): RedirectResponse
    {
        Portfolio::create($request->validated());

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio berhasil dibuat.');
    }

    public function edit(Portfolio $portfolio): View
    {
        return view('admin.portfolio.edit', [
            'title' => 'Edit Portfolio',
            'portfolio' => $portfolio,
        ]);
    }

    public function update(PortfolioRequest $request, Portfolio $portfolio): RedirectResponse
    {
        $portfolio->update($request->validated());

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio berhasil diperbarui.');
    }

    public function destroy(Portfolio $portfolio): RedirectResponse
    {
        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio berhasil dihapus.');
    }
}
