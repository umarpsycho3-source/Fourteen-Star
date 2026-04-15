<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fourteen Star</title>

    <link rel="stylesheet" href="{{ secure_asset('assets/css/style.css') }}">
</head>
<body>

    <header class="navbar">
        <div class="logo">
            ✂ Fourteen <span>Star</span>
        </div>

        <nav class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('services') }}">Services</a>
            <a href="{{ route('pricing') }}">Pricing</a>
            <a href="{{ route('barbers') }}">Barbers</a>
            <a href="{{ route('my.bookings') }}">My Bookings</a>

            @if(session('user') && session('user.role') === 'admin')
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('bookings.list') }}">Bookings</a>
            @endif
        </nav>

        <div class="nav-right">
            @if(session('user'))
                <span style="color:white; margin-right:10px;">{{ session('user.name') }}</span>
                <a href="{{ route('logout') }}" class="btn-outline">Logout</a>
            @else
                <a href="{{ route('login') }}" class="btn-outline">Login</a>
            @endif

            <a href="{{ route('booking') }}" class="btn-primary">Book Now</a>
        </div>
    </header>

    @yield('content')

    <footer class="footer">
        <div class="footer-overlay"></div>

        <div class="footer-container">
            <div class="footer-brand">
                <h2>✂ Fourteen <span>Star</span></h2>
                <p>
                    A premium barbershop experience built for style, comfort, and confidence.
                    We deliver modern grooming with luxury care.
                </p>

                <div class="footer-socials">
                    <a href="#">Fb</a>
                    <a href="#">In</a>
                    <a href="#">Ig</a>
                    <a href="#">X</a>
                </div>
            </div>

            <div class="footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('services') }}">Services</a></li>
                    <li><a href="{{ route('pricing') }}">Pricing</a></li>
                    <li><a href="{{ route('barbers') }}">Barbers</a></li>
                    <li><a href="{{ route('booking') }}">Booking</a></li>
                </ul>
            </div>

            <div class="footer-links">
                <h3>Contact Info</h3>
                <ul>
                    <li>Kandy, Sri Lanka</li>
                    <li>+94 77 181 3023</li>
                    <li>novawebsolution@fourteenstar.com</li>
                    <li>Mon - Fri: 9 AM - 8 PM</li>
                </ul>
            </div>

            <div class="footer-newsletter">
                <h3>Stay Updated</h3>
                <p>Get updates about offers, grooming tips, and premium services.</p>

                <form class="newsletter-form">
                    <input type="email" placeholder="Enter your email">
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>

        <div class="footer-bottom">
            <p>© 2026 Fourteen Star. All Rights Reserved. Designed with premium style.</p>
        </div>
    </footer>

</body>
</html>