<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservations;
use App\Models\Rooms;
use App\Models\Categories;


class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Reservations::orderBy('id', 'desc')->get();
        $title = "Data Reservasi";
        return view('reservation.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::get();
        $title = "Data Reservasi";
        return view('reservation.create', compact('categories', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data dari form
        $data = $request->validate([
            'room_id'           => 'required',
            'reservation_number' => 'required',
            'guest_name'        => 'required|string|max:255',
            'guest_email'       => 'required|email',
            'guest_phone'       => 'required|string|max:15',
            'guest_note'        => 'nullable|string',
            'guest_room_number' => 'required|integer',
            'guest_check_in'    => 'required|date',
            'guest_check_out'   => 'required|date|after_or_equal:guest_check_in',
            'payment_method'    => 'required',
        ]);

        // Ambil harga kamar
        $room = Rooms::findOrFail($request->room_id);

        // Hitung jumlah malam
        $checkIn  = new \DateTime($request->guest_check_in);
        $checkOut = new \DateTime($request->guest_check_out);
        $days = $checkIn->diff($checkOut)->days;

        // Hitung subtotal
        $subtotal = $room->price * $days;

        $totalAmount = $subtotal;

        // Simpan reservasi
        Reservations::create([
            $data,
            'subtotal' => $subtotal,
            'totalAmount' => $totalAmount,
        ]);

        return redirect()->route('reservation.index')->with('success', 'Reservasi berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getRoomByCategory($id_category)
    {
        try {
            $rooms = Rooms::where('category_id', $id_category)->get();
            return response()->json(['data' => $rooms, 'message' => 'Fetch Success']);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Errrorrrr', 'error' => $th->getMessage()]);
        }
    }
}
