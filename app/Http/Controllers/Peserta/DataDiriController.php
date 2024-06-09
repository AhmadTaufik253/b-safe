<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Regency;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DataDiriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['user'] = Auth::user();
        $data['tempat_lahir'] = Regency::all();
        $data['provinsi'] = Province::all();

        return view('peserta.data-diri', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $data = User::find($id);

        $data->nama = $request->nama;
        $data->no_telepon = $request->no_telepon;
        $data->email = $request->email;
        $data->alamat = $request->alamat;
        $data->no_ktp = $request->no_ktp;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->golongan_darah = $request->golongan_darah;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->agama = $request->agama;
        $data->provinsi = $request->provinsi;
        $data->kota = $request->kota;
        $data->pendidikan_terakhir = $request->pendidikan_terakhir;
        $data->tipe_pendaftaran = $request->tipe_pendaftaran;

        $dokumenFields = ['ktp', 'cv', 'foto_background_merah', 'surat_keterangan_bekerja', 'scan_ijazah_terakhir', 'foto_tanda_tangan'];
        foreach ($dokumenFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $path = $file->store('dokumen', 'public');
                
                // Hapus file lama jika ada dan update path baru ke dalam database
                if ($data->$field) {
                    Storage::delete($data->$field);
                }
                $data->$field = $path;
            }
        }
        $data->save();

        return redirect()->back()->with('success','Berhasil Update Data Diri');;
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
