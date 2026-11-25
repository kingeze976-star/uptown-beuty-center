<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display a listing of services.
     */
    public function index(Request $request): View
    {
        $query = Service::query()->where('is_active', true);

        if ($request->filled('category')) {
            $query->where('category', $request->string('category'));
        }

        $services = $query->orderBy('category')->orderBy('name')->get();
        $categories = Service::where('is_active', true)
            ->distinct()
            ->pluck('category');

        return view('services.index', compact('services', 'categories'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create(): View
    {
        return view('services.create');
    }

    /**
     * Store a newly created service in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'category' => ['required', 'string', 'max:60'],
            'description' => ['nullable', 'string', 'max:1000'],
            'duration_minutes' => ['required', 'integer', 'min:10', 'max:480'],
            'price' => ['required', 'numeric', 'min:0'],
            'is_active' => ['sometimes', 'boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        Service::create($validated);

        return redirect()
            ->route('services.index')
            ->with('status', 'Service added successfully.');
    }

    /**
     * Display a single service.
     */
    public function show(Service $service): View
    {
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified service.
     */
    public function edit(Service $service): View
    {
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified service in storage.
     */
    public function update(Request $request, Service $service): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'category' => ['required', 'string', 'max:60'],
            'description' => ['nullable', 'string', 'max:1000'],
            'duration_minutes' => ['required', 'integer', 'min:10', 'max:480'],
            'price' => ['required', 'numeric', 'min:0'],
            'is_active' => ['sometimes', 'boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $service->update($validated);

        return redirect()
            ->route('services.index')
            ->with('status', 'Service updated successfully.');
    }

    /**
     * Remove the specified service from storage.
     */
    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()
            ->route('services.index')
            ->with('status', 'Service deleted.');
    }
}