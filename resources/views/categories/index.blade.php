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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                            </div>
                            <h1 class="text-4xl font-bold text-gray-800">
                                Categories
                            </h1>
                        </div>
                        <p class="text-gray-600 text-lg">Organize your products effectively</p>
                    </div>
                    
                    <div>
                        <a href="{{ route('categories.create') }}" 
                           class="inline-flex items-center px-8 py-4 bg-blue-500 rounded-md font-semibold text-white hover:bg-blue-600 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span>Add New Category</span>
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
                                <label for="search" class="block text-sm font-medium text-gray-700 mb-3">Search Categories</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                    <input type="text" name="search" id="search" value="{{ request('search') }}" 
                                           class="w-full pl-12 pr-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-300" 
                                           placeholder="Search by category name...">
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
                                <a href="{{ route('categories.index') }}" 
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

                <!-- Categories Grid -->
                <div class="p-8">
                    @forelse ($categories as $category)
                        @if($loop->first)
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @endif
                        
                        <div class="group relative bg-white rounded-md shadow-md border border-gray-200 overflow-hidden transition-all duration-300 hover:scale-105">
                            <!-- Category Header -->
                            <div class="p-6">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="flex-1">
                                        <h3 class="text-xl font-semibold text-gray-800 mb-2 group-hover:text-blue-600 transition-colors">
                                            {{ $category->name }}
                                        </h3>
                                        <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700 border border-blue-200">
                                            {{ $category->products_count }} {{ Str::plural('product', $category->products_count) }}
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Actions -->
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('categories.show', $category) }}" 
                                       class="flex-1 inline-flex items-center justify-center px-4 py-2 bg-blue-500 rounded-lg text-white font-medium hover:bg-blue-600 transition-colors duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        View
                                    </a>
                                    
                                    <a href="{{ route('categories.edit', $category) }}" 
                                       class="p-3 bg-amber-100 hover:bg-amber-200 rounded-lg text-amber-600 hover:text-amber-700 transition-colors duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="p-3 bg-red-100 hover:bg-red-200 rounded-lg text-red-600 hover:text-red-700 transition-colors duration-300" 
                                                onclick="return confirm('Are you sure you want to delete this category? This will also delete all associated products.')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        @if($loop->last)
                            </div>
                        @endif
                        
                    @empty
                        <!-- Empty State -->
                        <div class="text-center py-16">
                            <div class="relative">
                                <div class="mx-auto w-24 h-24 bg-blue-500 rounded-3xl flex items-center justify-center mb-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-800 mb-3">No categories found</h3>
                                <p class="text-gray-600 text-lg mb-8 max-w-md mx-auto">
                                    {{ request()->has('search') 
                                        ? 'Try adjusting your search to find what you\'re looking for.' 
                                        : 'Get started by adding your first category.' }}
                                </p>
                                <a href="{{ route('categories.create') }}" 
                                   class="inline-flex items-center px-8 py-4 bg-blue-500 rounded-md font-semibold text-white shadow-md hover:bg-blue-600 transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Add Your First Category
                                </a>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if($categories->hasPages())
                    <div class="px-8 pb-8">
                        <div class="flex justify-center">
                            <div class="bg-white rounded-md shadow-sm border border-gray-200 p-4">
                                {{ $categories->links() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>