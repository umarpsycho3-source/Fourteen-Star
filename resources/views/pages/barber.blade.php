@extends('layouts.app')

@section('content')

<section class="inner-hero">
    <div class="inner-hero-content">
        <p class="section-tag">OUR BARBERS</p>
        <h1>Meet Our <span>Expert Team</span></h1>
        <p>Professional barbers dedicated to style, precision, and premium grooming care.</p>
    </div>
</section>

<section class="page-section">
    <div class="barbers-grid">

        <div class="barber-card">
            <img src="{{ asset('assets/images/barber1.jpg') }}" alt="John Smith">
            <h3>John Smith</h3>
            <p class="role">Hair Specialist</p>
            <div class="barber-info">
                <span>⭐ 4.8</span>
                <span>5 Services</span>
            </div>
            <a href="{{ route('booking') }}?service=Haircut&barber=John%20Smith" class="btn-outline">Book Now</a>
        </div>

        <div class="barber-card">
            <img src="{{ asset('assets/images/barber2.jpg') }}" alt="David Lee">
            <h3>David Lee</h3>
            <p class="role">Beard Expert</p>
            <div class="barber-info">
                <span>⭐ 4.9</span>
                <span>6 Services</span>
            </div>
            <a href="{{ route('booking') }}?service=Beard%20Trim&barber=David%20Lee" class="btn-outline">Book Now</a>
        </div>

        <div class="barber-card">
            <img src="{{ asset('assets/images/barber3.jpg') }}" alt="Michael Ray">
            <h3>Michael Ray</h3>
            <p class="role">Stylist</p>
            <div class="barber-info">
                <span>⭐ 4.7</span>
                <span>4 Services</span>
            </div>
            <a href="{{ route('booking') }}?service=Hair%20Coloring&barber=Michael%20Ray" class="btn-outline">Book Now</a>
        </div>

    </div>
</section>

@endsection