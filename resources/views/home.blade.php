@extends('layouts.app')

@section('title', 'Intelligent Systems. Seamless Living.')

@section('page_header')
<!-- Section 1: Hero with Video Background -->
<div class="page-hero hero-home hero-video-wrap">
    <!-- Video Background -->
    <video class="hero-video-bg" autoplay muted loop playsinline preload="auto">
        <source src="{{ asset('videos/hero.mp4') }}" type="video/mp4">
    </video>
    <div class="hero-video-overlay"></div>

    <div class="site-container">
        <div class="hero-home-content">
            <h1 class="hero-home-headline">Intelligent Systems.<br>Seamless Living.</h1>
            <p class="hero-home-subtext">
                Advanced robotics and connected automation engineered to operate quietly, reliably, and intelligently across homes and work environments.
            </p>
            <div class="hero-home-ctas">
                <a href="#divisions" class="btn">Explore Systems</a>
                <a href="#early-access" class="btn btn-secondary">Join Updates</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<!-- Section 2: Business Divisions Overview -->
<section id="divisions">
    <div class="site-container">
        <h2 class="text-center">Our Ecosystem</h2>
        <p class="text-center text-muted mb-8 max-w-3xl mx-auto">Three structured divisions. One unified technology platform.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Constraal Home -->
            <div class="division-card">
                <div class="division-card-header">
                    <span class="division-icon">
                        <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0a1 1 0 01-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 01-1 1h-2z" />
                        </svg>
                    </span>
                    <span class="division-status">Coming Soon</span>
                </div>
                <h3>Constraal Home</h3>
                <p class="text-muted">
                    Constraal Home is developing a new generation of consumer robotics and connected systems engineered to operate seamlessly within daily life.
                </p>
                <ul class="division-focus-list">
                    <li>Autonomous household robotics</li>
                    <li>Environmental intelligence</li>
                    <li>Unified ecosystem control</li>
                    <li>Adaptive spatial automation</li>
                </ul>
                <a href="#early-access" class="btn btn-secondary mt-4 w-full">Notify Me at Launch</a>
            </div>

            <!-- Constraal Appliances -->
            <div class="division-card">
                <div class="division-card-header">
                    <span class="division-icon">
                        <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 3v2m6-2v6m-6 6h.01M9 21h6m-3-3a6 6 0 006-6V4H6v8a6 6 0 006 6z" />
                        </svg>
                    </span>
                    <span class="division-status">Coming Soon</span>
                </div>
                <h3>Constraal Appliances</h3>
                <p class="text-muted">
                    Constraal Appliances is building intelligent appliance control systems designed for seamless integration and efficiency.
                </p>
                <ul class="division-focus-list">
                    <li>Connected digital interfaces</li>
                    <li>Intelligent monitoring systems</li>
                    <li>Ecosystem synchronization</li>
                    <li>Minimalist user experiences</li>
                </ul>
                <a href="#early-access" class="btn btn-secondary mt-4 w-full">Request Early Updates</a>
            </div>

            <!-- Constraal Build -->
            <div class="division-card">
                <div class="division-card-header">
                    <span class="division-icon">
                        <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0H5m14 0h2m-16 0H3m4-8h2m4 0h2m-8 4h2m4 0h2m-8-8h2m4 0h2" />
                        </svg>
                    </span>
                    <span class="division-status">Coming Soon</span>
                </div>
                <h3>Constraal Build</h3>
                <p class="text-muted">
                    Constraal Build is an industrial automation division focused on robotics engineered for construction precision and durability.
                </p>
                <ul class="division-focus-list">
                    <li>Surface automation systems</li>
                    <li>Interior robotics</li>
                    <li>Infrastructure-grade performance</li>
                    <li>Industrial-grade reliability</li>
                </ul>
                <a href="{{ route('contact') }}" class="btn btn-secondary mt-4 w-full">Industrial Inquiries</a>
            </div>
        </div>
    </div>
</section>

<!-- Section 3: Technology Platform -->
<section id="technology-platform" class="section-muted">
    <div class="site-container">
        <h2 class="text-center">The Constraal Intelligence Platform</h2>
        <p class="text-center text-muted mb-8 max-w-3xl mx-auto">
            All Constraal systems are powered by a unified intelligent backbone combining robotics engineering, spatial intelligence, and connected automation.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div class="grid grid-cols-1 gap-6">
                <div class="tech-pillar-card">
                    <div class="tech-pillar-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h4>Robotics Engineering</h4>
                    <p class="text-sm text-muted">Precision motion, actuation, and mechanical intelligence across consumer and industrial systems.</p>
                </div>
                <div class="tech-pillar-card">
                    <div class="tech-pillar-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                    <h4>Computer Vision</h4>
                    <p class="text-sm text-muted">Real-time perception and scene understanding for intelligent spatial awareness.</p>
                </div>
            </div>
            <div class="tech-pillar-card tech-pillar-card--featured">
                <div class="tech-pillar-icon tech-pillar-icon--large">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                    </svg>
                </div>
                <h4>Smart Mapping</h4>
                <p class="text-muted">Spatial intelligence that builds, interprets, and navigates real-world environments in real time.</p>
            </div>
            <div class="grid grid-cols-1 gap-6">
                <div class="tech-pillar-card">
                    <div class="tech-pillar-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                    <h4>Automation Software</h4>
                    <p class="text-sm text-muted">Intelligent orchestration layer that coordinates devices, routines, and system behavior.</p>
                </div>
                <div class="tech-pillar-card">
                    <div class="tech-pillar-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <h4>Secure Connected Systems</h4>
                    <p class="text-sm text-muted">End-to-end security architecture for trusted communication and data privacy.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 4: Brand Pillars -->
<section class="pillars-section">
    <div class="site-container">
        <h2 class="text-center">What Defines Constraal</h2>
        <p class="text-center text-muted mb-8 max-w-3xl mx-auto">Five principles that guide every system we design.</p>

        <div class="pillars-grid-new">
            <article class="pillar-card-new">
                <span class="pillar-index">01</span>
                <h3>Reliability</h3>
                <p class="text-sm text-muted mt-3">Technology engineered for consistent real-world performance.</p>
            </article>
            <article class="pillar-card-new">
                <span class="pillar-index">02</span>
                <h3>Intelligence</h3>
                <p class="text-sm text-muted mt-3">Systems that adapt and optimize over time.</p>
            </article>
            <article class="pillar-card-new">
                <span class="pillar-index">03</span>
                <h3>Safety</h3>
                <p class="text-sm text-muted mt-3">Responsible automation built for human environments.</p>
            </article>
            <article class="pillar-card-new">
                <span class="pillar-index">04</span>
                <h3>Integration</h3>
                <p class="text-sm text-muted mt-3">A unified ecosystem, not isolated devices.</p>
            </article>
            <article class="pillar-card-new pillar-card-new--wide">
                <span class="pillar-index">05</span>
                <h3>Simplicity</h3>
                <p class="text-sm text-muted mt-3">Advanced systems designed to feel effortless.</p>
            </article>
        </div>
    </div>
</section>

<!-- Section 5: Impact -->
<section class="section-muted">
    <div class="site-container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h2>Designed to Improve Everyday Environments</h2>
                <p class="text-muted max-w-3xl">
                    Our systems are built with a clear purpose: to make homes smarter, construction safer, and everyday tasks simpler.
                </p>
            </div>
            <div>
                <ul class="impact-list">
                    <li class="impact-list-item">
                        <svg class="w-5 h-5 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Reduce repetitive household tasks</span>
                    </li>
                    <li class="impact-list-item">
                        <svg class="w-5 h-5 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Improve construction precision</span>
                    </li>
                    <li class="impact-list-item">
                        <svg class="w-5 h-5 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Enhance safety through automation</span>
                    </li>
                    <li class="impact-list-item">
                        <svg class="w-5 h-5 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Deliver more responsive environments</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Section 6: Email Capture / Early Access -->
<section id="early-access" class="early-access-section">
    <div class="site-container">
        <div class="early-access-container">
            <div class="early-access-copy">
                <h2>Be the First to Experience Constraal</h2>
                <p class="text-muted">
                    Sign up for early access updates, product announcements, and partnership opportunities across our three divisions.
                </p>
            </div>
            <div class="early-access-form-wrapper">
                @if(session('status'))
                <div class="early-access-success">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('subscribe') }}" class="early-access-form">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="ea-name">Name</label>
                            <input type="text" id="ea-name" name="name" required placeholder="Your full name" class="form-input" />
                            @error('name') <span class="form-error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="ea-email">Email</label>
                            <input type="email" id="ea-email" name="email" required placeholder="you@example.com" class="form-input" />
                            @error('email') <span class="form-error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ea-interest">Interest Category</label>
                        <select id="ea-interest" name="interest_category" class="form-input" required>
                            <option value="general">General</option>
                            <option value="home">Home</option>
                            <option value="appliances">Appliances</option>
                            <option value="build">Build</option>
                        </select>
                    </div>
                    <div class="form-checkboxes">
                        <label class="form-checkbox">
                            <input type="checkbox" name="investor_interest" value="1" />
                            <span>I'm interested as an investor</span>
                        </label>
                        <label class="form-checkbox">
                            <input type="checkbox" name="industrial_partner" value="1" />
                            <span>I'm interested as an industrial partner</span>
                        </label>
                    </div>
                    <button type="submit" class="btn w-full">Join Early Access</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection