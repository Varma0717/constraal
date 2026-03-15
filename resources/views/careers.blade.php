@extends('layouts.app')

@section('title', 'Careers - Constraal')

@section('page_header')
<div class="page-hero">
    <div class="site-container">
        <p class="text-sm font-semibold text-muted">Join Us</p>
        <h1>Join Our Team</h1>
        <p class="mt-4 text-lg max-w-3xl">
            Mission-driven recruitment. We're building systems that serve humanity. If you're passionate about engineering, safety, and impact, we'd love to meet you.
        </p>
    </div>
</div>
@endsection

@section('content')
<!-- Why Work Here -->
<section>
    <div class="site-container">
        <h2>Why Constraal</h2>
        <p class="text-muted mb-6">
            We're a small team of roboticists, engineers, and designers working on problems that matter. We value:
        </p>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-8">
            <div class="section-card">
                <p class="font-semibold mb-2">Technical Excellence</p>
                <p class="text-muted text-sm">We invest in our craft. Clean code, rigorous testing, and continuous learning.</p>
            </div>
            <div class="section-card">
                <p class="font-semibold mb-2">Impact</p>
                <p class="text-muted text-sm">Your work goes into products used in real homes and industries.</p>
            </div>
            <div class="section-card">
                <p class="font-semibold mb-2">Autonomy</p>
                <p class="text-muted text-sm">We trust our team members to own their projects and make decisions.</p>
            </div>
            <div class="section-card">
                <p class="font-semibold mb-2">Safety First</p>
                <p class="text-muted text-sm">Everything we build prioritizes human safety and reliability.</p>
            </div>
        </div>
    </div>
</section>

<!-- Role Categories -->
<section class="section-muted">
    <div class="site-container">
        <h2>Role Categories</h2>
        <p class="text-muted mb-6">We are hiring across core engineering domains:</p>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-2">Robotics</h3>
                <p class="text-muted text-sm">Motion planning, perception, and safe interaction systems.</p>
            </div>
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-2">Embedded</h3>
                <p class="text-muted text-sm">Firmware, real-time systems, and hardware integration.</p>
            </div>
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-2">Software</h3>
                <p class="text-muted text-sm">Platform architecture, tooling, and system orchestration.</p>
            </div>
            <div class="section-card">
                <h3 class="font-semibold text-lg mb-2">Systems</h3>
                <p class="text-muted text-sm">Safety, reliability, validation, and test automation.</p>
            </div>
        </div>
    </div>
</section>

<!-- Open Positions -->
<section>
    <div class="site-container">
        <h2>Open Positions</h2>
        <p class="text-muted mb-8">
            Currently looking for talented engineers and designers:
        </p>

        @if(isset($jobs) && $jobs->count())
        <div class="space-y-4">
            @foreach($jobs as $job)
            <div class="border border-gray-200 p-6 rounded hover:shadow-md transition-shadow">
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="font-semibold text-lg">{{ $job->title }}</h3>
                        <p class="text-muted text-sm mt-1">{{ $job->location }} · {{ $job->category }}</p>
                        <p class="text-muted mt-3 max-w-2xl">{{ Str::limit($job->description, 200) }}</p>
                    </div>
                    <a href="{{ route('jobs.apply', $job) }}" class="btn-secondary whitespace-nowrap">Apply</a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="section-card p-8 text-center">
            <p class="text-muted">No open positions at the moment. Check back soon or reach out at careers@constraal.example to express your interest.</p>
        </div>
        @endif
    </div>
</section>

<!-- Life at Constraal -->
<section class="section-muted">
    <div class="site-container">
        <h2>What to Expect</h2>
        <p class="text-muted mb-8">
            Working at Constraal means:
        </p>
        <div class="space-y-6">
            <div class="flex items-start gap-4">
                <span class="text-accent font-bold text-xl flex-shrink-0">→</span>
                <div>
                    <p class="font-semibold mb-1">Hard Problems</p>
                    <p class="text-muted">You'll work on robotics, embedded systems, machine learning, and infrastructure. Real technical challenges with real-world impact.</p>
                </div>
            </div>
            <div class="flex items-start gap-4">
                <span class="text-accent font-bold text-xl flex-shrink-0">→</span>
                <div>
                    <p class="font-semibold mb-1">Collaborative Culture</p>
                    <p class="text-muted">We review each other's code, share design decisions, and solve problems together. Disagreement is encouraged—consensus is the goal.</p>
                </div>
            </div>
            <div class="flex items-start gap-4">
                <span class="text-accent font-bold text-xl flex-shrink-0">→</span>
                <div>
                    <p class="font-semibold mb-1">Continuous Learning</p>
                    <p class="text-muted">We invest in conferences, training, and research. You'll stay current with emerging technologies and best practices.</p>
                </div>
            </div>
            <div class="flex items-start gap-4">
                <span class="text-accent font-bold text-xl flex-shrink-0">→</span>
                <div>
                    <p class="font-semibold mb-1">Work-Life Balance</p>
                    <p class="text-muted">Flexible hours, remote-friendly, and reasonable expectations. We believe sustainable pace leads to better work.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact -->
<section>
    <div class="site-container">
        <h2>Interested?</h2>
        <p class="text-muted mb-6">
            Don't see a perfect fit? We're always interested in hearing from talented engineers who share our mission.
        </p>
        <div class="space-y-3">
            <p class="text-muted">
                <strong>Email:</strong> <a href="mailto:careers@constraal.example" class="text-accent hover:text-accent">careers@constraal.example</a>
            </p>
            <p class="text-muted">
                <strong>Include:</strong> Your resume, a brief note about why you're interested in Constraal, and links to your work (GitHub, portfolio, etc.)
            </p>
        </div>
    </div>
</section>
@endsection