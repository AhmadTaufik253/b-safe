<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pelatihan;
use App\Models\UserPelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['pelatihan'] = Pelatihan::all();

        return view('peserta.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    // Jika pengguna belum ada, buat pengguna baru dan tambahkan pelatihan ke tabel pivot
            // $data['user'] = User::create([
            //     'nama' => $request->nama,
            //     'no_telepon' => $request->no_telepon,
            //     'email' => $request->email,
            //     'status_peserta' => 'calon peserta',
            //     'role' => 'peserta',
            //     'password' => Hash::make('peserta123')
            // ]);

            // // Hubungkan data['user'] baru dengan pelatihan yang dipilih
            // $data['user']->pelatihans()->attach($request->pelatihan);

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            $existingPivot = UserPelatihan::where('user_id', $user->id)
                                          ->where('pelatihan_id', $request->pelatihan)
                                          ->first();

            if (!$existingPivot) {
                UserPelatihan::create([
                    'user_id' => $user->id,
                    'pelatihan_id' => $request->pelatihan,
                    'status_peserta' => 'calon peserta',
                ]);
            } else {
                return redirect()->back()->withErrors(['msg' => 'Pelatihan sudah ditambahkan untuk pengguna ini.']);
            }
        } else {
            $user = User::create([
                'nama' => $request->nama,
                'no_telepon' => $request->no_telepon,
                'email' => $request->email,
                'role' => 'peserta',
                'password' => Hash::make('peserta123'),
            ]);

            UserPelatihan::create([
                'user_id' => $user->id,
                'pelatihan_id' => $request->pelatihan,
                'status_peserta' => 'calon peserta',
            ]);
        }
         // Load the pelatihan relationship
        // $user->load('pelatihans');
        // Load the latest pelatihan relationship
        $latestPelatihan = $user->pelatihans()->latest()->first();

        return view('peserta.berhasil-daftar', compact('user','latestPelatihan'));
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
}
