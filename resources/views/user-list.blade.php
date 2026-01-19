<x-layout>
    <div class="animate-fadeIn">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-slate-800 mb-2">User Directory</h1>
            <p class="text-slate-600">Browse and manage all users in the system</p>
        </div>

        <!-- Search and Filter Bar -->
        <div class="mb-8 flex gap-4">
            <input type="text" placeholder="Search users..." class="input-field flex-1">
            <button class="btn-primary">
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                Search
            </button>
        </div>

        <!-- User Cards Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($data as $item)
            <x-card href="/user/{{ $item['id'] }}" :highlight="false">
                    <li class="list-none">{{ $item['name'] }} - {{ $item['email'] }}</li>
            </x-card>
        @endforeach
        </div>

        @if(empty($data))
            <div class="text-center py-16">
                <div class="w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-slate-700 mb-2">No users found</h3>
                <p class="text-slate-500">Start by adding your first user to the system.</p>
            </div>
        @endif
    </div>
</x-layout>