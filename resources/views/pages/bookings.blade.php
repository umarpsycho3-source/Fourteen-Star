@extends('layouts.app')

@section('content')

<section class="bookings-section">
    <div class="bookings-container">
        <h2>All Bookings</h2>

        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <form method="GET" class="search-form">
            <input type="text" name="name" placeholder="Search by name" value="{{ request('name') }}">

            <select name="service">
                <option value="">All Services</option>
                <option value="Haircut" {{ request('service') == 'Haircut' ? 'selected' : '' }}>Haircut</option>
                <option value="Beard Trim" {{ request('service') == 'Beard Trim' ? 'selected' : '' }}>Beard Trim</option>
                <option value="Hair Coloring" {{ request('service') == 'Hair Coloring' ? 'selected' : '' }}>Hair Coloring</option>
            </select>

            <select name="barber">
                <option value="">All Barbers</option>
                <option value="John Smith" {{ request('barber') == 'John Smith' ? 'selected' : '' }}>John Smith</option>
                <option value="David Lee" {{ request('barber') == 'David Lee' ? 'selected' : '' }}>David Lee</option>
                <option value="Michael Ray" {{ request('barber') == 'Michael Ray' ? 'selected' : '' }}>Michael Ray</option>
            </select>

            <select name="status">
                <option value="">All Status</option>
                <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Confirmed" {{ request('status') == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>

            <button type="submit" class="btn-primary">Search</button>
            <a href="{{ route('bookings.list') }}" class="btn-outline">Reset</a>
        </form>

        <table class="bookings-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Service</th>
                    <th>Barber</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Price</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Action</th>
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
                        <td>{{ $booking->time_slot }}</td>
                        <td>${{ $booking->price }}</td>
                        <td>{{ $booking->payment_status }}</td>
                        <td>
                            <span class="status-badge status-{{ strtolower($booking->status) }}">
                                {{ $booking->status }}
                            </span>
                        </td>
                        <td class="action-buttons">
                            @if($booking->status !== 'Completed')
                                <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="name" value="{{ $booking->name }}">
                                    <input type="hidden" name="service" value="{{ $booking->service }}">
                                    <input type="hidden" name="barber" value="{{ $booking->barber }}">
                                    <input type="hidden" name="date" value="{{ $booking->date }}">
                                    <input type="hidden" name="time_slot" value="{{ $booking->time_slot }}">
                                    <input type="hidden" name="price" value="{{ $booking->price }}">
                                    <input type="hidden" name="payment_method" value="{{ $booking->payment_method }}">
                                    <input type="hidden" name="payment_status" value="{{ $booking->payment_status }}">
                                    <input type="hidden" name="status" value="Completed">

                                    <button type="submit" class="complete-btn">Complete</button>
                                </form>
                            @else
                                <span class="completed-label">Done</span>
                            @endif

                            <a href="{{ route('bookings.edit', $booking->id) }}" class="edit-btn">Edit</a>

                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10">No bookings found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>

@endsection