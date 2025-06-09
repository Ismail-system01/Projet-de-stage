<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="flex items-center space-x-4">
                <button class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add New
                </button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Main Action Cards -->
            <div class="grid grid-cols-4 gap-6">
                <!-- Categories Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-all duration-300 border border-gray-100 hover:border-indigo-100 hover:translate-y-[-2px]">
                    <a href="{{ route('categories.index') }}" class="block p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-2 bg-indigo-50 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Categories</h3>
                        <p class="text-gray-600">Manage product categories and organization</p>
                    </a>
                </div>

                <!-- Products Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-all duration-300 border border-gray-100 hover:border-indigo-100 hover:translate-y-[-2px]">
                    <a href="{{ route('products.index') }}" class="block p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-2 bg-blue-50 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Products</h3>
                        <p class="text-gray-600">Manage your product inventory and details</p>
                    </a>
                </div>

                <!-- Stock Movements Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-all duration-300 border border-gray-100 hover:border-indigo-100 hover:translate-y-[-2px]">
                    <a href="{{ route('stock-movements.index') }}" class="block p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-2 bg-green-50 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Stock Movements</h3>
                        <p class="text-gray-600">Track inventory changes and stock history</p>
                    </a>
                </div>

                <!-- Suppliers Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-all duration-300 border border-gray-100 hover:border-indigo-100 hover:translate-y-[-2px]">
                    <a href="{{ route('suppliers.index') }}" class="block p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-2 bg-amber-50 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Suppliers</h3>
                        <p class="text-gray-600">Manage your suppliers and vendor relationships</p>
                    </a>
                </div>
            </div>

            <!-- Quick Stats Section -->
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-800">Quick Stats</h3>
                        <span class="text-sm text-gray-500">Last updated: {{ now()->format('M d, Y H:i') }}</span>
                    </div>
                    <div class="grid grid-cols-4 gap-6">
                        <div class="p-6 bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-lg border border-indigo-100">
                            <div class="flex items-center justify-between mb-2">
                                <p class="text-sm font-medium text-indigo-600">Total Products</p>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10" />
                                </svg>
                            </div>
                            <p class="text-3xl font-bold text-gray-800">{{ \App\Models\Product::count() }}</p>
                            <div class="mt-2 text-xs text-indigo-600">
                                <span class="font-medium">+{{ \App\Models\Product::whereDate('created_at', '>=', now()->subDays(7))->count() }}</span> new this week
                            </div>
                        </div>
                        
                        <div class="p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg border border-blue-100">
                            <div class="flex items-center justify-between mb-2">
                                <p class="text-sm font-medium text-blue-600">Total Categories</p>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <p class="text-3xl font-bold text-gray-800">{{ \App\Models\Category::count() }}</p>
                            <div class="mt-2 text-xs text-blue-600">
                                <span class="font-medium">{{ \App\Models\Category::count() }}</span> total categories
                            </div>
                        </div>
                        
                        <div class="p-6 bg-gradient-to-br from-green-50 to-green-100 rounded-lg border border-green-100">
                            <div class="flex items-center justify-between mb-2">
                                <p class="text-sm font-medium text-green-600">Active Suppliers</p>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                </svg>
                            </div>
                            <p class="text-3xl font-bold text-gray-800">{{ \App\Models\Supplier::where('active', true)->count() }}</p>
                            <div class="mt-2 text-xs text-green-600">
                                @php
                                    $totalSuppliers = \App\Models\Supplier::count();
                                    $activeSuppliers = \App\Models\Supplier::where('active', true)->count();
                                @endphp
                                @if($totalSuppliers > 0)
                                    <span class="font-medium">{{ round(($activeSuppliers / $totalSuppliers) * 100) }}%</span> of all suppliers
                                @else
                                    <span class="font-medium">No suppliers yet</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="p-6 bg-gradient-to-br from-amber-50 to-amber-100 rounded-lg border border-amber-100">
                            <div class="flex items-center justify-between mb-2">
                                <p class="text-sm font-medium text-amber-600">Today's Movements</p>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                </svg>
                            </div>
                            <p class="text-3xl font-bold text-gray-800">{{ \App\Models\StockMovement::whereDate('created_at', today())->count() }}</p>
                            <div class="mt-2 text-xs text-amber-600">
                                <span class="font-medium">{{ \App\Models\StockMovement::whereDate('created_at', today())->where('type', 'in')->count() }}</span> in / 
                                <span class="font-medium">{{ \App\Models\StockMovement::whereDate('created_at', today())->where('type', 'out')->count() }}</span> out
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Dashboard Sections -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Recent Activity -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">Recent Activity</h3>
                            <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 transition-colors">View all</a>
                        </div>
                        <div class="space-y-4">
                            @foreach(\App\Models\StockMovement::latest()->take(3)->get() as $movement)
                            <div class="flex items-start gap-4">
                                <div class="rounded-full p-2 bg-{{ $movement->type == 'in' ? 'green' : 'red' }}-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-{{ $movement->type == 'in' ? 'green' : 'red' }}-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $movement->type == 'in' ? 'M5 10l7-7m0 0l7 7m-7-7v18' : 'M19 14l-7 7m0 0l-7-7m7 7V3' }}" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium">{{ $movement->product->name }}</p>
                                    <p class="text-sm text-gray-600">{{ $movement->quantity }} units {{ $movement->type == 'in' ? 'added to' : 'removed from' }} inventory</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ $movement->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Low Stock Alerts -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">Low Stock Alerts</h3>
                            {{-- <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 transition-colors">View all</a> --}}
                        </div>
                        <div class="space-y-4">
                            {{-- @foreach(\App\Models\Product::where('stock', '<=', 'min_stock')->take(3)->get() as $product) --}}
                            {{-- <div class="flex items-start gap-4"> --}}
                                {{-- <div class="rounded-full p-2 bg-red-100"> --}}
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"> --}}
                                        {{-- <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /> --}}
                                    {{-- </svg> --}}
                                {{-- </div> --}}
                                {{-- <div> --}}
                                    {{-- <p class="font-medium">{{ $product->name }}</p> --}}
                                    {{-- <p class="text-sm text-gray-600">{{ $product->stock }} units remaining (min: {{ $product->min_stock }})</p> --}}
                                    {{-- <div class="mt-2"> --}}
                                        {{-- <a href="{{ route('products.edit', $product) }}" class="inline-flex items-center px-2.5 py-1.5 border border-indigo-300 text-xs font-medium rounded text-indigo-700 bg-indigo-50 hover:bg-indigo-100 transition-colors"> --}}
                                            {{-- Restock --}}
                                        {{-- </a> --}}
                                    {{-- </div> --}}
                                {{-- </div> --}}
                            {{-- </div> --}}
                            {{-- @endforeach --}}
                            <p class="text-gray-600">Low stock alerts will be implemented soon.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>