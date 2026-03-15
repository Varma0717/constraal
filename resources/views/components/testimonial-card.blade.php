<!-- Testimonial Card Component -->
<div class="bg-white rounded-xl p-8 border border-slate-200 hover:border-blue-300 hover:shadow-lg transition-all duration-300">
    <!-- Stars -->
    @if(isset($rating))
    <div class="flex items-center mb-4">
        @for($i = 0; $i < $rating; $i++)
            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
            </svg>
            @endfor
    </div>
    @endif

    <!-- Quote -->
    @if(isset($quote))
    <p class="text-lg text-slate-900 font-medium mb-6">{{ $quote }}</p>
    @endif

    <!-- Author -->
    <div class="flex items-center">
        @if(isset($author))
        <div class="flex-shrink-0">
            @if(isset($authorImage))
            <img src="{{ $authorImage }}" alt="{{ $author }}" class="h-12 w-12 rounded-full object-cover">
            @else
            <div class="h-12 w-12 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                <span class="text-white font-semibold text-sm">{{ substr($author, 0, 1) }}</span>
            </div>
            @endif
        </div>
        <div class="ml-4">
            <h4 class="text-sm font-semibold text-slate-900">{{ $author }}</h4>
            @if(isset($authorRole))
            <p class="text-xs text-slate-600">{{ $authorRole }}</p>
            @endif
        </div>
        @endif
    </div>
</div>