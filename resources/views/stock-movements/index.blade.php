<x-app-layout>
    <div class="min-h-screen bg-white">
        <!-- Header Section -->
        <div class="relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                    <div>
                        <div class="flex items-center mb-2">
                            <div class="p-2 bg-blue-500 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 13v-1m4 1v-1m4 1v-1M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                                </svg>
                            </div>
                            <h1 class="text-4xl font-bold text-gray-800">
                                Stock Movements
                            </h1>
                        </div>
                        <p class="text-gray-600 text-lg">Track and manage your stock movements</p>
                    </div>

                    <div>
                        <a href="{{ route('stock-movements.create') }}"
                           class="inline-flex items-center px-8 py-4 bg-blue-500 rounded-md font-semibold text-white hover:bg-blue-600 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span>Add New Movement</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12">
            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-8">
                    <div class="bg-green-100 border-l-4 border-green-500 rounded-md p-6 shadow-md">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="p-2 bg-green-500 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-green-800 font-semibold text-lg">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Main Content Card -->
            <div class="bg-white rounded-2xl shadow-md border border-gray-200 overflow-hidden">
                <!-- Filter Section -->
                <div class="p-8 bg-gray-50 border-b border-gray-200">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <div class="p-2 bg-blue-100 rounded-lg mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-800">Filter & Search</h2>
                        </div>
                    </div>

                    <form method="GET" class="space-y-6">
                        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                            <!-- Search Input -->
                            <div class="group lg:col-span-2">
                                <label for="search" class="block text-sm font-medium text-gray-700 mb-3">Search Stock Movements</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                    <input type="text" name="search" id="search" value="{{ request('search') }}"
                                           class="w-full pl-12 pr-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                                           placeholder="Search by product name or user...">
                                </div>
                            </div>

                            <!-- Type Filter -->
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700 mb-3">Movement Type</label>
                                <select name="type" id="type" class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                                    <option value="">All Types</option>
                                    <option value="{{ \App\Models\StockMovement::TYPE_IN }}" {{ request('type') === \App\Models\StockMovement::TYPE_IN ? 'selected' : '' }}>Stock In</option>
                                    <option value="{{ \App\Models\StockMovement::TYPE_OUT }}" {{ request('type') === \App\Models\StockMovement::TYPE_OUT ? 'selected' : '' }}>Stock Out</option>
                                    <option value="{{ \App\Models\StockMovement::TYPE_ADJUSTMENT }}" {{ request('type') === \App\Models\StockMovement::TYPE_ADJUSTMENT ? 'selected' : '' }}>Adjustment</option>
                                    <option value="{{ \App\Models\StockMovement::TYPE_SALE }}" {{ request('type') === \App\Models\StockMovement::TYPE_SALE ? 'selected' : '' }}>Sale</option>
                                    <option value="{{ \App\Models\StockMovement::TYPE_PURCHASE }}" {{ request('type') === \App\Models\StockMovement::TYPE_PURCHASE ? 'selected' : '' }}>Purchase</option>
                                    <option value="{{ \App\Models\StockMovement::TYPE_RETURN }}" {{ request('type') === \App\Models\StockMovement::TYPE_RETURN ? 'selected' : '' }}>Return</option>
                                    <option value="{{ \App\Models\StockMovement::TYPE_DAMAGE }}" {{ request('type') === \App\Models\StockMovement::TYPE_DAMAGE ? 'selected' : '' }}>Damage</option>
                                </select>
                            </div>

                            <!-- Date From Filter -->
                            <div>
                                <label for="date_from" class="block text-sm font-medium text-gray-700 mb-3">Date From</label>
                                <input type="date" name="date_from" id="date_from" value="{{ request('date_from') }}"
                                       class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                            </div>

                            <!-- Date To Filter -->
                            <div>
                                <label for="date_to" class="block text-sm font-medium text-gray-700 mb-3">Date To</label>
                                <input type="date" name="date_to" id="date_to" value="{{ request('date_to') }}"
                                       class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex items-end gap-4 lg:col-span-3">
                                <button type="submit"
                                        class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-blue-500 rounded-lg font-semibold text-white shadow-md hover:bg-blue-600 transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                    </svg>
                                    Filter
                                </button>
                                <a href="{{ route('stock-movements.index') }}"
                                   class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-gray-200 hover:bg-gray-300 rounded-lg font-semibold text-gray-700 transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                    Reset
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Stock Movements Grid -->
                <div class="p-8">
                    @forelse ($stockMovements as $movement)
                        @if($loop->first)
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @endif

                        <div class="group relative bg-white rounded-md shadow-md border border-gray-200 overflow-hidden transition-all duration-300 hover:scale-105">
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-xl font-semibold text-gray-800">{{ $movement->product->name }}</h3>
                                    <span class="px-3 py-1 rounded-full text-sm font-medium
                                        @if($movement->type === \App\Models\StockMovement::TYPE_IN || $movement->type === \App\Models\StockMovement::TYPE_PURCHASE || $movement->type === \App\Models\StockMovement::TYPE_RETURN) bg-green-100 text-green-800
                                        @elseif($movement->type === \App\Models\StockMovement::TYPE_OUT || $movement->type === \App\Models\StockMovement::TYPE_SALE || $movement->type === \App\Models\StockMovement::TYPE_DAMAGE) bg-red-100 text-red-800
                                        @else bg-blue-100 text-blue-800
                                        @endif">
                                        {{ ucfirst($movement->type) }}
                                    </span>
                                </div>
                                <p class="text-gray-600 mb-2"><strong>Quantity:</strong> {{ $movement->quantity }}</p>
                                <p class="text-gray-600 mb-2"><strong>Date:</strong> {{ $movement->created_at->format('Y-m-d H:i') }}</p>
                                <p class="text-gray-600 mb-2"><strong>Reason:</strong> {{ $movement->reason ?? '-' }}</p>
                                <p class="text-gray-600 mb-4"><strong>User:</strong> {{ $movement->user->name }}</p>

                                <div class="flex justify-end space-x-3">

                                    <form action="{{ route('stock-movements.destroy', $movement) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this stock movement?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @if($loop->last)
                            </div>
                        @endif
                    @empty
                        <div class="p-6 text-center text-gray-500">
                            No stock movements found.
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="p-8 border-t border-gray-200 bg-gray-50">
                    {{ $stockMovements->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>