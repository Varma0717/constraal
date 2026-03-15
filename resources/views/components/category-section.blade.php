<!-- Category Section Component - Samsung Style Navigation -->
<section class="py-16 bg-gradient-to-b from-slate-50 to-white">
    <div class="site-container">
        <!-- Section Header -->
        <div class="mb-12">
            @if(isset($badge))
            <p class="text-sm font-semibold text-blue-600 uppercase tracking-wide">{{ $badge }}</p>
            @endif

            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mt-3">
                {{ $title }}
            </h2>

            @if(isset($subtitle))
            <p class="text-lg text-slate-600 mt-4 max-w-3xl">{{ $subtitle }}</p>
            @endif
        </div>

        <!-- Categories Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-{{ $columns ?? 3 }} gap-8">
            {{ $slot }}
        </div>

        <!-- View All CTA (optional) -->
        @if(isset($showMore) && $showMore)
        <div class="mt-12 text-center">
            <a href="{{ $moreLink ?? '#' }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors">
                View All Products
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
        @endif
    </div>
</section>