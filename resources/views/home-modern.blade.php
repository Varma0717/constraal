@extends('layouts.app')

@section('title', 'Home')

@section('page_header')
<div class="page-hero bg-gradient-to-b from-blue-50 via-white to-slate-50">
    <div class="site-container py-20">
        <div class="hero-grid grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <p class="text-sm font-semibold text-blue-600 uppercase tracking-wide">Welcome to the Future</p>
                <h1 class="mt-4 text-4xl md:text-5xl font-bold text-slate-900 leading-tight">
                    Intelligent Robotics for the Modern Home
                </h1>
                <p class="mt-6 text-xl text-slate-600 max-w-2xl">
                    We are building the intelligence layer for the future home—reliable, safe, and scalable systems that unify robotics, home systems, and intelligent appliances under one platform.
                </p>
                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('technology') }}" class="inline-flex items-center justify-center px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors">
                        Explore Technology
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    <a href="{{ route('careers') }}" class="inline-flex items-center justify-center px-8 py-3 border-2 border-slate-300 text-slate-700 font-semibold rounded-lg hover:border-blue-600 hover:text-blue-600 transition-colors">
                        Join Our Team
                    </a>
                </div>
            </div>
            <div class="hero-visual overflow-hidden rounded-2xl shadow-2xl">
                <img src="{{ asset('images/' . rawurlencode('Hero home.jfif')) }}" alt="Modern smart home" class="w-full h-full object-cover" />
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<!-- Featured Products Section -->
<section class="py-20 bg-white">
    <div class="site-container">
        <div class="mb-16">
            <p class="text-sm font-semibold text-blue-600 uppercase tracking-wide">Our Solutions</p>
            <h2 class="text-4xl font-bold text-slate-900 mt-3">
                Complete Smart Home Ecosystem
            </h2>
            <p class="text-xl text-slate-600 mt-4 max-w-2xl">
                Explore our comprehensive suite of products designed to make your home intelligent, secure, and connected.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Product 1 -->
            <div class="group">
                <div class="bg-white rounded-xl overflow-hidden border border-slate-200 hover:border-blue-400 hover:shadow-lg transition-all duration-300">
                    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 aspect-square overflow-hidden flex items-center justify-center">
                        <svg class="w-20 h-20 text-blue-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 3a3 3 0 00-3 3v12a3 3 0 003 3h12a3 3 0 003-3V6a3 3 0 00-3-3H9zm0 2h12a1 1 0 011 1v12a1 1 0 01-1 1H9a1 1 0 01-1-1V6a1 1 0 011-1z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide">Artificial Intelligence</p>
                        <h3 class="font-bold text-lg text-slate-900 mt-3">AI Platform</h3>
                        <p class="text-sm text-slate-600 mt-3">Intelligent automation and predictive analytics for seamless home management</p>
                        <a href="{{ route('technology') }}" class="inline-flex items-center mt-6 text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">
                            Learn More →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="group">
                <div class="bg-white rounded-xl overflow-hidden border border-slate-200 hover:border-blue-400 hover:shadow-lg transition-all duration-300">
                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 aspect-square overflow-hidden flex items-center justify-center">
                        <svg class="w-20 h-20 text-purple-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <p class="text-xs font-semibold text-purple-600 uppercase tracking-wide">Robotics</p>
                        <h3 class="font-bold text-lg text-slate-900 mt-3">Robotics Suite</h3>
                        <p class="text-sm text-slate-600 mt-3">Advanced robots designed to assist with daily tasks and home management</p>
                        <a href="{{ route('robotics') }}" class="inline-flex items-center mt-6 text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">
                            Learn More →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="group">
                <div class="bg-white rounded-xl overflow-hidden border border-slate-200 hover:border-blue-400 hover:shadow-lg transition-all duration-300">
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 aspect-square overflow-hidden flex items-center justify-center">
                        <svg class="w-20 h-20 text-green-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <p class="text-xs font-semibold text-green-600 uppercase tracking-wide">Smart Living</p>
                        <h3 class="font-bold text-lg text-slate-900 mt-3">Home Systems</h3>
                        <p class="text-sm text-slate-600 mt-3">Integrated systems for lighting, climate, and environmental control</p>
                        <a href="{{ route('homesystems') }}" class="inline-flex items-center mt-6 text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">
                            Learn More →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="group">
                <div class="bg-white rounded-xl overflow-hidden border border-slate-200 hover:border-blue-400 hover:shadow-lg transition-all duration-300">
                    <div class="bg-gradient-to-br from-orange-50 to-yellow-50 aspect-square overflow-hidden flex items-center justify-center">
                        <svg class="w-20 h-20 text-orange-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <p class="text-xs font-semibold text-orange-600 uppercase tracking-wide">Appliances</p>
                        <h3 class="font-bold text-lg text-slate-900 mt-3">Smart Appliances</h3>
                        <p class="text-sm text-slate-600 mt-3">Intelligent kitchen and home appliances with connected features</p>
                        <a href="{{ route('appliances') }}" class="inline-flex items-center mt-6 text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">
                            Learn More →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Feature Showcase 1 -->
<section class="py-20 bg-gradient-to-b from-slate-50 to-white">
    <div class="site-container">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <p class="text-sm font-semibold text-blue-600 uppercase tracking-wide">The Future of Home</p>
                <h2 class="text-4xl font-bold text-slate-900 mt-3">
                    Intelligent Living Environments
                </h2>
                <p class="text-lg text-slate-600 mt-6">
                    Homes are becoming responsive environments. Robotics moves out of factories and into daily life, while appliances evolve into intelligent, coordinated systems.
                </p>
                <ul class="mt-8 space-y-4">
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-slate-700 font-medium">Human-aware robotics that are safe around people and pets</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-slate-700 font-medium">Seamless integration across all home devices and systems</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-slate-700 font-medium">Advanced analytics and intelligent decision-making</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-slate-700 font-medium">Enterprise-grade security and reliability standards</span>
                    </li>
                </ul>
                <a href="{{ route('about') }}" class="inline-flex items-center mt-8 px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors">
                    Learn More About Our Vision
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl overflow-hidden h-96 flex items-center justify-center shadow-xl">
                <svg class="w-32 h-32 text-blue-200" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"></path>
                </svg>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-16 bg-blue-600 text-white">
    <div class="site-container">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl font-bold mb-2">500+</div>
                <p class="text-blue-100">Smart Home Projects</p>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold mb-2">10K+</div>
                <p class="text-blue-100">Active Users</p>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold mb-2">99.9%</div>
                <p class="text-blue-100">Uptime Guarantee</p>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold mb-2">24/7</div>
                <p class="text-blue-100">Support Available</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-blue-700 text-white">
    <div class="site-container text-center">
        <h2 class="text-4xl font-bold mb-6">Ready to Build Your Smart Home?</h2>
        <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
            Join thousands of users already experiencing the future of intelligent home living.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('technology') }}" class="px-8 py-3 bg-white text-blue-600 font-semibold rounded-lg hover:bg-blue-50 transition-colors">
                Explore Solutions
            </a>
            <a href="{{ route('contact') }}" class="px-8 py-3 border-2 border-white text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors">
                Get in Touch
            </a>
        </div>
    </div>
</section>
@endsection