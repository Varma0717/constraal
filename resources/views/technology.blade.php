@extends('layouts.app')

@section('title', 'Constraal Technology')

@section('page_header')
<div class="page-hero division-hero" style="background-image: url('{{ asset('images/2406_tn_minimalisttech_artistgndphotography.png') }}');">
    <div class="division-hero-overlay"></div>
    <div class="site-container">
        <div class="division-hero-content">
            <h1>Constraal Technology</h1>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="division-coming-soon-section">
    <div class="site-container">
        <div class="division-coming-soon-wrapper">
            <p class="division-description">
                The unified intelligence platform behind every Constraal system — combining embedded computing,
                spatial awareness, sensor processing, and secure connected architectures. Engineered for
                precision, privacy, and long-term reliability across consumer and industrial environments.
            </p>
            <div class="division-status-badge">
                <span>Coming Soon</span>
            </div>
            <a href="{{ route('home') }}#early-access" class="btn btn-lg">Join Updates</a>
        </div>
    </div>
</section>
@endsection