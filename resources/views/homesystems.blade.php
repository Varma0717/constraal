@extends('layouts.app')

@section('title', 'Constraal Home - Constraal')

@section('page_header')
<div class="page-hero">
    <div class="site-container">
        <p class="text-sm font-semibold text-muted">Platform</p>
        <h1>Constraal Home</h1>
        <p class="mt-4 text-lg max-w-3xl">
            Intelligent home infrastructure that coordinates sensing, safety, and automation—built for privacy and long-term reliability.
        </p>
    </div>
</div>
@endsection

@section('content')
<!-- Overview -->
<section>
    <div class="site-container">
        <h2>Smart Home Platform</h2>
        <p class="text-muted mb-6">
            Constraal Home provides the coordination layer that ties together robotics, appliances, and environmental systems.
            We focus on reliability, privacy, and seamless integration—without exposing live device access on the public site.
        </p>
    </div>
</section>

<!-- Core Systems -->
<section>
    <div class="site-container">
        <h2>Core Systems</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-3">Climate Control</h3>
                <p class="text-muted">
                    Predictive HVAC management that anticipates comfort needs while optimizing energy consumption. Room-level control with occupancy awareness.
                </p>
            </div>
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-3">Lighting & Ambiance</h3>
                <p class="text-muted">
                    Tunable LED systems synchronized with circadian rhythms, occupancy detection, and scene control for different activities.
                </p>
            </div>
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-3">Security & Monitoring</h3>
                <p class="text-muted">
                    Integrated access control, intrusion detection, and local-first video processing.
                </p>
            </div>
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-3">Energy Management</h3>
                <p class="text-muted">
                    Real-time monitoring and optimization of household energy use, including solar integration.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Home Operations Layer -->
<section class="section-muted">
    <div class="site-container">
        <h2>Home Operations Layer</h2>
        <p class="text-muted mb-6">
            A unified control layer for zoning, modes, and automation. Built for teams and households that want clarity and control.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="section-card">
                <h3 class="font-semibold mb-2">Zoning & Modes</h3>
                <p class="text-muted">Define rooms, zones, and behavior modes for daily routines and safety.</p>
            </div>
            <div class="section-card">
                <h3 class="font-semibold mb-2">Team Console</h3>
                <p class="text-muted">An internal admin view for monitoring and configuration (internal only).</p>
            </div>
            <div class="section-card">
                <h3 class="font-semibold mb-2">Clear Controls</h3>
                <p class="text-muted">High-level controls that remain predictable and safe in every state.</p>
            </div>
        </div>
    </div>
</section>

<!-- User Experience -->
<section>
    <div class="site-container">
        <h2>User Experience</h2>
        <p class="text-muted mb-6">
            Minimal, calm interfaces for daily use. The public website does not provide live device access.
        </p>
        <div class="space-y-3 max-w-3xl">
            <div>
                <p class="font-semibold">Mobile App</p>
                <p class="text-muted text-sm">Simple, predictable control without clutter.</p>
            </div>
            <div>
                <p class="font-semibold">Voice Control</p>
                <p class="text-muted text-sm">Natural commands processed locally for privacy.</p>
            </div>
            <div>
                <p class="font-semibold">Physical Controls</p>
                <p class="text-muted text-sm">Clear tactile interfaces for critical actions.</p>
            </div>
        </div>
    </div>
</section>
@endsection