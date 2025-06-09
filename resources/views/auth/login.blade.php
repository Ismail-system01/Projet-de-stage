<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="max-w-md w-full space-y-8">
        <!-- Header Section -->
        <div class="text-center animate-fade-in-down">
            <div class="mx-auto h-16 w-16 bg-gradient-to-br from-primary-500 to-gradient-purple rounded-2xl flex items-center justify-center shadow-glow animate-pulse-glow mb-6">
                <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </div>
            <h2 class="text-3xl font-bold font-display bg-gradient-to-r from-primary-700 to-gradient-purple bg-clip-text text-transparent">
                Welcome Back
            </h2>
            <p class="mt-2 text-muted-foreground">Sign in to your account to continue</p>
        </div>

        <!-- Form Container -->
        <div class="bg-glass-white backdrop-blur-xl border border-glass-border rounded-3xl shadow-glass p-8 animate-fade-in-up">
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Field -->
                <div class="animate-slide-up" style="animation-delay: 0.1s; animation-fill-mode: both;">
                    <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-foreground/80 mb-2" />
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary-500/20 to-gradient-blue/20 rounded-xl blur opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <x-text-input 
                            id="email" 
                            class="relative block w-full px-4 py-3 text-foreground bg-glass-light/50 border border-glass-border rounded-xl focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 transition-all duration-300 hover:bg-glass-light/70 placeholder:text-muted-foreground/60" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            placeholder="Enter your email address"
                            required 
                            autofocus 
                            autocomplete="username" 
                        />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-destructive text-sm animate-fade-in" />
                </div>

                <!-- Password Field -->
                <div class="animate-slide-up" style="animation-delay: 0.2s; animation-fill-mode: both;">
                    <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-foreground/80 mb-2" />
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary-500/20 to-gradient-purple/20 rounded-xl blur opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <x-text-input 
                            id="password" 
                            class="relative block w-full px-4 py-3 text-foreground bg-glass-light/50 border border-glass-border rounded-xl focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 transition-all duration-300 hover:bg-glass-light/70 placeholder:text-muted-foreground/60"
                            type="password"
                            name="password"
                            placeholder="Enter your password"
                            required 
                            autocomplete="current-password" 
                        />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-destructive text-sm animate-fade-in" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between animate-slide-up" style="animation-delay: 0.3s; animation-fill-mode: both;">
                    <label for="remember_me" class="flex items-center group cursor-pointer">
                        <div class="relative">
                            <input 
                                id="remember_me" 
                                type="checkbox" 
                                class="sr-only peer" 
                                name="remember"
                            >
                            <div class="w-5 h-5 bg-glass-light border-2 border-glass-border rounded-md peer-checked:bg-primary-500 peer-checked:border-primary-500 transition-all duration-300 flex items-center justify-center">
                                <svg class="w-3 h-3 text-white opacity-0 peer-checked:opacity-100 transition-opacity duration-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                        <span class="ml-3 text-sm text-foreground/70 group-hover:text-foreground transition-colors">
                            {{ __('Remember me') }}
                        </span>
                    </label>

                    @if (Route::has('password.request'))
                        <a 
                            class="text-sm text-primary-600 hover:text-primary-700 font-medium transition-colors duration-200 hover:underline decoration-2 underline-offset-2" 
                            href="{{ route('password.request') }}"
                        >
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="animate-slide-up" style="animation-delay: 0.4s; animation-fill-mode: both;">
                    <x-primary-button class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-white font-medium rounded-xl bg-gradient-to-r from-primary-600 to-gradient-purple hover:from-primary-700 hover:to-gradient-purple/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] shadow-smooth hover:shadow-glow">
                        <span class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                        <span class="relative flex items-center">
                            {{ __('Sign In') }}
                            <svg class="ml-2 -mr-1 w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </span>
                    </x-primary-button>
                </div>
            </form>

            <!-- Divider -->
            <div class="mt-8 animate-fade-in" style="animation-delay: 0.5s; animation-fill-mode: both;">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-glass-border"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-glass-white text-muted-foreground">New to our platform?</span>
                    </div>
                </div>
                
                <!-- Sign Up Link -->
                <div class="mt-4 text-center">
                    <a href="{{ route('register') }}" class="inline-flex items-center text-sm font-medium text-primary-600 hover:text-primary-700 transition-colors duration-200 group">
                        Create your account
                        <svg class="ml-1 w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center text-xs text-muted-foreground animate-fade-in" style="animation-delay: 0.6s; animation-fill-mode: both;">
            <p>© 2025 ELOMRI. All rights reserved.</p>
        </div>
    </div>

    <!-- Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-primary-400/30 to-gradient-purple/30 rounded-full blur-3xl animate-float"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-br from-gradient-blue/30 to-primary-400/30 rounded-full blur-3xl animate-float-delayed"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-br from-gradient-pink/20 to-gradient-orange/20 rounded-full blur-3xl animate-float-slow"></div>
    </div>
</div>
</x-guest-layout>
