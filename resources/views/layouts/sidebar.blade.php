<div class="flex flex-col min-h-screen bg-white border-r shadow-sm">
    <!-- Logo and App Name -->
    <div class="px-3 py-4">
        <div class="flex items-center space-x-3">
            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10" />
                </svg>
            </div>
            <div class="text-xl font-bold text-gray-900 tracking-tight">Stock<span class="text-blue-600">App</span></div>
        </div>
    </div>
    
    <!-- Divider -->
    <div class="px-3">
        <div class="h-px bg-gray-200"></div>
    </div>
    
    <!-- Navigation -->
    <nav class="flex-1 px-3 py-6">
        <div class="space-y-1">
            <!-- Dashboard Link -->
            <a href="{{ route('dashboard') }}" class="group flex items-center px-4 py-3 {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-900 border-l-4 border-blue-500 shadow-sm' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-900 border-l-4 border-transparent' }} transition-all duration-200 rounded-r-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 {{ request()->routeIs('dashboard') ? 'text-blue-600' : 'text-gray-500 group-hover:text-blue-500' }} transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="font-medium">{{ __('Dashboard') }}</span>
            </a>
            
            <!-- Products Link -->
            <a href="{{ route('products.index') }}" class="group flex items-center px-4 py-3 {{ request()->routeIs('products.*') ? 'bg-blue-50 text-blue-900 border-l-4 border-blue-500 shadow-sm' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-900 border-l-4 border-transparent' }} transition-all duration-200 rounded-r-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 {{ request()->routeIs('products.*') ? 'text-blue-500' : 'text-gray-500 group-hover:text-blue-500' }} transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10" />
                </svg>
                <span class="font-medium">{{ __('Products') }}</span>
                @if(isset($productCount) && $productCount > 0)
                    <span class="ml-auto inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-blue-800 bg-blue-100 rounded-full">{{ $productCount }}</span>
                @endif
            </a>
            
            <!-- Categories Link -->
            <a href="{{ route('categories.index') }}" class="group flex items-center px-4 py-3 {{ request()->routeIs('categories.*') ? 'bg-blue-50 text-blue-900 border-l-4 border-blue-500 shadow-sm' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-900 border-l-4 border-transparent' }} transition-all duration-200 rounded-r-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 {{ request()->routeIs('categories.*') ? 'text-blue-500' : 'text-gray-500 group-hover:text-blue-500' }} transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                <span class="font-medium">{{ __('Categories') }}</span>
            </a>
            
            <!-- Suppliers Link -->
            <a href="{{ route('suppliers.index') }}" class="group flex items-center px-4 py-3 {{ request()->routeIs('suppliers.*') ? 'bg-blue-50 text-blue-900 border-l-4 border-blue-500 shadow-sm' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-900 border-l-4 border-transparent' }} transition-all duration-200 rounded-r-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 {{ request()->routeIs('suppliers.*') ? 'text-blue-500' : 'text-gray-500 group-hover:text-blue-500' }} transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                </svg>
                <span class="font-medium">{{ __('Suppliers') }}</span>
            </a>
            
            <!-- Stock Movements Link -->
            <a href="{{ route('stock-movements.index') }}" class="group flex items-center px-4 py-3 {{ request()->routeIs('stock-movements.*') ? 'bg-blue-50 text-blue-900 border-l-4 border-blue-500 shadow-sm' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-900 border-l-4 border-transparent' }} transition-all duration-200 rounded-r-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 {{ request()->routeIs('stock-movements.*') ? 'text-blue-500' : 'text-gray-500 group-hover:text-blue-500' }} transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                </svg>
                <span class="font-medium">{{ __('Stock Movements') }}</span>
            </a>
        </div>
    </nav>
    
    <!-- Bottom Section -->
    <div class="px-3 py-4">
        <div class="p-4 rounded-lg bg-blue-50 border border-blue-100 shadow-sm">
            <div class="flex items-center space-x-3">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white font-bold shadow-sm">
                        {{ auth()->user()->initials ?? 'U' }}
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate">
                        {{ auth()->user()->name ?? 'User' }}
                    </p>
                    <p class="text-xs text-gray-600 truncate">
                        {{ auth()->user()->email ?? 'user@example.com' }}
                    </p>
                </div>
                <div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-blue-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>