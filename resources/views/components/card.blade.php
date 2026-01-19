@props(['highlight' => false, 'href' => '#'])

<div class="card group {{ $highlight ? 'ring-2 ring-blue-500' : '' }}">
    <div class="mb-4">
        {{ $slot }}
    </div>
    <a href="{{ $href }}" class="inline-flex items-center text-blue-600 font-semibold hover:text-purple-600 transition-colors duration-200">
        View Details
        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </a>
</div>