<!-- Product Card Component - Samsung Style -->
<div class="group">
    <div class="bg-white rounded-xl overflow-hidden border border-slate-200 hover:border-blue-400 transition-all duration-300 hover:shadow-lg">
        <!-- Product Image -->
        <div class="relative bg-gradient-to-br from-slate-50 to-slate-100 aspect-square overflow-hidden">
            @if(isset($image))
            <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            @else
            <div class="w-full h-full flex items-center justify-center">
                <svg class="w-16 h-16 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            @endif
        </div>

        <!-- Product Info -->
        <div class="p-6">
            @if(isset($category))
            <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide">{{ $category }}</p>
            @endif

            <h3 class="font-semibold text-lg text-slate-900 mt-3">{{ $title }}</h3>

            @if(isset($description))
            <p class="text-sm text-slate-600 mt-3 line-clamp-2">{{ $description }}</p>
            @endif

            <!-- Features (optional) -->
            @if(isset($features))
            <ul class="mt-4 space-y-2">
                @foreach($features as $feature)
                <li class="flex items-center text-xs text-slate-600">
                    <svg class="w-4 h-4 text-blue-600 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    {{ $feature }}
                </li>
                @endforeach
            </ul>
            @endif

            <!-- CTA Button -->
            @if(isset($link))
            <a href="{{ $link }}" class="inline-flex items-center mt-6 text-sm font-medium text-blue-600 hover:text-blue-700 transition-colors">
                Learn More
                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
            @endif
        </div>
    </div>
</div>