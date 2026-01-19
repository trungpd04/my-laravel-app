<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>

<body
    class="bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 min-h-screen flex items-center justify-center px-4">
    <div class="max-w-2xl w-full text-center">
        <!-- 404 Number -->
        <div class="mb-8 fade-in">
            <h1 class="text-9xl font-black gradient-text mb-4 float-animation">404</h1>
        </div>

        <!-- Error Icon -->
        <div class="mb-8 fade-in" style="animation-delay: 0.2s; opacity: 0;">
            <div
                class="inline-flex items-center justify-center w-32 h-32 rounded-full bg-gradient-to-br from-blue-100 to-purple-100 mb-6">
                <svg class="w-16 h-16 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Error Message -->
        <div class="mb-8 fade-in" style="animation-delay: 0.4s; opacity: 0;">
            <h2 class="text-4xl font-bold text-slate-800 mb-4">Oops! Page Not Found</h2>
            <p class="text-lg text-slate-600 mb-2">
                The page you're looking for doesn't exist or has been moved.
            </p>
            <p class="text-slate-500">
                Don't worry, even the best explorers get lost sometimes!
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12 fade-in"
            style="animation-delay: 0.6s; opacity: 0;">
            <a href="{{ route('home') }}"
                class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-lg shadow-lg hover:from-blue-700 hover:to-purple-700 hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                Back to Home
            </a>
            <button onclick="window.history.back()"
                class="inline-flex items-center justify-center px-8 py-3 bg-white text-slate-700 font-semibold rounded-lg shadow-md hover:shadow-lg hover:bg-slate-50 transform hover:-translate-y-0.5 transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Go Back
            </button>
        </div>

        <!-- Helpful Links -->
        <div class="bg-white rounded-2xl shadow-xl p-8 fade-in" style="animation-delay: 0.8s; opacity: 0;">
            <h3 class="text-xl font-bold text-slate-800 mb-4">Maybe you're looking for:</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <a href="{{ route('home') }}"
                    class="flex items-center justify-center px-4 py-3 bg-slate-50 hover:bg-slate-100 rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="font-semibold text-slate-700">Home</span>
                </a>
                <a href="{{ route('product.list') }}"
                    class="flex items-center justify-center px-4 py-3 bg-slate-50 hover:bg-slate-100 rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    <span class="font-semibold text-slate-700">Products</span>
                </a>
                <a href="#"
                    class="flex items-center justify-center px-4 py-3 bg-slate-50 hover:bg-slate-100 rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span class="font-semibold text-slate-700">Login</span>
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-sm text-slate-500 fade-in" style="animation-delay: 1s; opacity: 0;">
            <p>If you believe this is a mistake, please contact support.</p>
        </div>
    </div>
</body>

</html>