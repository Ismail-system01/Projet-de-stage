<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SupplierController extends Controller
{
    

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $suppliers = Supplier::withCount('stockMovements')->paginate(10);
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'contact_person' => 'nullable|string|max:255',
            'active' => 'nullable|boolean'
        ]);

        // Set active to true by default if not provided
        $validated['active'] = $validated['active'] ?? true;

        Supplier::create($validated);

        return redirect()->route('suppliers.index')
            ->with('success', 'Supplier created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier): View
    {
        $supplier->load('stockMovements.product');
        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier): View
    {
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email,' . $supplier->id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'contact_person' => 'required|string|max:255',
            'active' => 'nullable|boolean' // Changed from 'boolean' to 'nullable|boolean'
        ]);

        $supplier->update($validated);

        return redirect()->route('suppliers.index')
            ->with('success', 'Supplier updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier): RedirectResponse
    {
        if ($supplier->stockMovements()->exists()) {
            return redirect()->route('suppliers.index')
                ->with('error', 'Cannot delete supplier with associated stock movements.');
        }

        $supplier->delete();

        return redirect()->route('suppliers.index')
            ->with('success', 'Supplier deleted successfully.');
    }

    /**
     * Toggle the active status of the supplier.
     */
    public function toggleActive(Supplier $supplier): RedirectResponse
    {
        $supplier->update(['active' => !$supplier->active]);

        $status = $supplier->active ? 'activated' : 'deactivated';
        return redirect()->route('suppliers.index')
            ->with('success', "Supplier {$status} successfully.");
    }
}
