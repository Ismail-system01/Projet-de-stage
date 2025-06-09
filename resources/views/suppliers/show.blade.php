<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Supplier Details') }}
            </h2>
            <div class="space-x-2">
                <a href="{{ route('suppliers.edit', $supplier) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    {{ __('Edit Supplier') }}
                </a>
                <a href="{{ route('suppliers.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-gray-800 dark:text-gray-200 uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    {{ __('Back to List') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <!-- Supplier Information Card -->
                    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">{{ $supplier->name }}</h3>
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full {{ $supplier->is_active ? 'bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-100' : 'bg-red-100 text-red-800 dark:bg-red-700 dark:text-red-100' }}">
                                {{ $supplier->is_active ? __('Active') : __('Inactive') }}
                            </span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Email') }}</p>
                                <p class="text-lg text-gray-700 dark:text-gray-200">{{ $supplier->email ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Phone') }}</p>
                                <p class="text-lg text-gray-700 dark:text-gray-200">{{ $supplier->phone ?? 'N/A' }}</p>
                            </div>
                            <div class="md:col-span-2">
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Address') }}</p>
                                <p class="text-lg text-gray-700 dark:text-gray-200">{{ $supplier->address ?? 'N/A' }}</p>
                            </div>
                             <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Contact Person') }}</p>
                                <p class="text-lg text-gray-700 dark:text-gray-200">{{ $supplier->contact_person ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-500 dark:text-gray-400">
                                <p>{{ __('Created') }}: {{ $supplier->created_at->format('M d, Y H:i') }}</p>
                                <p>{{ __('Last Updated') }}: {{ $supplier->updated_at->format('M d, Y H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Associated Stock Movements -->
                    <div class="mt-8 bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                        <h4 class="text-xl font-semibold text-gray-700 dark:text-gray-200 mb-4">{{ __('Associated Stock Movements') }}</h4>
                        @if ($supplier->stockMovements->isEmpty())
                            <p class="text-gray-500 dark:text-gray-400">{{ __('No stock movements recorded for this supplier.') }}</p>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('Date') }}</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('Product') }}</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('Type') }}</th>
                                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('Quantity') }}</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('Reason') }}</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('User') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach ($supplier->stockMovements()->latest()->get() as $movement)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                    {{ $movement->created_at->format('M d, Y H:i') }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                    {{ $movement->product->name }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                        @if($movement->type === \App\Models\StockMovement::TYPE_IN || $movement->type === \App\Models\StockMovement::TYPE_PURCHASE || $movement->type === \App\Models\StockMovement::TYPE_RETURN) bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-100
                                                        @elseif($movement->type === \App\Models\StockMovement::TYPE_OUT || $movement->type === \App\Models\StockMovement::TYPE_SALE || $movement->type === \App\Models\StockMovement::TYPE_DAMAGE) bg-red-100 text-red-800 dark:bg-red-700 dark:text-red-100
                                                        @else bg-blue-100 text-blue-800 dark:bg-blue-700 dark:text-blue-100
                                                        @endif">
                                                        {{ ucfirst($movement->type) }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 text-right">
                                                    {{ $movement->quantity }}
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                                    {{ $movement->reason ?? '-' }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                    {{ $movement->user->name }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>