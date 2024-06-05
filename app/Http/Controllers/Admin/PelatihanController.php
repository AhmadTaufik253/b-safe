<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelatihan;
use App\Models\User;
use App\Models\UserPelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    //     $data['pelatihan'] = Pelatihan::all();

    //     // Menghitung jumlah peserta untuk setiap pelatihan
    //     foreach ($data['pelatihan'] as $p) {
    //         $jumlahPeserta = User::where('pelatihan_id', $p->id)
    //                             ->where('status_peserta', 'peserta')
    //                             ->count();
    //         $p->jumlah_peserta = $jumlahPeserta;

    //         $jumlahCalonPeserta = User::where('pelatihan_id', $p->id)
    //                             ->where('status_peserta', 'calon peserta')
    //                             ->count();
    //         $p->jumlah_calon_peserta = $jumlahCalonPeserta;
    //     }

    //     // Mengambil data peserta yang dikelompokkan berdasarkan bulan
    //     $participants = User::selectRaw('COUNT(*) as count, MONTH(created_at) as month')
    //         ->groupBy('month')
    //         ->get();

    //     $data['labels'] = $participants->pluck('month')->map(function ($month) {
    //         return Carbon::create()->month($month)->format('F');
    //     });

    //     $data['count'] = $participants->pluck('count');
        
    //     // dd($data['count']);

    //     return view('admin.pelatihan', $data);
    // }

    public function index()
    {
        $data['pelatihan'] = Pelatihan::leftJoin('user_pelatihan as peserta', function($join) {
            $join->on('pelatihans.id', '=', 'peserta.pelatihan_id')
                 ->where('peserta.status_peserta', 'peserta');
        })->leftJoin('user_pelatihan as calon', function($join) {
            $join->on('pelatihans.id', '=', 'calon.pelatihan_id')
                 ->where('calon.status_peserta', 'calon peserta');
        })->select(
            'pelatihans.id',
            'pelatihans.nama_pelatihan',
            'pelatihans.harga',
            'pelatihans.cover',
            DB::raw('COUNT(DISTINCT peserta.id) as jumlah_peserta'),
            DB::raw('COUNT(DISTINCT calon.id) as jumlah_calon_peserta')
        )->groupBy(
            'pelatihans.id',
            'pelatihans.nama_pelatihan',
            'pelatihans.harga',
            'pelatihans.cover'
        )->get();

        return view('admin.pelatihan', $data);
    }

    public function peserta($id)
    {
        $data['peserta'] = UserPelatihan::where('status_peserta','peserta')->where('pelatihan_id',$id)->get();

        $pelatihan = Pelatihan::find($id);
        $data['nama_pelatihan'] = $pelatihan->nama_pelatihan;

        return view('admin.pelatihan-peserta', $data);
    }
    public function calon($id)
    { 
        $data['calon_peserta'] = UserPelatihan::where('status_peserta','calon peserta')->where('pelatihan_id',$id)->get();

        $pelatihan = Pelatihan::find($id);
        $data['nama_pelatihan'] = $pelatihan->nama_pelatihan;

        return view('admin.pelatihan-calon', $data);
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

        return redirect()->back();
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
    public function update(Request $request, $id)
    {
        $pelatihan = Pelatihan::findOrFail($id);

        $pelatihan->nama_pelatihan = $request->nama_pelatihan;
        $pelatihan->harga = $request->harga;

        if ($request->hasFile('cover')) {
            if ($pelatihan->cover && file_exists(public_path('cover_pelatihan/' . $pelatihan->cover))) {
                unlink(public_path('cover_pelatihan/' . $pelatihan->cover));
            }
            $request->file('cover')->move(public_path('cover_pelatihan'), $request->file('cover')->getClientOriginalName());
            $pelatihan->cover = $request->file('cover')->getClientOriginalName();
        }
        $pelatihan->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $data = Pelatihan::find($id);
        $data->delete();

        return redirect()->back();

    }
}