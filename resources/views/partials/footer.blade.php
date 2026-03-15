<footer class="site-footer mt-20">
    <!-- Main Footer Content -->
    <div class="site-container py-16">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
            <!-- Column 1: Navigation -->
            <div>
                <h3 class="text-sm font-semibold text-white mb-6">Navigation</h3>
                <ul class="space-y-3 text-sm text-white/70">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
                    <li><a href="{{ route('appliances') }}" class="hover:text-white transition-colors">Appliances</a></li>
                    <li><a href="{{ route('build') }}" class="hover:text-white transition-colors">Build</a></li>
                    <li><a href="{{ route('technology') }}" class="hover:text-white transition-colors">Technology</a></li>
                    <li><a href="{{ route('company') }}" class="hover:text-white transition-colors">Company</a></li>
                </ul>
            </div>

            <!-- Column 2: Legal -->
            <div>
                <h3 class="text-sm font-semibold text-white mb-6">Legal</h3>
                <ul class="space-y-3 text-sm text-white/70">
                    <li><a href="{{ route('privacy') }}" class="hover:text-white transition-colors">Privacy Policy</a></li>
                    <li><a href="{{ route('terms') }}" class="hover:text-white transition-colors">Terms of Service</a></li>
                </ul>
            </div>

            <!-- Column 3: Connect -->
            <div>
                <h3 class="text-sm font-semibold text-white mb-6">Connect</h3>
                <ul class="space-y-3 text-sm text-white/70">
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact</a></li>
                    <li><a href="https://www.linkedin.com/company/constraal" target="_blank" rel="noopener noreferrer" class="hover:text-white transition-colors">LinkedIn</a></li>
                    <li><a href="https://www.youtube.com/@constraal" target="_blank" rel="noopener noreferrer" class="hover:text-white transition-colors">YouTube</a></li>
                    <li><a href="https://www.instagram.com/constraal" target="_blank" rel="noopener noreferrer" class="hover:text-white transition-colors">Instagram</a></li>
                    <li><a href="https://www.tiktok.com/@constraal" target="_blank" rel="noopener noreferrer" class="hover:text-white transition-colors">TikTok</a></li>
                </ul>
            </div>

            <!-- Column 4: Coming Soon -->
            <div>
                <h3 class="text-sm font-semibold text-white mb-6">Ecosystem</h3>
                <ul class="space-y-3 text-sm text-white/70">
                    <li><span style="opacity: 0.6;">Constraal App – Coming Soon</span></li>
                    <li><span style="opacity: 0.6;">Constraal Platform – Coming Soon</span></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer Bottom Bar -->
    <div class="border-t border-white/10 py-6">
        <div class="site-container text-sm text-white/60">
            &copy; {{ date('Y') }} Constraal. All rights reserved.
        </div>
    </div>
</footer>