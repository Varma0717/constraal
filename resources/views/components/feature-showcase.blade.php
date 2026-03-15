<!-- Feature Showcase Component - Modern highlighting -->
<section class="py-16 bg-white">
    <div class="site-container">
        <!-- Section Header -->
        <div class="max-w-2xl mb-12">
            @if(isset($badge))
            <p class="text-sm font-semibold text-blue-600 uppercase tracking-wide">{{ $badge }}</p>
            @endif

            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mt-3">
                {{ $title }}
            </h2>

            @if(isset($subtitle))
            <p class="text-lg text-slate-600 mt-4">{{ $subtitle }}</p>
            @endif
        </div>

        <!-- Features Grid (2 column layout with alternating sides) -->
        <div class="space-y-16">
            {{ $slot }}
        </div>
    </div>
</section>