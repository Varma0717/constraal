<!-- Mega Menu Component - Tencent Cloud Style -->
<div class="absolute left-0 right-0 top-full pt-2 hidden group-hover:block bg-white border-t border-slate-200 shadow-lg"
    @mouseenter="menuOpen = true"
    @mouseleave="menuOpen = false">
    <div class="site-container py-8">
        <div class="grid grid-cols-4 gap-8">
            <!-- Column 1: Products -->
            <div>
                <h4 class="font-semibold text-sm text-slate-900 mb-4">Products</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('technology') }}" class="text-sm text-slate-600 hover:text-blue-600 transition">AI Platform</a></li>
                    <li><a href="{{ route('robotics') }}" class="text-sm text-slate-600 hover:text-blue-600 transition">Robotics Suite</a></li>
                    <li><a href="{{ route('homesystems') }}" class="text-sm text-slate-600 hover:text-blue-600 transition">Home Systems</a></li>
                    <li><a href="{{ route('appliances') }}" class="text-sm text-slate-600 hover:text-blue-600 transition">Smart Appliances</a></li>
                </ul>
            </div>

            <!-- Column 2: Solutions -->
            <div>
                <h4 class="font-semibold text-sm text-slate-900 mb-4">Solutions</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('safety') }}" class="text-sm text-slate-600 hover:text-blue-600 transition">Safety Systems</a></li>
                    <li><a href="#" class="text-sm text-slate-600 hover:text-blue-600 transition">Automation</a></li>
                    <li><a href="#" class="text-sm text-slate-600 hover:text-blue-600 transition">Integration</a></li>
                    <li><a href="#" class="text-sm text-slate-600 hover:text-blue-600 transition">Analytics</a></li>
                </ul>
            </div>

            <!-- Column 3: Company -->
            <div>
                <h4 class="font-semibold text-sm text-slate-900 mb-4">Company</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('about') }}" class="text-sm text-slate-600 hover:text-blue-600 transition">About Us</a></li>
                    <li><a href="{{ route('careers') }}" class="text-sm text-slate-600 hover:text-blue-600 transition">Careers</a></li>
                    <li><a href="#" class="text-sm text-slate-600 hover:text-blue-600 transition">Blog</a></li>
                    <li><a href="{{ route('contact') }}" class="text-sm text-slate-600 hover:text-blue-600 transition">Contact</a></li>
                </ul>
            </div>

            <!-- Column 4: Resources -->
            <div>
                <h4 class="font-semibold text-sm text-slate-900 mb-4">Resources</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-sm text-slate-600 hover:text-blue-600 transition">Documentation</a></li>
                    <li><a href="#" class="text-sm text-slate-600 hover:text-blue-600 transition">API Reference</a></li>
                    <li><a href="#" class="text-sm text-slate-600 hover:text-blue-600 transition">Community</a></li>
                    <li><a href="#" class="text-sm text-slate-600 hover:text-blue-600 transition">Support</a></li>
                </ul>
            </div>
        </div>

        <!-- Featured Section -->
        <div class="mt-8 pt-8 border-t border-slate-200 grid grid-cols-3 gap-6">
            <div class="flex items-start space-x-3">
                <div class="bg-blue-100 rounded-lg p-3">
                    <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                </div>
                <div>
                    <h5 class="font-semibold text-sm text-slate-900">Enterprise Ready</h5>
                    <p class="text-xs text-slate-600 mt-1">Scalable infrastructure for your home</p>
                </div>
            </div>
            <div class="flex items-start space-x-3">
                <div class="bg-green-100 rounded-lg p-3">
                    <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-2.77 3.066 3.066 0 00-3.58 3.03A3.066 3.066 0 006.267 3.455zm9.8 2.696a3.066 3.066 0 01.524 4.759l-.958.958a3.066 3.066 0 01-4.341-4.341l.958-.958a3.066 3.066 0 014.34-4.34zm2.123 6.196a3.066 3.066 0 01-4.596.744l-.96-.96a3.066 3.066 0 104.338 4.338l.96-.96a3.066 3.066 0 01.258-4.122zM9.3 20a3.066 3.066 0 013.05-3.068h.002a3.066 3.066 0 013.049 3.068v.002A3.066 3.066 0 019.273 20h-.027z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <h5 class="font-semibold text-sm text-slate-900">Developer Friendly</h5>
                    <p class="text-xs text-slate-600 mt-1">Easy APIs and SDKs for integration</p>
                </div>
            </div>
            <div class="flex items-start space-x-3">
                <div class="bg-violet-100 rounded-lg p-3">
                    <svg class="w-5 h-5 text-violet-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 000-2H6V2h8v1h1a1 1 0 100 2h-1v1a1 1 0 11-2 0V3H7v1a1 1 0 11-2 0V3H4a2 2 0 00-2 2v2h16V4a2 2 0 00-2-2h-1V2a1 1 0 011-1zm0 5H2v9a2 2 0 002 2h12a2 2 0 002-2V7h-3v1a1 1 0 11-2 0V7H7v1a1 1 0 11-2 0V7z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <h5 class="font-semibold text-sm text-slate-900">24/7 Support</h5>
                    <p class="text-xs text-slate-600 mt-1">Round-the-clock technical support</p>
                </div>
            </div>
        </div>
    </div>
</div>