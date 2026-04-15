@extends('layouts.app')

@section('content')

<section class="bookings-section">
    <div class="bookings-container">
        <h2>My Bookings</h2>

        @if(session('user'))
            <p style="margin-bottom: 20px; color:#aaa;">
                Showing bookings for
                <strong style="color:white;">{{ $name }}</strong>
            </p>

            <table class="bookings-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Service</th>
                        <th>Barber</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Price</th>
                        <th>Payment</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->service }}</td>
                            <td>{{ $booking->barber }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->date)->format('Y-m-d') }}</td>
                            <td>{{ $booking->time_slot }}</td>
                            <td>${{ $booking->price }}</td>
                            <td>{{ $booking->payment_status }}</td>
                            <td>
                                <span class="status-badge status-{{ strtolower($booking->status) }}">
                                    {{ $booking->status }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">No bookings found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        @else
            <p style="color:#aaa;">Please login to view your bookings.</p>
        @endif
    </div>
</section>

@endsection