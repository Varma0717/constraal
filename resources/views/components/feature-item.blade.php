<!-- Feature Item Component -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
    <!-- Content Side -->
    <div class="{{ $imagePosition === 'left' ? 'md:order-2' : '' }}">
        @if(isset($heading))
        <h3 class="text-2xl md:text-3xl font-bold text-slate-900">
            {{ $heading }}
        </h3>
        @endif

        @if(isset($description))
        <p class="text-lg text-slate-600 mt-4">{{ $description }}</p>
        @endif

        <!-- Bullet Points -->
        @if(isset($features))
        <ul class="mt-6 space-y-3">
            @foreach($features as $feature)
            <li class="flex items-start">
                <svg class="w-6 h-6 text-blue-600 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-slate-700">{{ $feature }}</span>
            </li>
            @endforeach
        </ul>
        @endif

        <!-- CTA Button -->
        @if(isset($ctaText) && isset($ctaLink))
        <div class="mt-8">
            <a href="{{ $ctaLink }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors">
                {{ $ctaText }}
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
        @endif
    </div>

    <!-- Image Side -->
    <div class="{{ $imagePosition === 'left' ? '' : '' }}">
        <div class="bg-gradient-to-br from-blue-50 to-slate-100 rounded-2xl overflow-hidden h-96 flex items-center justify-center">
            @if(isset($image))
            <img src="{{ $image }}" alt="{{ $heading }}" class="w-full h-full object-cover">
            @else
            <svg class="w-24 h-24 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            @endif
        </div>
    </div>
</div>