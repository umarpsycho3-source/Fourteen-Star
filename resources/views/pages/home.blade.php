@extends('layouts.app')

@section('content')
<section class="hero">
    <div class="hero-text">
        <p class="small-title">NOW ACCEPTING NEW CLIENTS</p>

        <h1>
            Experience <span class="gold-text">Timeless</span><br>
            Style & Modern Trends
        </h1>

        <p>
            Where premium grooming meets relaxation. Designed for modern gentlemen.
        </p>

        <div class="hero-buttons">
            <a href="/booking" class="btn-primary">Book Appointment</a>
            <a href="/services" class="btn-outline">View Services</a>
        </div>
    </div>

    <div class="hero-image">
        <img src="{{ asset('assets/images/hero.jpg') }}" alt="Hero Image">
    </div>
</section>

<section class="services-section">
    <div class="section-header">
        <p>WHAT WE OFFER</p>
        <h2>Our <span class="gold-text">Grooming Services</span></h2>
    </div>

    <div class="services-grid">
        <a href="/booking?service=Haircut" class="service-card-link">
    <div class="service-card">
        <div class="icon">✂</div>
        <h3>Haircut</h3>
        <p>Professional haircut with modern styling techniques.</p>
    </div>
</a>

<a href="/booking?service=Beard Trim" class="service-card-link">
    <div class="service-card">
        <div class="icon">🪒</div>
        <h3>Beard Trim</h3>
        <p>Clean and sharp beard shaping for a premium look.</p>
    </div>
</a>

<a href="/booking?service=Hair Coloring" class="service-card-link">
    <div class="service-card">
        <div class="icon">✨</div>
        <h3>Hair Coloring</h3>
        <p>Stylish coloring services to match your personality.</p>
    </div>
</a>
    </div>
</section>

<section class="pricing-section">
    <div class="section-header">
        <p>TRANSPARENT PRICING</p>
        <h2>Simple, <span class="gold-text">Honest Pricing</span></h2>
    </div>

    <div class="pricing-grid">
        <div class="pricing-card">
            <p class="plan-label">STARTER</p>
            <h3>Basic Groom</h3>
            <p class="plan-desc">Perfect for a quick refresh</p>
            <div class="price">$35<span>/visit</span></div>
            <a href="/booking" class="btn-outline">Choose Plan</a>
        </div>

        <div class="pricing-card featured">
            <div class="popular-badge">Most Popular</div>
            <p class="plan-label">PREMIUM</p>
            <h3>Signature Experience</h3>
            <p class="plan-desc">The complete grooming ritual</p>
            <div class="price">$85<span>/visit</span></div>
            <a href="/booking" class="btn-primary">Choose Plan</a>
        </div>

        <div class="pricing-card">
            <p class="plan-label">ELITE</p>
            <h3>VIP Package</h3>
            <p class="plan-desc">The ultimate luxury experience</p>
            <div class="price">$150<span>/visit</span></div>
            <a href="/booking" class="btn-outline">Choose Plan</a>
        </div>
    </div>
</section>

<section class="barbers-section">
    <div class="section-header">
        <p>OUR EXPERTS</p>
        <h2>Meet Our <span class="gold-text">Barbers</span></h2>
    </div>

    <div class="barbers-grid">
        <div class="barber-card">
            <img src="{{ asset('assets/images/barber1.jpg') }}" alt="Barber">
            <h3>John Smith</h3>
            <p class="role">Hair Specialist</p>

            <div class="barber-info">
                <span>⭐ 4.8</span>
                <span>5 Services</span>
            </div>

            <a href="/booking?service=Haircut&barber=John%20Smith" class="btn-outline">Book Now</a>
        </div>

        <div class="barber-card">
            <img src="{{ asset('assets/images/barber2.jpg') }}" alt="Barber">
            <h3>David Lee</h3>
            <p class="role">Beard Expert</p>

            <div class="barber-info">
                <span>⭐ 4.9</span>
                <span>6 Services</span>
            </div>

            <a href="/booking?service=Beard%20Trim&barber=David%20Lee" class="btn-outline">Book Now</a>
        </div>

        <div class="barber-card">
            <img src="{{ asset('assets/images/barber3.jpg') }}" alt="Barber">
            <h3>Michael Ray</h3>
            <p class="role">Stylist</p>

            <div class="barber-info">
                <span>⭐ 4.7</span>
                <span>4 Services</span>
            </div>

          <a href="/booking?service=Hair%20Coloring&barber=Michael%20Ray" class="btn-outline">Book Now</a>
        </div>
    </div>
</section>
@endsection