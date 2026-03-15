@extends('layouts.app')

@section('title', 'Robotics Research - Constraal')

@section('page_header')
<div class="page-hero">
    <div class="site-container">
        <p class="text-sm font-semibold text-muted">Research</p>
        <h1>Robotics Research</h1>
        <p class="mt-4 text-lg max-w-3xl">
            Human-aware robotics designed for home environments. We focus on safe motion, intuitive interaction, and reliable operation.
        </p>
    </div>
</div>
@endsection

@section('content')
<!-- Overview -->
<section>
    <div class="site-container">
        <h2>Home Robotics, Built for Trust</h2>
        <p class="text-muted mb-6">
            Constraal's robotics research focuses on safe, predictable behavior in shared living spaces.
            We prioritize human-aware motion, reliable sensing, and bounded autonomy.
        </p>
    </div>
</section>

<!-- Key Capabilities -->
<section>
    <div class="site-container">
        <h2>Core Capabilities</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-3">Autonomous Navigation</h3>
                <p class="text-muted">
                    Real-time mapping and localization for safe navigation in homes and shared spaces.
                </p>
            </div>
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-3">Perception & Sensing</h3>
                <p class="text-muted">
                    Multi-modal sensor fusion for awareness of people, pets, and obstacles in dynamic spaces.
                </p>
            </div>
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-3">Manipulation</h3>
                <p class="text-muted">
                    Dexterous, force-limited manipulation designed for safe interactions with everyday objects.
                </p>
            </div>
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-3">Human Interaction</h3>
                <p class="text-muted">
                    Safe motion control, gesture awareness, and intuitive collaboration in shared spaces.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Future Assistance Platforms -->
<section>
    <div class="site-container">
        <h2>Future Assistance Platforms</h2>
        <p class="text-muted mb-6">
            We are designing robotics platforms that assist with daily routines while staying transparent and controllable.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-2">Home Assistance</h3>
                <p class="text-muted">Navigation, fetching, and support tasks designed for safety around people.</p>
            </div>
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-2">Context Awareness</h3>
                <p class="text-muted">Sensor integration that understands activity, environment changes, and intent.</p>
            </div>
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-2">Trust by Design</h3>
                <p class="text-muted">Clear system behavior, safe stops, and human-in-the-loop controls.</p>
            </div>
        </div>
    </div>
</section>

<!-- Development Status -->
<section class="section-muted">
    <div class="site-container">
        <h2 class="text-center">Development Status</h2>
        <p class="text-muted mb-8 text-center">We are in active research and prototyping.</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-2">Research</h3>
                <p class="text-muted">Human-aware motion planning, safe manipulation, and long-term reliability.</p>
            </div>
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-2">Prototype Systems</h3>
                <p class="text-muted">Early platforms focused on home environments and interaction safety.</p>
            </div>
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-2">Validation</h3>
                <p class="text-muted">Controlled testing for fail-safe behavior, transparency, and predictability.</p>
            </div>
        </div>
    </div>
</section>

<!-- Design Philosophy -->
<section>
    <div class="site-container">
        <h2>Design Philosophy</h2>
        <p class="text-muted mb-6">
            We build robotics as trusted tools—transparent, predictable, and respectful of human space.
            Safety and reliability come before novelty.
        </p>
        <a href="{{ route('careers') }}" class="btn">Join Our Robotics Team</a>
    </div>
</section>
@endsection