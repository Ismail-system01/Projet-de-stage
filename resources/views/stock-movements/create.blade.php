<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Stock Movement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('stock-movements.store') }}" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                            <div>
                                <label for="product_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Product</label>
                                <select name="product_id" id="product_id" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">Select a product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                            {{ $product->name }} (Current Stock: {{ $product->quantity }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Movement Type</label>
                                <select name="type" id="type" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">Select type</option>
                                    <option value="{{ \App\Models\StockMovement::TYPE_IN }}" {{ old('type') === \App\Models\StockMovement::TYPE_IN ? 'selected' : '' }}>Stock In</option>
                                    <option value="{{ \App\Models\StockMovement::TYPE_OUT }}" {{ old('type') === \App\Models\StockMovement::TYPE_OUT ? 'selected' : '' }}>Stock Out</option>
                                    <option value="{{ \App\Models\StockMovement::TYPE_ADJUSTMENT }}" {{ old('type') === \App\Models\StockMovement::TYPE_ADJUSTMENT ? 'selected' : '' }}>Adjustment</option>
                                    <option value="{{ \App\Models\StockMovement::TYPE_SALE }}" {{ old('type') === \App\Models\StockMovement::TYPE_SALE ? 'selected' : '' }}>Sale</option>
                                    <option value="{{ \App\Models\StockMovement::TYPE_PURCHASE }}" {{ old('type') === \App\Models\StockMovement::TYPE_PURCHASE ? 'selected' : '' }}>Purchase</option>
                                    <option value="{{ \App\Models\StockMovement::TYPE_RETURN }}" {{ old('type') === \App\Models\StockMovement::TYPE_RETURN ? 'selected' : '' }}>Return</option>
                                    <option value="{{ \App\Models\StockMovement::TYPE_DAMAGE }}" {{ old('type') === \App\Models\StockMovement::TYPE_DAMAGE ? 'selected' : '' }}>Damage</option>
                                </select>
                                @error('type')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Quantity</label>
                                <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}" required min="1" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Enter quantity">
                                @error('quantity')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div id="supplier-section" style="display: none;">
                             <label for="supplier_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Supplier</label>
                            <select name="supplier_id" id="supplier_id" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Select a supplier</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                        {{ $supplier->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('supplier_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="reason" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Reason</label>
                            <textarea name="reason" id="reason" rows="3" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Enter reason for stock movement">{{ old('reason') }}</textarea>
                            @error('reason')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Create Movement
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
        document.getElementById('type').addEventListener('change', function() {
            const supplierSection = document.getElementById('supplier-section');
            // Show supplier section for 'in' or 'purchase' types
            if (this.value === '{{ \App\Models\StockMovement::TYPE_IN }}' || this.value === '{{ \App\Models\StockMovement::TYPE_PURCHASE }}') {
                supplierSection.style.display = 'block';
            } else {
                supplierSection.style.display = 'none';
                document.getElementById('supplier_id').value = '';
            }
        });

        // Show/hide supplier section on page load based on selected type
        const initialType = document.getElementById('type').value;
        if (initialType === '{{ \App\Models\StockMovement::TYPE_IN }}' || initialType === '{{ \App\Models\StockMovement::TYPE_PURCHASE }}') {
            document.getElementById('supplier-section').style.display = 'block';
        } else {
            document.getElementById('supplier-section').style.display = 'none';
        }
    </script>
    @endpush
</x-app-layout>