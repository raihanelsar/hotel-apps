<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Rooms;
use App\Models\Categories;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Rooms::with('category')->orderBy('id', 'desc')->get();
        $title = "Data Kamar";
        return view('rooms.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::get();
        $title = "Tambah Kamar";
        return view('rooms.create', compact('categories', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'facility' => $request->facility,
            'price' => $request->price,
            'description' => $request->description,
        ];
        if ($request->hasFile('image_cover')) {
            $data['image_cover'] = $request->file('image_cover')->store('rooms', 'public');
        }
        Rooms::create($data);
        return redirect()->to('rooms');
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
        $edit = Rooms::find($id);
        $categories = Categories::get();
        $title = "Ubah data kamar";
        return view('rooms.edit', compact('edit', 'title', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'facility' => $request->facility,
            'price' => $request->price,
            'description' => $request->description,
        ];

        $rooms = Rooms::find($id);

        if ($request->hasFile('image_cover')) {
            if ($rooms->image_cover && Storage::disk('public')->exists($rooms->image_cover)) {
                Storage::disk('public')->delete($rooms->image_cover);
            }
            $data['image_cover'] = $request->file('image_cover')->store('rooms', 'public');
        }
        $rooms->update($data);
        return redirect()->to('rooms');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rooms = Rooms::find($id);
        if ($rooms->image_cover && Storage::disk('public')->exists($rooms->image_cover)) {
            Storage::disk('public')->delete($rooms->image_cover);
        }

        $rooms->delete();
        return redirect()->to('rooms');
    }
}
