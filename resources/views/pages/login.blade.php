@extends('layouts.app')

@section('content')

<section class="booking-page">
    <div class="booking-wrapper">
        <div class="booking-left">
            <p class="booking-small-title">WELCOME BACK</p>
            <h1>Login to <span class="gold-text">Your Account</span></h1>
            <p class="booking-description">
                Login to manage your barbershop bookings and access your dashboard.
            </p>
        </div>

        <div class="booking-right">
            <div class="booking-container">
                <p class="form-top-text">LOGIN</p>
                <h2>Sign In</h2>

                @if(session('success'))
                    <p class="success-message">{{ session('success') }}</p>
                @endif

                @if(session('error'))
                    <p class="success-message">{{ session('error') }}</p>
                @endif

                <form method="POST" action="{{ route('login.submit') }}">
                    @csrf

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter your password" required>
                    </div>

                    <button type="submit" class="booking-submit-btn">Login</button>
                </form>

                <p style="margin-top:15px; color:#aaa;">
                    Don’t have an account?
                    <a href="{{ route('register') }}" style="color:gold;">Register</a>
                </p>
            </div>
        </div>
    </div>
</section>

@endsection