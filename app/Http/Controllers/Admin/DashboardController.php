<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pelatihan;
use App\Models\UserPelatihan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['calon'] = UserPelatihan::where('status_peserta','calon peserta')->get();

        $participants = UserPelatihan::selectRaw('COUNT(*) as count, MONTH(created_at) as month')
            ->where('status_peserta', 'peserta')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Menyiapkan data untuk chart
        $data['labels'] = $participants->pluck('month')->map(function ($month) {
            return Carbon::create()->month($month)->format('F');
        });

        $data['count'] = $participants->pluck('count');
        // dd($data['count']);

        return view('admin.dashboard', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $peserta = UserPelatihan::find($id);
        $peserta->status_peserta = "peserta";
        $peserta->save();
    
        return redirect()->back()->with('success','Berhasil Accept Peserta');

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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
