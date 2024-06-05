<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proyek;
use App\Models\UserPelatihan;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
use Storage;
use setasign\Fpdi\Fpdi;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['peserta'] = UserPelatihan::where('status_peserta','peserta')->get();
        // dd($data['peserta']);
        return view('admin.proyek', $data);
    }

    public function send($id)
    {
        $peserta = UserPelatihan::find($id);
        $namaPeserta = $peserta->user->nama;
        $pelatihanPeserta = $peserta->pelatihan->nama_pelatihan;

        // Path file PDF yang ada
        $originalPdfPath = storage_path('app/public/sertifikat/sertifikat-2.pdf');

        // Path untuk menyimpan PDF baru
        $newPdfPath = storage_path('app/public/sertifikat/' . $namaPeserta . '-' . $pelatihanPeserta . '.pdf');

        // Membuat instance FPDI
        $pdf = new FPDI();
        $pdf->AddPage();
        $pdf->setSourceFile($originalPdfPath);

        // Mengimport halaman pertama
        $templateId = $pdf->importPage(1);
        $pdf->useTemplate($templateId, 0, 0, 210, 297);

        // Menambahkan nama peserta dengan ukuran font yang lebih besar dan di tengah
        $pdf->SetFont('Times', 'B', 24); 
        $pdf->SetTextColor(158,134,51); 
        $text = $namaPeserta;
        $textWidth = $pdf->GetStringWidth($text);
        $pageWidth = $pdf->GetPageWidth();
        $x = ($pageWidth - $textWidth) / 2;
        $pdf->SetXY($x, 110); 
        $pdf->Write(0, $text);

        #9e8633
        // Menambahkan nama pelatihan dengan ukuran font yang lebih kecil dan di tengah
        $pdf->SetFont('Times', 'BI', 18); 
        $pdf->SetTextColor(158,134,51); 
        $text = $pelatihanPeserta;
        $textWidth = $pdf->GetStringWidth($text);
        $x = ($pageWidth - $textWidth) / 2;
        $pdf->SetXY($x, 140); 
        $pdf->Write(0, $text);

        // Menyimpan file PDF yang sudah dimodifikasi
        $pdf->Output($newPdfPath, 'F');

        $peserta->sertifikat = Storage::url('public/sertifikat/' . $namaPeserta . '-' . $pelatihanPeserta . '.pdf');
        $peserta->status_sertifikat = 'Sertifikat sudah dibuat';
        $peserta->save();

        return redirect()->route('proyek')->with('success', 'Sertifikat telah berhasil dibuat dan dikirim.');
    }

    public function pembayaran(Request $request, $id)
    {
        $data = UserPelatihan::find($id);

        $file = $request->file('bukti_pembayaran');
        $path = $file->store('public/bukti_pembayaran');

        $url = Storage::url($path);
        
        $data->bukti_pembayaran = $url;
        $data->status_bayar = 'Lunas';
        $data->save();

        return redirect()->back();
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
    public function show(Proyek $proyek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyek $proyek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyek $proyek)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyek $proyek)
    {
        //
    }
}
