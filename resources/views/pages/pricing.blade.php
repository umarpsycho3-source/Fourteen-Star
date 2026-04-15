@extends('layouts.app')

@section('content')

<section class="inner-hero">
    <div class="inner-hero-content">
        <p class="section-tag">PRICING PLANS</p>
        <h1>Simple & <span>Transparent Pricing</span></h1>
        <p>Choose the package that fits your grooming style and budget.</p>
    </div>
</section>

<section class="page-section">
    <div class="pricing-grid">

        <div class="pricing-card">
            <p class="plan-label">STARTER</p>
            <h3>Basic Groom</h3>
            <p class="plan-desc">Perfect for a quick refresh</p>
            <div class="price">$35<span>/visit</span></div>
            <ul class="pricing-features">
                <li>Haircut</li>
                <li>Basic Styling</li>
                <li>Quick Finish</li>
            </ul>
            <a href="{{ route('booking') }}?service=Haircut" class="btn-outline">Choose Plan</a>
        </div>

        <div class="pricing-card featured">
            <div class="popular-badge">Most Popular</div>
            <p class="plan-label">PREMIUM</p>
            <h3>Signature Experience</h3>
            <p class="plan-desc">Complete grooming ritual</p>
            <div class="price">$25<span>/visit</span></div>
            <ul class="pricing-features">
                <li>Beard Trim</li>
                <li>Premium Shaping</li>
                <li>Luxury Finish</li>
            </ul>
            <a href="{{ route('booking') }}?service=Beard%20Trim" class="btn-primary">Choose Plan</a>
        </div>

        <div class="pricing-card">
            <p class="plan-label">ELITE</p>
            <h3>Color Package</h3>
            <p class="plan-desc">Bold premium styling</p>
            <div class="price">$50<span>/visit</span></div>
            <ul class="pricing-features">
                <li>Hair Coloring</li>
                <li>Consultation</li>
                <li>Stylish Finish</li>
            </ul>
            <a href="{{ route('booking') }}?service=Hair%20Coloring" class="btn-outline">Choose Plan</a>
        </div>

    </div>
</section>

@endsection