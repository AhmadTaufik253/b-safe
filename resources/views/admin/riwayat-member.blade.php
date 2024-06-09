@extends('admin.layouts.layout')
@section('menuMember','active')
@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Member</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Peserta</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Nama Peserta</th>
                                            <th>Nama Pelatihan</th>
                                            <th>Sertifikat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($peserta as $pelatihan)
                                        <tr>
                                            <td>{{ $pelatihan->user->nama }}</td>
                                            <td>{{ $pelatihan->pelatihan->nama_pelatihan }}</td>
                                            <td>
                                                @if($pelatihan->sertifikat != null)
                                                    <a href="{{ asset($pelatihan->sertifikat) }}" target="_blank" class="btn btn-primary btn-sm">Detail</a>
                                                @else
                                                    Sertifikat Belum Dibuat
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
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