<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelatihan;
use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['pelatihan'] = Pelatihan::all();

        return view('admin.pelatihan', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = Pelatihan::create($request->all());
        if ($request->hasFile('cover')) {
            $request->file('cover')->move('cover_pelatihan/', $request->file('cover')->getClientOriginalName());
            $data->cover = $request->file('cover')->getClientOriginalName();
            $data->save();
        }

        return redirect()->back();;
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelatihan $pelatihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelatihan $pelatihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelatihan $pelatihan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelatihan $pelatihan)
    {
        //
    }
}