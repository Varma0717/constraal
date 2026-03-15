@extends('layouts.app')

@section('title', 'Safety & Reliability - Constraal')

@section('page_header')
<div class="page-hero">
    <div class="site-container">
        <p class="text-sm font-semibold text-muted">Trust & Safety</p>
        <h1>Safety & Reliability</h1>
        <p class="mt-4 text-lg max-w-3xl">
            Safety is not a feature—it's foundational. We design human-safe systems with predictable behavior, rigorous safeguards,
            and transparent operation across robotics, home systems, and appliances.
        </p>
    </div>
</div>
@endsection

@section('content')
<!-- Safety-First Engineering -->
<section>
    <div class="site-container">
        <h2>Safety-First Engineering</h2>
        <p class="text-muted mb-6">
            Intelligent systems earn trust through clarity, limits, and consistent behavior in real environments.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-3">Predictability</h3>
                <p class="text-muted">Systems behave as expected within defined operating boundaries.</p>
            </div>
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-3">Transparency</h3>
                <p class="text-muted">Clear system state, readable logs, and explainable actions.</p>
            </div>
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-3">Human Authority</h3>
                <p class="text-muted">Automation serves people. Humans retain final control and override.</p>
            </div>
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-3">Resilience</h3>
                <p class="text-muted">Safe operation under degraded conditions with controlled fallback states.</p>
            </div>
        </div>
    </div>
</section>

<!-- Human Interaction Standards -->
<section class="section-muted">
    <div class="site-container">
        <h2>Human Interaction Standards</h2>
        <p class="text-muted mb-6">
            Robotics in homes requires careful attention to proximity, speed, force, and intent.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-2">Human-Aware Motion</h3>
                <p class="text-muted">Speed and path planning adapt to people, pets, and sensitive spaces.</p>
            </div>
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-2">Force Limiting</h3>
                <p class="text-muted">Collision detection and force limits prevent unsafe contact.</p>
            </div>
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-2">Emergency Controls</h3>
                <p class="text-muted">Immediate stops through hardware and software safeguards.</p>
            </div>
        </div>
    </div>
</section>

<!-- Fail-Safe and Redundancy -->
<section>
    <div class="site-container">
        <h2>Fail-Safe & Redundancy</h2>
        <p class="text-muted mb-6">
            Redundant sensing, bounded autonomy, and layered safeguards ensure predictable outcomes.
        </p>
        <div class="space-y-6">
            <div>
                <h3 class="font-semibold text-lg mb-2">Fail-Safe States</h3>
                <p class="text-muted">On errors, systems default to safe modes with clear recovery paths.</p>
            </div>
            <div>
                <h3 class="font-semibold text-lg mb-2">Defense in Depth</h3>
                <p class="text-muted">Independent protections across hardware, firmware, and software.</p>
            </div>
            <div>
                <h3 class="font-semibold text-lg mb-2">Continuous Monitoring</h3>
                <p class="text-muted">Self-checks, diagnostics, and alerts prevent silent failure states.</p>
            </div>
        </div>
    </div>
</section>

<!-- Privacy and Reliability -->
<section class="section-muted">
    <div class="site-container">
        <h2>Privacy & Reliability</h2>
        <p class="text-muted mb-6">
            Your home is private. We prioritize local control, secure communication, and long-term reliability.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-3">Local-First Control</h3>
                <p class="text-muted">Most operations happen locally, with clear opt-in for cloud services.</p>
            </div>
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-3">Security by Design</h3>
                <p class="text-muted">Encrypted communication, secure boot, and auditable update paths.</p>
            </div>
        </div>
    </div>
</section>
@endsection