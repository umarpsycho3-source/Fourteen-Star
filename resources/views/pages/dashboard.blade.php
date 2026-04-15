@extends('layouts.app')

@section('content')

<section class="dashboard-section">
    <div class="dashboard-container">
        <h2>Admin Dashboard</h2>

        <div class="dashboard-cards">
            <div class="dashboard-card">
                <h3>Total Bookings</h3>
                <p>{{ $totalBookings }}</p>
            </div>

            <div class="dashboard-card">
                <h3>Today's Bookings</h3>
                <p>{{ $todayBookings }}</p>
            </div>

            <div class="dashboard-card">
                <h3>Today's Appointments</h3>
                <p>{{ $todayAppointments }}</p>
            </div>

            <div class="dashboard-card">
                <h3>Total Revenue</h3>
                <p>${{ $totalRevenue }}</p>
            </div>

            <div class="dashboard-card">
                <h3>Pending</h3>
                <p>{{ $pendingBookings }}</p>
            </div>

            <div class="dashboard-card">
                <h3>Completed</h3>
                <p>{{ $completedBookings }}</p>
            </div>
        </div>

        <div class="recent-bookings-box">
            <h3>Recent Bookings</h3>

            <table class="bookings-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Service</th>
                        <th>Barber</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->name }}</td>
                            <td>{{ $booking->service }}</td>
                            <td>{{ $booking->barber }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->date)->format('Y-m-d') }}</td>
                            <td>
                                <span class="status-badge status-{{ strtolower($booking->status) }}">
                                    {{ $booking->status }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No recent bookings found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection