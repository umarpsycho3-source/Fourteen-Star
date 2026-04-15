@extends('layouts.app')

@section('content')

<section class="booking-page">
    <div class="booking-wrapper">
        <div class="booking-left">
            <p class="booking-small-title">CREATE ACCOUNT</p>
            <h1>Register as <span class="gold-text">Customer</span></h1>
            <p class="booking-description">
                Create your account to manage your appointments and access your bookings.
            </p>
        </div>

        <div class="booking-right">
            <div class="booking-container">
                <p class="form-top-text">REGISTER</p>
                <h2>Create Account</h2>

                <form method="POST" action="{{ route('register.submit') }}">
                    @csrf

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Enter your name" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter your password" required>
                    </div>

                    <button type="submit" class="booking-submit-btn">Register</button>
                </form>

                <p style="margin-top:15px; color:#aaa;">
                    Already have an account?
                    <a href="{{ route('login') }}" style="color:gold;">Login</a>
                </p>
            </div>
        </div>
    </div>
</section>

@endsection