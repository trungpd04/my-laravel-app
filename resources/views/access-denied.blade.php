<x-layout>
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-red-50 to-orange-50">
        <div class="max-w-md w-full">
            <!-- Access Denied Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Icon Section -->
                <div class="bg-gradient-to-r from-red-600 to-orange-600 px-8 py-12 text-center">
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-white/20 rounded-full mb-4">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                    </div>
                    <h1 class="text-4xl font-bold text-white mb-2">Access Denied</h1>
                    <div class="h-1 w-24 bg-white/30 mx-auto rounded-full"></div>
                </div>

                <!-- Content Section -->
                <div class="px-8 py-10">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-semibold text-slate-800 mb-3">
                            Restricted Area
                        </h2>
                        <p class="text-slate-600 leading-relaxed">
                            You must be at least <span class="font-bold text-red-600">18 years old</span> to access this content.
                        </p>
                        <p class="text-slate-500 mt-2 text-sm">
                            Please verify your age to continue.
                        </p>
                    </div>

                    <!-- Information Box -->
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                        <div class="flex">
                            <svg class="w-5 h-5 text-red-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <p class="text-sm text-red-800 font-medium mb-1">Age Verification Required</p>
                                <p class="text-sm text-red-700">
                                    This page contains content that requires age verification. If you believe this is an error, please contact support.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-3">
                        <a href="{{ route('age') }}"
                            class="w-full px-6 py-3 bg-gradient-to-r from-red-600 to-orange-600 text-white font-semibold rounded-lg shadow-md hover:from-red-700 hover:to-orange-700 hover:shadow-lg transition-all duration-150 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Verify Your Age
                        </a>

                        <a href="{{ route('home') }}"
                            class="w-full px-6 py-3 bg-slate-100 text-slate-700 font-semibold rounded-lg hover:bg-slate-200 transition-all duration-150 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Go Back Home
                        </a>
                    </div>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="mt-6 text-center">
                <p class="text-sm text-slate-600">
                    Need help? 
                    <a href="#" class="text-red-600 hover:text-red-700 font-medium">Contact Support</a>
                </p>
            </div>
        </div>
    </div>
</x-layout>

