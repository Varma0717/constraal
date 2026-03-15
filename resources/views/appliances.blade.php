@extends('layouts.app')

@section('title', 'Constraal Appliances')

@section('page_header')
<div class="page-hero division-hero" style="background-image: url('{{ asset('images/pngtree-futuristic-smart-kitchen-interior-with-robotic-arm-automation-digital-tablet-interfaces-image_20906722.webp') }}');">
    <div class="division-hero-overlay"></div>
    <div class="site-container">
        <div class="division-hero-content">
            <h1>Constraal Appliances</h1>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="division-coming-soon-section">
    <div class="site-container">
        <div class="division-coming-soon-wrapper">
            <p class="division-description">
                Intelligent appliance systems designed for seamless integration, efficiency, and minimal user effort.
                Constraal Appliances brings connected intelligence to everyday household devices — engineered
                to work quietly in the background while delivering consistent, reliable performance.
            </p>
            <div class="division-status-badge">
                <span>Coming Soon</span>
            </div>
            <a href="{{ route('home') }}#early-access" class="btn btn-lg">Join Updates</a>
        </div>
    </div>
</section>
@endsection