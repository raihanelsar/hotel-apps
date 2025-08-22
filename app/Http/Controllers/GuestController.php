<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Guest::orderBy('id', 'desc')->get();
        $title = 'Guest Information';
        return view('guests.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Input Tamu";
        $categories = Categories::orderBy('id', 'desc')->get();
        return view("guests.create", compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_tamu' => ['required'],
            'check_in' => ['required'],
            'check_out' => ['required'],
            'no_kamar' => ['required'],
            'email' => ['required', 'email', 'unique:guests'],
            'no_telp' => ['required', 'string', 'unique:guests'],
            'status_tamu' => ['required'],
            'alamat' => ['required'],
            'kebutuhan_khusus' => ['nullable'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        Guest::create($request->all());
        return redirect()->to("guests");
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
        $categories = Categories::all();
        return view('guests.edit', compact('categories'));
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
}
