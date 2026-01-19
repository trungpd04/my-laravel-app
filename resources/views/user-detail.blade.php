<x-layout>
    <div class="animate-fadeIn max-w-4xl mx-auto">
        <!-- Back Button -->
        <a href="/user-list" class="inline-flex items-center text-slate-600 hover:text-blue-600 mb-6 transition-colors duration-200">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to User List
        </a>

        <!-- User Profile Card -->
        <div class="card">
            <div class="flex items-start gap-6">
                <!-- Avatar -->
                <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-3xl font-bold shadow-lg">
                    {{ strtoupper(substr($data['name'], 0, 1)) }}
                </div>

                <!-- User Info -->
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h1 class="text-3xl font-bold text-slate-800 mb-1">{{ $data['name'] }}</h1>
                            <span class="badge">Active User</span>
                        </div>
                        <button class="btn-secondary">
                            Edit Profile
                        </button>
                    </div>

                    <!-- User Details Grid -->
                    <div class="grid md:grid-cols-2 gap-6 mt-6">
                        <div class="bg-slate-50 rounded-lg p-4">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-slate-500 font-medium">User ID</p>
                                    <p class="text-lg font-semibold text-slate-800">#{{ $data['id'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-slate-50 rounded-lg p-4">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-slate-500 font-medium">Email Address</p>
                                    <p class="text-lg font-semibold text-slate-800">{{ $data['email'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4 mt-6">
                        <button class="btn-primary flex-1">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Send Message
                        </button>
                        <button class="btn-secondary">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                            </svg>
                            More Actions
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Info Section -->
        <div class="grid md:grid-cols-3 gap-6 mt-8">
            <div class="card text-center">
                <div class="text-3xl font-bold text-blue-600 mb-2">24</div>
                <p class="text-slate-600">Projects</p>
            </div>
            <div class="card text-center">
                <div class="text-3xl font-bold text-purple-600 mb-2">156</div>
                <p class="text-slate-600">Tasks Completed</p>
            </div>
            <div class="card text-center">
                <div class="text-3xl font-bold text-pink-600 mb-2">98%</div>
                <p class="text-slate-600">Success Rate</p>
            </div>
        </div>
    </div>
</x-layout>