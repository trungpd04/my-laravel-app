<x-layout>
    <!-- Hero Section -->
    <div class="animate-fadeIn">
        <div class="text-center py-16 px-4">
            <h1 class="text-6xl font-bold mb-6 gradient-text">
                Welcome to MyApp
            </h1>
            <p class="text-xl text-slate-600 mb-8 max-w-2xl mx-auto">
                A modern Laravel application with beautiful Tailwind CSS styling.
                Build amazing things with ease.
            </p>
            <div class="flex gap-4 justify-center">
                <button class="btn-primary">
                    Get Started
                </button>
                <button class="btn-secondary">
                    Learn More
                </button>
            </div>
        </div>

        <!-- Feature Cards -->
        <div class="grid md:grid-cols-3 gap-8 mt-16">
            <div class="card animate-slideIn">
                <div
                    class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-2">Lightning Fast</h3>
                <p class="text-slate-600">Built with modern technologies for optimal performance and speed.</p>
            </div>

            <div class="card animate-slideIn" style="animation-delay: 0.1s;">
                <div
                    class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01">
                        </path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-2">Beautiful Design</h3>
                <p class="text-slate-600">Stunning UI components styled with Tailwind CSS.</p>
            </div>

            <div class="card animate-slideIn" style="animation-delay: 0.2s;">
                <div
                    class="w-12 h-12 bg-gradient-to-br from-pink-500 to-pink-600 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-2">Secure & Reliable</h3>
                <p class="text-slate-600">Built on Laravel's robust and secure framework.</p>
            </div>
        </div>

        <!-- CTA Section -->
        <div
            class="mt-16 bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl p-12 text-center text-white shadow-2xl">
            <h2 class="text-3xl font-bold mb-4">Ready to get started?</h2>
            <p class="text-lg mb-8 opacity-90">Join thousands of users building amazing applications.</p>
            <button
                class="px-8 py-4 bg-white text-blue-600 font-bold rounded-lg hover:bg-slate-100 transition-all duration-200 transform hover:scale-105 shadow-lg">
                Start Building Now
            </button>
        </div>
    </div>
</x-layout>