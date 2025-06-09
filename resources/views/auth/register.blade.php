<x-guest-layout>
    <div class="py-2 max-w-md w-full space-y-8">
        <!-- Header Section -->
        <div class="text-center animate-fade-in-down">
            <div class="mx-auto h-16 w-16 bg-gradient-to-br from-gradient-blue to-primary-500 rounded-2xl flex items-center justify-center shadow-glow animate-pulse-glow mb-6">
                <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                </svg>
            </div>
            <h2 class="text-3xl font-bold font-display bg-gradient-to-r from-gradient-blue to-primary-700 bg-clip-text text-transparent">
                Create Account
            </h2>
            <p class="mt-2 text-muted-foreground">Join us and start your journey today</p>
        </div>

        <!-- Form Container -->
        <div class="bg-glass-white backdrop-blur-xl border border-glass-border rounded-3xl shadow-glass p-8 animate-fade-in-up">
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name Field -->
                <div class="animate-slide-up" style="animation-delay: 0.1s; animation-fill-mode: both;">
                    <x-input-label for="name" :value="__('Name')" class="block text-sm font-medium text-foreground/80 mb-2" />
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-gradient-blue/20 to-primary-500/20 rounded-xl blur opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <x-text-input 
                            id="name" 
                            class="relative block w-full px-4 py-3 text-foreground bg-glass-light/50 border border-glass-border rounded-xl focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 transition-all duration-300 hover:bg-glass-light/70 placeholder:text-muted-foreground/60" 
                            type="text" 
                            name="name" 
                            :value="old('name')" 
                            placeholder="Enter your full name"
                            required 
                            autofocus 
                            autocomplete="name" 
                        />
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-destructive text-sm animate-fade-in" />
                </div>

                <!-- Email Field -->
                <div class="animate-slide-up" style="animation-delay: 0.2s; animation-fill-mode: both;">
                    <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-foreground/80 mb-2" />
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary-500/20 to-gradient-purple/20 rounded-xl blur opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <x-text-input 
                            id="email" 
                            class="relative block w-full px-4 py-3 text-foreground bg-glass-light/50 border border-glass-border rounded-xl focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 transition-all duration-300 hover:bg-glass-light/70 placeholder:text-muted-foreground/60" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            placeholder="Enter your email address"
                            required 
                            autocomplete="username" 
                        />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-destructive text-sm animate-fade-in" />
                </div>

                <!-- Password Field -->
                <div class="animate-slide-up" style="animation-delay: 0.3s; animation-fill-mode: both;">
                    <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-foreground/80 mb-2" />
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-gradient-purple/20 to-gradient-pink/20 rounded-xl blur opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <x-text-input 
                            id="password" 
                            class="relative block w-full px-4 py-3 text-foreground bg-glass-light/50 border border-glass-border rounded-xl focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 transition-all duration-300 hover:bg-glass-light/70 placeholder:text-muted-foreground/60"
                            type="password"
                            name="password"
                            placeholder="Create a secure password"
                            required 
                            autocomplete="new-password" 
                        />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-destructive text-sm animate-fade-in" />
                </div>

                <!-- Confirm Password Field -->
                <div class="animate-slide-up" style="animation-delay: 0.4s; animation-fill-mode: both;">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="block text-sm font-medium text-foreground/80 mb-2" />
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-gradient-pink/20 to-gradient-orange/20 rounded-xl blur opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <x-text-input 
                            id="password_confirmation" 
                            class="relative block w-full px-4 py-3 text-foreground bg-glass-light/50 border border-glass-border rounded-xl focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 transition-all duration-300 hover:bg-glass-light/70 placeholder:text-muted-foreground/60"
                            type="password"
                            name="password_confirmation"
                            placeholder="Confirm your password"
                            required 
                            autocomplete="new-password" 
                        />
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-destructive text-sm animate-fade-in" />
                </div>

                <!-- Password Strength Indicator -->
                <div class="animate-slide-up" style="animation-delay: 0.45s; animation-fill-mode: both;">
                    <div class="flex items-center space-x-2 text-xs text-muted-foreground">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Password should be at least 8 characters long</span>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="animate-slide-up" style="animation-delay: 0.5s; animation-fill-mode: both;">
                    <x-primary-button class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-white font-medium rounded-xl bg-gradient-to-r from-gradient-blue to-primary-600 hover:from-gradient-blue/90 hover:to-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] shadow-smooth hover:shadow-glow">
                        <span class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                        <span class="relative flex items-center">
                            {{ __('Create Account') }}
                            <svg class="ml-2 -mr-1 w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </span>
                    </x-primary-button>
                </div>

                <!-- Login Link -->
                <div class="text-center animate-slide-up" style="animation-delay: 0.6s; animation-fill-mode: both;">
                    <a 
                        class="inline-flex items-center text-sm font-medium text-primary-600 hover:text-primary-700 transition-colors duration-200 group" 
                        href="{{ route('login') }}"
                    >
                        <svg class="mr-1 w-4 h-4 transition-transform duration-200 group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                        </svg>
                        {{ __('Already have an account? Sign in') }}
                    </a>
                </div>
            </form>

            <!-- Terms and Privacy -->
            <div class="mt-6 pt-6 border-t border-glass-border animate-fade-in" style="animation-delay: 0.7s; animation-fill-mode: both;">
                <p class="text-xs text-center text-muted-foreground leading-relaxed">
                    By creating an account, you agree to our 
                    <a href="#" class="text-primary-600 hover:text-primary-700 font-medium transition-colors">Terms of Service</a>
                    and 
                    <a href="#" class="text-primary-600 hover:text-primary-700 font-medium transition-colors">Privacy Policy</a>
                </p>
            </div>
        </div>

    
        <!-- Footer -->
        <div class="text-center text-xs text-muted-foreground animate-fade-in" style="animation-delay: 0.9s; animation-fill-mode: both;">
            <p>© 2025 ELOMRI. All rights reserved.</p>
        </div>
    </div>

    <!-- Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-gradient-blue/30 to-primary-400/30 rounded-full blur-3xl animate-float"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-br from-gradient-purple/30 to-gradient-pink/30 rounded-full blur-3xl animate-float-delayed"></div>
        <div class="absolute top-1/3 left-1/4 w-64 h-64 bg-gradient-to-br from-gradient-orange/20 to-primary-300/20 rounded-full blur-3xl animate-float-slow"></div>
    </div>
</div>
</x-guest-layout>
