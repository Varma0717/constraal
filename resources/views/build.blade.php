@extends('layouts.app')

@section('title', 'Constraal Build')

@section('page_header')
<div class="page-hero division-hero" style="background-image: url('{{ asset('images/Cjry5YcsHXMdgfkDGNH5Ld-1200-80.jpg') }}');">
    <div class="division-hero-overlay"></div>
    <div class="site-container">
        <div class="division-hero-content">
            <h1>Constraal Build</h1>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="division-coming-soon-section">
    <div class="site-container">
        <div class="division-coming-soon-wrapper">
            <p class="division-description">
                Industrial automation systems engineered for construction precision, reliability, and safety.
                Constraal Build applies robotics and intelligent control to real-world construction environments —
                delivering dependable operation, transparent system behavior, and long-term serviceability.
            </p>
            <div class="division-status-badge">
                <span>Coming Soon</span>
            </div>
            <a href="{{ route('home') }}#early-access" class="btn btn-lg">Join Updates</a>
        </div>
    </div>
</section>
@endsection