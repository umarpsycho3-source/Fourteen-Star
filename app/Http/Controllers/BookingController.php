<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function dashboard()
    {
        $bookings = Booking::latest()->take(5)->get();

        $totalBookings = Booking::count();

        $today = now()->format('Y-m-d');

        // Bookings created today (real-time)
        $todayBookings = Booking::where('created_at', 'like', $today . '%')->count();

        // Appointments scheduled for today
        $todayAppointments = Booking::where('date', 'like', $today . '%')->count();

        $pendingBookings = Booking::where('status', 'Pending')->count();
        $completedBookings = Booking::where('status', 'Completed')->count();

        $prices = [
            'Haircut' => 35,
            'Beard Trim' => 25,
            'Hair Coloring' => 50,
        ];

        $totalRevenue = Booking::get()->sum(function ($booking) use ($prices) {
            return $prices[$booking->service] ?? 0;
        });

        return view('pages.dashboard', compact(
            'bookings',
            'totalBookings',
            'todayBookings',
            'todayAppointments',
            'pendingBookings',
            'completedBookings',
            'totalRevenue'
        ));
    }

    public function index(Request $request)
{
    $selectedService = $request->query('service');
    $selectedBarber = $request->query('barber');
    $selectedDate = $request->query('date');

    $user = session('user');
    $customerName = $user['name'] ?? '';

    $bookedSlots = [];

    if ($selectedBarber && $selectedDate) {
        $bookedSlots = Booking::where('barber', $selectedBarber)
            ->whereDate('date', $selectedDate)
            ->pluck('time_slot')
            ->toArray();
    }

    return view('pages.booking', compact(
        'selectedService',
        'selectedBarber',
        'selectedDate',
        'bookedSlots',
        'customerName'
    ));
}

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'service' => 'required|string|max:255',
        'barber' => 'required|string|max:255',
        'date' => 'required|date',
        'time_slot' => 'required|string|max:255',
        'payment_method' => 'required|string|max:255',
    ]);

    $exists = Booking::where('barber', $request->barber)
        ->whereDate('date', $request->date)
        ->where('time_slot', $request->time_slot)
        ->exists();

    if ($exists) {
        return back()->with('success', '❌ This time slot is already booked!');
    }

    $prices = [
        'Haircut' => 35,
        'Beard Trim' => 25,
        'Hair Coloring' => 50,
    ];

    $user = session('user');

    Booking::create([
        'user_id' => $user['id'] ?? null,
        'name' => $request->name,
        'service' => $request->service,
        'barber' => $request->barber,
        'date' => $request->date,
        'time_slot' => $request->time_slot,
        'price' => $prices[$request->service] ?? 0,
        'payment_method' => $request->payment_method,
        'payment_status' => 'Unpaid',
        'status' => 'Pending',
    ]);

    return back()->with('success', '✅ Booking Confirmed!');
}

    public function list(Request $request)
    {
        $query = Booking::query();

        if ($request->name) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->service) {
            $query->where('service', $request->service);
        }

        if ($request->barber) {
            $query->where('barber', $request->barber);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $bookings = $query->latest()->get();

        return view('pages.bookings', compact('bookings'));
    }

    public function myBookings(Request $request)
{
    $user = session('user');
    $bookings = collect();
    $name = '';

    if ($user) {
        $name = $user['name'];
        $bookings = Booking::where('user_id', $user['id'])->latest()->get();
    }

    return view('pages.my-bookings', compact('bookings', 'name'));
}

    public function edit(Booking $booking)
    {
        return view('pages.edit-booking', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'barber' => 'required|string|max:255',
            'date' => 'required|date',
            'time_slot' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $booking->update([
            'name' => $request->name,
            'service' => $request->service,
            'barber' => $request->barber,
            'date' => $request->date,
            'time_slot' => $request->time_slot,
            'status' => $request->status,
        ]);

        return redirect()->route('bookings.list')->with('success', 'Booking updated successfully!');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.list')->with('success', 'Booking deleted successfully!');
    }
}