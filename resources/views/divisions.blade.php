@extends('layouts.app')

@section('title', 'Divisions - Constraal')

@section('page_header')
<div class="page-hero">
    <div class="site-container">
        <p class="text-sm font-semibold text-muted">Company</p>
        <h1>Divisions Overview</h1>
        <p class="mt-4 text-lg max-w-3xl">
            Constraal operates through three divisions, each built on the same engineering foundation
            and tuned for its operating environment.
        </p>
    </div>
</div>
@endsection

@section('content')
<section>
    <div class="site-container">
        <h2>Three Divisions, One Platform</h2>
        <p class="text-muted mb-8 max-w-3xl">
            Each division applies Constraal technology to different environments: home automation,
            intelligent appliance experiences, and industrial construction robotics.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="section-card">
                <h3 class="text-xl font-semibold mb-2">Constraal Home</h3>
                <p class="text-muted mb-4">Consumer robotics and connected home systems for routine household tasks.</p>
                <p class="text-xs text-muted mb-4">Includes autonomous floor cleaning, robotic lawn care, and home monitoring devices.</p>
                <a href="{{ route('homesystems') }}" class="text-sm font-medium text-accent hover:text-accent-dark">Explore Constraal Home →</a>
            </div>
            <div class="section-card">
                <h3 class="text-xl font-semibold mb-2">Constraal Appliances</h3>
                <p class="text-muted mb-4">Intelligent appliance control systems with connected automation and clear interfaces.</p>
                <p class="text-xs text-muted mb-4">Includes smart refrigeration controls, connected kitchen systems, and food monitoring flows.</p>
                <a href="{{ route('appliances') }}" class="text-sm font-medium text-accent hover:text-accent-dark">Explore Appliances →</a>
            </div>
            <div class="section-card">
                <h3 class="text-xl font-semibold mb-2">Constraal Build</h3>
                <p class="text-muted mb-4">Industrial construction automation designed for precision, productivity, and durability.</p>
                <p class="text-xs text-muted mb-4">Includes robotics for painting, drywall, finishing, cabinetry, paving, and demolition.</p>
                <a href="{{ route('build') }}" class="text-sm font-medium text-accent hover:text-accent-dark">Explore Build →</a>
            </div>
        </div>
    </div>
</section>

<section class="section-muted">
    <div class="site-container">
        <h2>Shared Engineering Foundation</h2>
        <p class="text-muted max-w-3xl">
            Robotics engineering, computer vision, smart mapping, automation software,
            and connected systems power every division.
        </p>
        <a href="{{ route('technology') }}" class="btn mt-6">Explore Technology</a>
    </div>
</section>
@endsection