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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10" />
                                </svg>
                            </div>
                            <h1 class="text-4xl font-bold text-gray-800">
                                Products
                            </h1>
                        </div>
                        <p class="text-gray-600 text-lg">Manage your product inventory with ease</p>
                    </div>
                    
                    <div>
                        <a href="{{ route('products.create') }}" 
                           class="inline-flex items-center px-8 py-4 bg-blue-500 rounded-md font-semibold text-white hover:bg-blue-600 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span>Add New Product</span>
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
                            <!-- Category Filter -->
                            <div class="group">
                                <label for="category" class="block text-sm font-medium text-gray-700 mb-3">Category</label>
                                <div class="relative">
                                    <select name="category" id="category" 
                                            class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 appearance-none">
                                        <option value="">All Categories</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Search Input -->
                            <div class="group lg:col-span-2">
                                <label for="search" class="block text-sm font-medium text-gray-700 mb-3">Search Products</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                    <input type="text" name="search" id="search" value="{{ request('search') }}" 
                                           class="w-full pl-12 pr-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300" 
                                           placeholder="Search by name, description...">
                                </div>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="flex items-end gap-4">
                                <button type="submit" 
                                        class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-blue-500 rounded-lg font-semibold text-white shadow-md hover:bg-blue-600 transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                    </svg>
                                    Filter
                                </button>
                                <a href="{{ route('products.index') }}" 
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

                <!-- Products Grid -->
                <div class="p-8">
                    @forelse ($products as $product)
                        @if($loop->first)
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @endif
                        
                        <div class="group relative bg-white rounded-md shadow-md border border-gray-200 overflow-hidden transition-all duration-300 hover:scale-105">

                            <!-- Product Details -->
                            <div class="p-6">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="flex-1">
                                        <h3 class="text-xl font-semibold text-gray-800 mb-2 group-hover:text-blue-600 transition-colors">
                                            {{ $product->name }}
                                        </h3>
                                        <p class="text-gray-600 text-sm mb-2">Category: {{ $product->category->name }}</p>
                                        <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                            @if($product->quantity > 10)
                                                bg-green-100 text-green-700 border border-green-200
                                            @elseif($product->quantity > 0)
                                                bg-yellow-100 text-yellow-700 border border-yellow-200
                                            @else
                                                bg-red-100 text-red-700 border border-red-200
                                            @endif
                                        ">
                                            Stock: {{ $product->quantity }}
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-2xl font-bold text-gray-900">${{ number_format($product->price, 2) }}</p>
                                    </div>
                                </div>

                                <p class="text-gray-700 text-base mb-4 line-clamp-3">{{ $product->description }}</p>

                                <!-- Actions -->
                                <div class="flex space-x-3">
                                    <a href="{{ route('products.show', $product->id) }}"
                                       class="flex-1 inline-flex items-center justify-center px-4 py-2 bg-blue-50 rounded-md font-medium text-blue-700 hover:bg-blue-100 transition-colors duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        View
                                    </a>
                                    <a href="{{ route('products.edit', $product->id) }}"
                                       class="flex-1 inline-flex items-center justify-center px-4 py-2 bg-yellow-50 rounded-md font-medium text-yellow-700 hover:bg-yellow-100 transition-colors duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="flex-1 inline-flex items-center justify-center px-4 py-2 bg-red-50 rounded-md font-medium text-red-700 hover:bg-red-100 transition-colors duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
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
                        <div class="col-span-full text-center py-12">
                            <p class="text-gray-500 text-lg">No products found.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="p-8 border-t border-gray-200 bg-gray-50">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>