<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Stock Movement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('stock-movements.update', $stockMovement) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                            <div>
                                <label for="product_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Product
                                </label>
                                <select id="product_id" name="product_id" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">Select a product</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ old('product_id', $stockMovement->product_id) == $product->id ? 'selected' : '' }}>
                                            {{ $product->name }} (Current Stock: {{ $product->quantity ?? 'N/A' }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Movement Type
                                </label>
                                <select id="type" name="type" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">Select type</option>
                                    <option value="{{ \App\Models\StockMovement::TYPE_IN }}" {{ old('type', $stockMovement->type) === \App\Models\StockMovement::TYPE_IN ? 'selected' : '' }}>Stock In</option>
                                    <option value="{{ \App\Models\StockMovement::TYPE_OUT }}" {{ old('type', $stockMovement->type) === \App\Models\StockMovement::TYPE_OUT ? 'selected' : '' }}>Stock Out</option>
                                    <option value="{{ \App\Models\StockMovement::TYPE_ADJUSTMENT }}" {{ old('type', $stockMovement->type) === \App\Models\StockMovement::TYPE_ADJUSTMENT ? 'selected' : '' }}>Adjustment</option>
                                    <option value="{{ \App\Models\StockMovement::TYPE_SALE }}" {{ old('type', $stockMovement->type) === \App\Models\StockMovement::TYPE_SALE ? 'selected' : '' }}>Sale</option>
                                    <option value="{{ \App\Models\StockMovement::TYPE_PURCHASE }}" {{ old('type', $stockMovement->type) === \App\Models\StockMovement::TYPE_PURCHASE ? 'selected' : '' }}>Purchase</option>
                                    <option value="{{ \App\Models\StockMovement::TYPE_RETURN }}" {{ old('type', $stockMovement->type) === \App\Models\StockMovement::TYPE_RETURN ? 'selected' : '' }}>Return</option>
                                    <option value="{{ \App\Models\StockMovement::TYPE_DAMAGE }}" {{ old('type', $stockMovement->type) === \App\Models\StockMovement::TYPE_DAMAGE ? 'selected' : '' }}>Damage</option>
                                </select>
                                @error('type')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Quantity
                                </label>
                                <input type="number" min="1" step="1" name="quantity" id="quantity" value="{{ old('quantity', $stockMovement->quantity) }}" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('quantity')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div id="supplier-section">
                            <label for="supplier_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Supplier (Optional for Stock Out)
                            </label>
                            <select id="supplier_id" name="supplier_id" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Select a supplier</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" {{ old('supplier_id', $stockMovement->supplier_id) == $supplier->id ? 'selected' : '' }}>
                                        {{ $supplier->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('supplier_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="reason" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Reason
                            </label>
                            <textarea id="reason" name="reason" rows="3" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('reason', $stockMovement->reason) }}</textarea>
                            @error('reason')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Update Movement
                            </button>
                            <a href="{{ route('stock-movements.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 focus:bg-gray-600 active:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const typeSelect = document.getElementById('type');
            const supplierSection = document.getElementById('supplier-section');

            function toggleSupplierSection() {
                // Show supplier section for 'in' or 'purchase' types
                if (typeSelect.value === '{{ \App\Models\StockMovement::TYPE_IN }}' || typeSelect.value === '{{ \App\Models\StockMovement::TYPE_PURCHASE }}') {
                    supplierSection.style.display = 'block';
                } else {
                    supplierSection.style.display = 'none';
                    document.getElementById('supplier_id').value = '';
                }
            }

            // Initial call on page load
            toggleSupplierSection();

            // Add event listener for changes
            typeSelect.addEventListener('change', toggleSupplierSection);
        });
    </script>
    @endpush
</x-app-layout>