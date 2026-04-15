@extends('layouts.app')

@section('content')

<section class="booking-page">
    <div class="booking-wrapper">
        <div class="booking-left">
            <p class="booking-small-title">UPDATE APPOINTMENT</p>
            <h1>Edit <span class="gold-text">Booking</span></h1>
            <p class="booking-description">
                Update the booking details below and save the changes.
            </p>
        </div>

        <div class="booking-right">
            <div class="booking-container">
                <p class="form-top-text">EDIT BOOKING</p>
                <h2>Update Reservation</h2>

                @if ($errors->any())
                    <div class="success-message">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('bookings.update', $booking->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Your Name</label>
                        <input type="text" name="name" value="{{ old('name', $booking->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label>Select Service</label>
                        <select name="service" required>
                            <option value="Haircut" {{ old('service', $booking->service) == 'Haircut' ? 'selected' : '' }}>Haircut</option>
                            <option value="Beard Trim" {{ old('service', $booking->service) == 'Beard Trim' ? 'selected' : '' }}>Beard Trim</option>
                            <option value="Hair Coloring" {{ old('service', $booking->service) == 'Hair Coloring' ? 'selected' : '' }}>Hair Coloring</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Select Barber</label>
                        <select name="barber" required>
                            <option value="John Smith" {{ old('barber', $booking->barber) == 'John Smith' ? 'selected' : '' }}>John Smith</option>
                            <option value="David Lee" {{ old('barber', $booking->barber) == 'David Lee' ? 'selected' : '' }}>David Lee</option>
                            <option value="Michael Ray" {{ old('barber', $booking->barber) == 'Michael Ray' ? 'selected' : '' }}>Michael Ray</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Select Date</label>
                        <input type="date" name="date" value="{{ old('date', $booking->date) }}" required>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" required>
                            <option value="Pending" {{ old('status', $booking->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Confirmed" {{ old('status', $booking->status) == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="Completed" {{ old('status', $booking->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>

                    <button type="submit" class="booking-submit-btn">Update Booking</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection