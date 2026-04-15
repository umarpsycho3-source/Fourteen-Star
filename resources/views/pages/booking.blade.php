@extends('layouts.app')

@section('content')

<section class="booking-page">
    <div class="booking-wrapper">

        <div class="booking-left">
            <p class="booking-small-title">PREMIUM APPOINTMENT</p>
            <h1>Book Your <span class="gold-text">Luxury Grooming</span> Session</h1>
            <p class="booking-description">
                Reserve your appointment in a few seconds. Choose your service,
                preferred barber, and date for a premium grooming experience.
            </p>

            <div class="booking-features">
                <div class="feature-box">
                    <span class="feature-icon">✂</span>
                    <div>
                        <h4>Professional Service</h4>
                        <p>Modern cuts, beard styling, and coloring.</p>
                    </div>
                </div>

                <div class="feature-box">
                    <span class="feature-icon">⭐</span>
                    <div>
                        <h4>Top Rated Barbers</h4>
                        <p>Experienced stylists for premium care.</p>
                    </div>
                </div>

                <div class="feature-box">
                    <span class="feature-icon">🕒</span>
                    <div>
                        <h4>Easy Scheduling</h4>
                        <p>Fast booking with your preferred date.</p>
                    </div>
                </div>
            </div>

            <div class="appointment-preview">
                <p class="preview-top">PREMIUM EXPERIENCE</p>
                <h3>What You Get</h3>

                <div class="preview-item">
                    <span>Haircut / Beard / Color</span>
                    <strong>Available</strong>
                </div>

                <div class="preview-item">
                    <span>Experienced Barbers</span>
                    <strong>3 Experts</strong>
                </div>

                <div class="preview-item">
                    <span>Booking Time</span>
                    <strong>Fast</strong>
                </div>

                <div class="preview-item">
                    <span>Luxury Care</span>
                    <strong>Included</strong>
                </div>
            </div>
        </div>

        <div class="booking-right">
            <div class="booking-container">

                <div class="booking-summary">
                    <h3>Your Booking</h3>
                    <p>Service: <span id="summaryService">-</span></p>
                    <p>Barber: <span id="summaryBarber">-</span></p>
                    <p>Date: <span id="summaryDate">-</span></p>
                    <p>Time: <span id="summaryTime">-</span></p>
                    <p>Payment Method: <span id="summaryPaymentMethod">-</span></p>
                    <p>Payment Status: <span id="summaryPaymentStatus">Unpaid</span></p>
                    <p>
                        Price:
                        <span id="summaryPrice">
                            @php
                                $price = 0;
                                if (($selectedService ?? '') == 'Haircut') $price = 35;
                                elseif (($selectedService ?? '') == 'Beard Trim') $price = 25;
                                elseif (($selectedService ?? '') == 'Hair Coloring') $price = 50;
                            @endphp
                            ${{ $price }}
                        </span>
                    </p>
                </div>

                <p class="form-top-text">BOOK APPOINTMENT</p>
                <h2>Make a Reservation</h2>

                @if(session('success'))
                    <p class="success-message">{{ session('success') }}</p>
                @endif

                <form method="POST" action="{{ route('booking.store') }}">
                    @csrf

                    <div class="form-group">
                        <label>Your Name</label>
                        <input type="text" id="name" name="name" placeholder="Your Name" value="{{ old('name', $customerName ?? '') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Select Service</label>
                        <select id="service" name="service" required>
                            <option value="">Choose a service</option>
                            <option value="Haircut" {{ ($selectedService ?? '') == 'Haircut' ? 'selected' : '' }}>Haircut</option>
                            <option value="Beard Trim" {{ ($selectedService ?? '') == 'Beard Trim' ? 'selected' : '' }}>Beard Trim</option>
                            <option value="Hair Coloring" {{ ($selectedService ?? '') == 'Hair Coloring' ? 'selected' : '' }}>Hair Coloring</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Select Barber</label>
                        <select id="barber" name="barber" required>
                            <option value="">Choose a barber</option>
                            <option value="John Smith" {{ ($selectedBarber ?? '') == 'John Smith' ? 'selected' : '' }}>John Smith</option>
                            <option value="David Lee" {{ ($selectedBarber ?? '') == 'David Lee' ? 'selected' : '' }}>David Lee</option>
                            <option value="Michael Ray" {{ ($selectedBarber ?? '') == 'Michael Ray' ? 'selected' : '' }}>Michael Ray</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Select Date</label>
                        <input type="date" id="date" name="date" value="{{ $selectedDate ?? '' }}" required>
                    </div>

                    <div class="form-group">
                        <label>Select Time Slot</label>
                        <select id="time_slot" name="time_slot" required>
                            <option value="">Choose a time slot</option>

                            @php
                                $times = [
                                    "09:00 AM",
                                    "10:00 AM",
                                    "11:00 AM",
                                    "12:00 PM",
                                    "02:00 PM",
                                    "03:00 PM",
                                    "04:00 PM"
                                ];
                            @endphp

                            @foreach($times as $time)
                                <option value="{{ $time }}"
                                    {{ in_array($time, $bookedSlots ?? []) ? 'disabled' : '' }}>
                                    {{ $time }} {{ in_array($time, $bookedSlots ?? []) ? '(Booked)' : '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Payment Method</label>
                        <select id="payment_method" name="payment_method" required>
                            <option value="">Choose payment method</option>
                            <option value="Cash">Cash</option>
                            <option value="Card">Card</option>
                            <option value="Online Payment">Online Payment</option>
                        </select>
                    </div>

                    <button type="submit" class="booking-submit-btn">Confirm Booking</button>
                </form>
            </div>
        </div>

    </div>
</section>

<script>
    const service = document.getElementById('service');
    const barber = document.getElementById('barber');
    const date = document.getElementById('date');
    const timeSlot = document.getElementById('time_slot');
    const paymentMethod = document.getElementById('payment_method');

    const summaryService = document.getElementById('summaryService');
    const summaryBarber = document.getElementById('summaryBarber');
    const summaryDate = document.getElementById('summaryDate');
    const summaryTime = document.getElementById('summaryTime');
    const summaryPaymentMethod = document.getElementById('summaryPaymentMethod');
    const summaryPaymentStatus = document.getElementById('summaryPaymentStatus');
    const summaryPrice = document.getElementById('summaryPrice');

    const prices = {
        "Haircut": 35,
        "Beard Trim": 25,
        "Hair Coloring": 50
    };

    function updateSummary() {
        summaryService.textContent = service.value || '-';
        summaryBarber.textContent = barber.value || '-';
        summaryDate.textContent = date.value || '-';
        summaryTime.textContent = timeSlot.value || '-';
        summaryPaymentMethod.textContent = paymentMethod.value || '-';
        summaryPaymentStatus.textContent = 'Unpaid';
        summaryPrice.textContent = prices[service.value] ? '$' + prices[service.value] : '$0';
    }

    service.addEventListener('change', updateSummary);
    barber.addEventListener('change', updateSummary);
    date.addEventListener('change', updateSummary);
    timeSlot.addEventListener('change', updateSummary);
    paymentMethod.addEventListener('change', updateSummary);

    updateSummary();
</script>

<script>
const serviceSelect = document.querySelector('#service');
const barberSelect = document.querySelector('#barber');
const dateInput = document.querySelector('#date');

function reloadPage() {
    let service = serviceSelect.value;
    let barber = barberSelect.value;
    let date = dateInput.value;

    if (barber && date) {
        let url = `/booking?barber=${encodeURIComponent(barber)}&date=${date}`;

        if (service) {
            url += `&service=${encodeURIComponent(service)}`;
        }

        window.location.href = url;
    }
}

barberSelect.addEventListener('change', reloadPage);
dateInput.addEventListener('change', reloadPage);
</script>

@endsection