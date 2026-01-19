<x-layout>
    <div class="max-w-4xl mx-auto">
        <!-- Page Header -->
        <div class="mb-8 animate-fadeIn">
            <h1 class="text-4xl font-bold gradient-text mb-2">Thông Tin Sinh Viên</h1>
            <p class="text-slate-600">Student Information Profile</p>
        </div>

        <!-- Student Information Card -->
        <div class="card">
            <!-- Profile Header -->
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-t-xl -m-6 mb-6 p-8 text-white">
                <div class="flex items-center gap-6">
                    <!-- Avatar -->
                    <div class="flex-shrink-0">
                        <div
                            class="w-24 h-24 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center border-4 border-white/30">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Name and ID -->
                    <div class="flex-1">
                        <h2 class="text-3xl font-bold mb-2">{{ $name }}</h2>
                        <p class="text-blue-100 text-lg">MSSV: {{ $mssv }}</p>
                    </div>

                    <!-- Status Badge -->
                    <div>
                        <span
                            class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-green-500 text-white">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Active Student
                        </span>
                    </div>
                </div>
            </div>

            <!-- Information Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Personal Information -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-slate-800 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Personal Information
                    </h3>

                    <div class="space-y-3">
                        <div class="flex items-start">
                            <div class="w-32 text-slate-600 font-medium">Full Name:</div>
                            <div class="flex-1 text-slate-800 font-semibold">{{ $name }}</div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-32 text-slate-600 font-medium">Student ID:</div>
                            <div class="flex-1 text-slate-800 font-semibold">{{ $mssv }}</div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-32 text-slate-600 font-medium">Date of Birth:</div>
                            <div class="flex-1 text-slate-800">01/01/2000</div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-32 text-slate-600 font-medium">Gender:</div>
                            <div class="flex-1 text-slate-800">Male</div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-32 text-slate-600 font-medium">Email:</div>
                            <div class="flex-1 text-blue-600">
                                {{ strtolower(str_replace(' ', '.', $name)) }}@student.edu.vn
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-32 text-slate-600 font-medium">Phone:</div>
                            <div class="flex-1 text-slate-800">0123-456-789</div>
                        </div>
                    </div>
                </div>

                <!-- Academic Information -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-slate-800 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                        Academic Information
                    </h3>

                    <div class="space-y-3">
                        <div class="flex items-start">
                            <div class="w-32 text-slate-600 font-medium">Major:</div>
                            <div class="flex-1 text-slate-800 font-semibold">Computer Science</div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-32 text-slate-600 font-medium">Faculty:</div>
                            <div class="flex-1 text-slate-800">Information Technology</div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-32 text-slate-600 font-medium">Course:</div>
                            <div class="flex-1 text-slate-800">K18 (2018-2022)</div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-32 text-slate-600 font-medium">Class:</div>
                            <div class="flex-1 text-slate-800">18DTHD1</div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-32 text-slate-600 font-medium">GPA:</div>
                            <div class="flex-1 text-green-600 font-bold">3.75 / 4.0</div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-32 text-slate-600 font-medium">Credits:</div>
                            <div class="flex-1 text-slate-800">120 / 150</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="mt-8 pt-6 border-t border-slate-200">
                <h3 class="text-xl font-bold text-slate-800 mb-4 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Additional Information
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-blue-50 rounded-lg p-4">
                        <div class="text-sm text-blue-600 font-medium mb-1">Enrollment Date</div>
                        <div class="text-lg font-bold text-blue-800">September 2018</div>
                    </div>
                    <div class="bg-purple-50 rounded-lg p-4">
                        <div class="text-sm text-purple-600 font-medium mb-1">Expected Graduation</div>
                        <div class="text-lg font-bold text-purple-800">June 2022</div>
                    </div>
                    <div class="bg-green-50 rounded-lg p-4">
                        <div class="text-sm text-green-600 font-medium mb-1">Academic Status</div>
                        <div class="text-lg font-bold text-green-800">Good Standing</div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 pt-6 border-t border-slate-200 flex flex-wrap gap-3">
                <button
                    class="px-6 py-2.5 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-lg shadow-md hover:from-blue-700 hover:to-purple-700 transition-all duration-150">
                    <svg class="w-5 h-5 inline-block mr-2 -mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    Edit Profile
                </button>
                <button
                    class="px-6 py-2.5 bg-slate-100 text-slate-700 font-semibold rounded-lg hover:bg-slate-200 transition-colors duration-150">
                    <svg class="w-5 h-5 inline-block mr-2 -mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                        </path>
                    </svg>
                    Print Profile
                </button>
                <button
                    class="px-6 py-2.5 bg-slate-100 text-slate-700 font-semibold rounded-lg hover:bg-slate-200 transition-colors duration-150">
                    <svg class="w-5 h-5 inline-block mr-2 -mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Download PDF
                </button>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="#" class="card hover:shadow-lg transition-shadow duration-200 text-center">
                <svg class="w-10 h-10 mx-auto mb-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                <h3 class="font-bold text-slate-800 mb-1">View Transcript</h3>
                <p class="text-sm text-slate-600">Academic records</p>
            </a>

            <a href="#" class="card hover:shadow-lg transition-shadow duration-200 text-center">
                <svg class="w-10 h-10 mx-auto mb-3 text-purple-600" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
                <h3 class="font-bold text-slate-800 mb-1">Course Schedule</h3>
                <p class="text-sm text-slate-600">View timetable</p>
            </a>

            <a href="#" class="card hover:shadow-lg transition-shadow duration-200 text-center">
                <svg class="w-10 h-10 mx-auto mb-3 text-green-600" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
                <h3 class="font-bold text-slate-800 mb-1">Tuition Fee</h3>
                <p class="text-sm text-slate-600">Payment info</p>
            </a>
        </div>
    </div>
</x-layout>