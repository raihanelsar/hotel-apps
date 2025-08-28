<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservations;
use App\Models\Rooms;
use App\Models\Categories;
use Carbon\Carbon;


class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function createReservationNumber()
    {
        $code_format = 'RSV';
        $today = Carbon::now()->format('Ymd'); // akan menghasilkan format YYYMMDD
        $prefix = $code_format . "-" . $today . "-";
        $lastReservation = Reservations::whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->first(); //first akan mengambil data langung berbentuk {data}, sedangkat get akan mengambil semua data dan berbentuk array [{data}]

        if ($lastReservation) {
            $lastNumber = substr($lastReservation->reservation_number, -3); // akan mengambil 3 data/kata dari belakang dari $lastReservation (untuk mengambil id)
            // $lastNumber = $lastReservation->id; // atau gunakan line ini (untuk mengambil id)
            $newNumber = str_pad($lastNumber, 3, "0", STR_PAD_RIGHT); // akan
        } else {
            $newNumber = "001";
        }

        $reservation_number = $prefix . $newNumber;

        return $reservation_number;
    }

    public function index()
    {
        $datas = Reservations::with('room')->orderBy('id', 'desc')->get();
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
        $reservation_number = $this->createReservationNumber();
        return view('reservation.create', compact('title', 'categories', 'reservation_number'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reservation_number = "RSV-270893-001";

        // Validasi data dari form
        // $data = $request->validate([
        //     'room_id'            => 'required',
        //     'reservation_number' => 'required',
        //     'guest_name'         => 'required|string|max:255',
        //     'guest_email'        => 'required|email',
        //     'guest_phone'        => 'required|string|max:15',
        //     'guest_note'         => 'nullable|string',
        //     'guest_room_number'  => 'required|integer',
        //     'guest_check_in'     => 'required|date',
        //     'guest_check_out'    => 'required|date|after_or_equal:guest_check_in',
        //     'payment_method'     => 'required',
        //     'tax'                => 'nullable',
        // ]);

        try {
            $data = [
                'reservation_number' => $request->reservation_number,
                'guest_name' => $request->guest_name,
                'guest_email' => $request->guest_email,
                'guest_phone' => $request->guest_phone,
                'guest_note' => $request->guest_note,
                'guest_room_number' => $request->guest_room_number,
                'guest_check_in' => $request->guest_check_in,
                'guest_check_out' => $request->guest_check_out,
                'payment_method' => $request->payment_method,
                'room_id' => $request->room_id,
                'subtotal' => $request->subtotal,
                'totalAmount' =>  $request->totalAmount,
                'tax'      => $request->tax,
                'nights'    => $request->nights,
                'roomRate'  => $request->roomRate,
                'isReserve' => 1,
            ];


            // Simpan reservasi
            $create = Reservations::create($data);

            return response()->json(['status' => 'success', 'message' => 'Reservation success', 'data' => $create], 201);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'success', 'message' => $th->getMessage()], 500);
        }
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
