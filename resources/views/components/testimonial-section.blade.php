<!-- Testimonial/Social Proof Section -->
<section class="py-16 bg-gradient-to-b from-white to-slate-50">
    <div class="site-container">
        <!-- Section Header -->
        @if(isset($title))
        <div class="text-center mb-12">
            @if(isset($badge))
            <p class="text-sm font-semibold text-blue-600 uppercase tracking-wide">{{ $badge }}</p>
            @endif

            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mt-3">
                {{ $title }}
            </h2>

            @if(isset($subtitle))
            <p class="text-lg text-slate-600 mt-4 max-w-2xl mx-auto">{{ $subtitle }}</p>
            @endif
        </div>
        @endif

        <!-- Testimonials Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{ $slot }}
        </div>
    </div>
</section>