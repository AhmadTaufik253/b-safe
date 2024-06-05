@extends('admin.layouts.layout')
@section('menuMember','active')
@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Dokumen</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Dokumen Peserta {{ $nama_peserta }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="col-6">Nama Dokumen</th>
                                            <th class="col-6">Tautan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="col-6">KTP</td>
                                            <td class="col-6">
                                                @if($peserta->ktp != null)
                                                    <a href="{{ asset('storage/' . $peserta->ktp) }}" target="_blank">Tampilkan KTP</a>
                                                @else
                                                    data belum diupload
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-6">CV</td>
                                            <td class="col-6">
                                                @if($peserta->cv != null)
                                                    <a href="{{ asset('storage/' . $peserta->cv) }}" target="_blank">Tampilkan CV</a>
                                                @else
                                                    data belum diupload
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-6">Foto Background Merah</td>
                                            <td class="col-6">
                                                @if($peserta->foto_background_merah != null)
                                                    <a href="{{ asset('storage/' . $peserta->foto_background_merah) }}" target="_blank">Tampilkan Foto Background Merah</a>
                                                @else
                                                    data belum diupload
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-6">Surat Keterangan Kerja</td>
                                            <td class="col-6">
                                                @if($peserta->surat_keterangan_bekerja != null)
                                                    <a href="{{ asset('storage/' . $peserta->surat_keterangan_bekerja) }}" target="_blank">Tampilkan Surat Keterangan Kerja</a>
                                                @else
                                                    data belum diupload
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-6">Scan Ijazah Terakhir</td>
                                            <td class="col-6">
                                                @if($peserta->scan_ijazah_terakhir != null)
                                                    <a href="{{ asset('storage/' . $peserta->scan_ijazah_terakhir) }}" target="_blank">Tampilkan Scan Ijazah Terakhir</a>
                                                @else
                                                    data belum diupload
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-6">Foto Tanda Tangan</td>
                                            <td class="col-6">
                                                @if($peserta->foto_tanda_tangan != null)
                                                    <a href="{{ asset('storage/' . $peserta->foto_tanda_tangan) }}" target="_blank">Tampilkan Foto Tanda Tangan</a>
                                                @else
                                                    data belum diupload
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection