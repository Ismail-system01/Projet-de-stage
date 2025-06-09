<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StockMovement;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; // Add this line

class StockMovementController extends Controller
{
    // Remove the constructor with middleware
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $stockMovements = StockMovement::with(['product', 'supplier', 'user'])->latest()->paginate(10);
        return view('stock-movements.index', compact('stockMovements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $products = Product::all();
        $suppliers = Supplier::where('active', true)->get();
        return view('stock-movements.create', compact('products', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse // Ensure Request is injected
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:' . implode(',', [StockMovement::TYPE_IN, StockMovement::TYPE_OUT, StockMovement::TYPE_ADJUSTMENT, StockMovement::TYPE_SALE, StockMovement::TYPE_PURCHASE, StockMovement::TYPE_RETURN, StockMovement::TYPE_DAMAGE]),
            'quantity' => 'required|integer',
            'reason' => 'required|string',
            'supplier_id' => 'nullable|exists:suppliers,id'
        ]);

        // Add user_id to the validated data
        $validated['user_id'] = Auth::id(); // Use Auth::id()

        DB::transaction(function () use ($validated) {
            // Create the stock movement
            $movement = StockMovement::create($validated);

            // Update the product quantity
            $product = Product::findOrFail($validated['product_id']);
            $quantity = $validated['type'] === StockMovement::TYPE_OUT ? -$validated['quantity'] : $validated['quantity'];
            $product->updateStock($quantity);
        });

        return redirect()->route('stock-movements.index')
            ->with('success', 'Stock movement recorded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StockMovement $stockMovement): View
    {
        return view('stock-movements.show', compact('stockMovement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StockMovement $stockMovement): View
    {
        $products = Product::all();
        $suppliers = Supplier::where('active', true)->get();
        return view('stock-movements.edit', compact('stockMovement', 'products', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StockMovement $stockMovement): RedirectResponse
    {
        // Reverse the previous stock movement
        $oldQuantity = $stockMovement->type === StockMovement::TYPE_OUT ? $stockMovement->quantity : -$stockMovement->quantity;
        $stockMovement->product->updateStock($oldQuantity);

        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:' . implode(',', [StockMovement::TYPE_IN, StockMovement::TYPE_OUT, StockMovement::TYPE_ADJUSTMENT, StockMovement::TYPE_SALE, StockMovement::TYPE_PURCHASE, StockMovement::TYPE_RETURN, StockMovement::TYPE_DAMAGE]),
            'quantity' => 'required|integer',
            'reason' => 'required|string',
            'supplier_id' => 'nullable|exists:suppliers,id'
        ]);

        DB::transaction(function () use ($validated, $stockMovement) {
            // Update the stock movement
            $stockMovement->update($validated);

            // Update the product quantity with the new values
            $quantity = $validated['type'] === StockMovement::TYPE_OUT ? -$validated['quantity'] : $validated['quantity'];
            $stockMovement->product->updateStock($quantity);
        });

        return redirect()->route('stock-movements.index')
            ->with('success', 'Stock movement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StockMovement $stockMovement): RedirectResponse
    {
        // Reverse the stock movement effect on product quantity
        $quantity = $stockMovement->type === StockMovement::TYPE_OUT ? $stockMovement->quantity : -$stockMovement->quantity;
        
        DB::transaction(function () use ($stockMovement, $quantity) {
            $stockMovement->product->updateStock($quantity);
            $stockMovement->delete();
        });

        return redirect()->route('stock-movements.index')
            ->with('success', 'Stock movement deleted successfully.');
    }
}
