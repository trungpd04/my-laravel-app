<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'My Laravel App' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100">
    <!-- Navigation Header -->
    <header class="bg-white shadow-sm border-b border-slate-200">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-8">
                    <a href="/"
                        class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        MyApp
                    </a>
                    <div class="hidden md:flex space-x-6">
                        <a href="{{ route('home') }}"
                            class="nav-link text-slate-600 hover:text-blue-600 transition-colors duration-150 font-medium">
                            Home
                        </a>
                        <a href="{{ route('product.list') }}"
                            class="nav-link text-slate-600 hover:text-blue-600 transition-colors duration-150 font-medium">
                            Product List
                        </a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button onclick="window.location.href='{{ route('thongtinsinhvien') }}'"
                        class="px-4 py-2 text-sm font-medium text-slate-700 hover:text-blue-600 transition-colors duration-150">
                        Thông tin sinh viên
                    </button>
                    @if(!$loggedInUser)
                        <a href="{{ route('auth.login') }}"
                            class="px-4 py-2 text-sm font-medium text-slate-700 hover:text-blue-600 transition-colors duration-150">
                            Sign In
                        </a>
                    @else
                        <!-- User Profile Section -->
                        <div
                            class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-slate-50 transition-colors duration-150 cursor-pointer">
                            <!-- Avatar Circle -->
                            <div
                                class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-600 to-purple-600 flex items-center justify-center text-white font-semibold shadow-md">
                                {{ strtoupper(substr($loggedInUser->email, 0, 1)) }}
                            </div>
                            <!-- Email -->
                            <div class="flex flex-col">
                                <span
                                    class="text-sm font-semibold text-slate-900">{{ $loggedInUser->name ?? 'User' }}</span>
                                <span class="text-xs text-slate-500">{{ $loggedInUser->email }}</span>
                            </div>
                            <div class="flex flex-col">
                                <form action="{{ route('auth.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="text-sm text-slate-500 hover:text-blue-600 transition-colors duration-150">Sign
                                        out</button>
                                </form>
                            </div>
                        </div>
                    @endif
                    <button
                        class="px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg hover:from-blue-700 hover:to-purple-700 shadow-md hover:shadow-lg transition-shadow duration-150">
                        Get Started
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="max-w-7xl mx-auto">
            {{ $slot }}
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 mt-16">
        <div class="container mx-auto px-4 py-8">
            <div class="text-center text-slate-600">
                <p class="text-sm">&copy; {{ date('Y') }} MyApp. Built with Laravel & Tailwind CSS.</p>
            </div>
        </div>
    </footer>
</body>

</html>