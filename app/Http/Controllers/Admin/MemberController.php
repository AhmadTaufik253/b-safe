<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use App\Models\UserPelatihan;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $data['member'] = User::where('role','peserta')->where('status_peserta','peserta')->get();
        $data['member'] = UserPelatihan::where('status_peserta','peserta')->get();
        // dd($data['member']);
        return view('admin.member', $data);
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
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data = User::find($id);

        return view('admin.edit-member', compact('data'));
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
        $data->save();

        return redirect()->back();
    }

    public function riwayat($id){

        $peserta = UserPelatihan::where('user_id',$id)->where('status_peserta','peserta')->get();
       
        return view('admin.riwayat-member', compact('peserta'));
    }

    public function dokumen($id)
    {
        $data['peserta'] = User::find($id);
        
        $data['nama_peserta'] = $data['peserta']->nama;

        return view('admin.dokumen-member', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $data = UserPelatihan::find($id);
        $data->delete();

        return redirect()->back();
    }
}
