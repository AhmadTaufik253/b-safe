@extends('peserta.layouts.layout')
@section('menuDataDiri','active')
@section('content')
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Biodata Diri</h4>
					</div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form action="{{ route('update-data-diri', $user->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-header">
                                        <h4 class="card-title">Biodata Diri</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama" id="nama" value="{{ $user->nama }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email2">No Telepon</label>
                                            <input type="number" class="form-control" name="no_telepon" id="" value="{{ $user->no_telepon }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" name="email" id="" value="{{ $user->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat Lengkap</label>
                                            <input type="text" class="form-control" name="alamat" id="" value="{{ $user->alamat }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">No KTP</label>
                                            <input type="number" class="form-control" name="no_ktp" id="" value="{{ $user->no_ktp }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Jenis Kelamin</label>
                                            <select class="form-control" name="jenis_kelamin" id="">
                                                <option hidden value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="laki-laki" {{ $user->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                <option value="perempuan" {{ $user->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Golongan Darah</label>
                                            <input type="text" class="form-control" name="golongan_darah" id="" value="{{ $user->golongan_darah }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tempat Lahir</label>
                                            <select class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                                                <option value="" hidden>-- Pilih Tempat Lahir --</option>
                                                @foreach($tempat_lahir as $row)
                                                <option value="{{ $row->name }}" {{ $user->tempat_lahir == $row->name ? 'selected' : '' }}>{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tempat Lahir</label>
                                            <input type="date" class="form-control" name="tanggal_lahir" id="" value="{{ $user->tanggal_lahir }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Agama</label>
                                            <select class="form-control" id="agama" name="agama" required>
                                                <option value="" hidden>-- Pilih Agama --</option>
                                                <option value="Islam" {{ $user->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                <option value="Kristen" {{ $user->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                                <option value="Katolik" {{ $user->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                                <option value="Hindu" {{ $user->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                <option value="Buddha" {{ $user->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                                <option value="Konghucu" {{ $user->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Provinsi Domisili</label>
                                            <select class="form-control" id="provinsi" name="provinsi" required>
                                                <option value="" hidden>-- Pilih Provinsi --</option>
                                                @foreach($provinsi as $row)
                                                <option value="{{ $row->name }}" {{ $user->provinsi == $row->name ? 'selected' : '' }}>{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kota Domisili</label>
                                            <input type="text" class="form-control" name="kota" id="" value="{{ $user->kota }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                                            <select class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir" required>
                                                <option value="" hidden>-- Pilih Pendidikan Terakhir --</option>
                                                <option value="SD" {{ $user->pendidikan_terakhir == 'SD' ? 'selected' : '' }}>SD</option>
                                                <option value="SMP" {{ $user->pendidikan_terakhir == 'SMP' ? 'selected' : '' }}>SMP</option>
                                                <option value="SMA/SMK" {{ $user->pendidikan_terakhir == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                                                <option value="D1" {{ $user->pendidikan_terakhir == 'D1' ? 'selected' : '' }}>D1</option>
                                                <option value="D2" {{ $user->pendidikan_terakhir == 'D2' ? 'selected' : '' }}>D2</option>
                                                <option value="D3" {{ $user->pendidikan_terakhir == 'D3' ? 'selected' : '' }}>D3</option>
                                                <option value="S1" {{ $user->pendidikan_terakhir == 'S1' ? 'selected' : '' }}>S1</option>
                                                <option value="S2" {{ $user->pendidikan_terakhir == 'S2' ? 'selected' : '' }}>S2</option>
                                                <option value="S3" {{ $user->pendidikan_terakhir == 'S3' ? 'selected' : '' }}>S3</option>
                                            </select>
                                        </div>
                                        <div class="form-check">
                                            <label>Tipe Pendaftaran</label><br/>
                                            <label class="form-radio-label">
                                                <input class="form-radio-input" type="radio" name="tipe_pendaftaran" value="reguler" 
                                                @if($user->tipe_pendaftaran == 'reguler') checked @endif  >
                                                <span class="form-radio-sign">Reguler/Mandiri</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <h4 class="card-title">Dokumen Upload</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-md-8">
                                                <p>KTP</p>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <input type="file" name="ktp" class="form-control-file">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-8">
                                                <p>CV</p>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <input type="file" name="cv" class="form-control-file">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-8">
                                                <p>Foto Background Merah</p>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <input type="file" name="foto_background_merah" class="form-control-file">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-8">
                                                <p>Surat Keterangan Bekerja (Jika Ada)</p>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <input type="file" name="surat_keterangan_bekerja" class="form-control-file">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-8">
                                                <p>Scan Ijazah Terakhir</p>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <input type="file" name="scan_ijazah_terakhir" class="form-control-file">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-8">
                                                <p>Foto Tanda Tangan</p>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <input type="file" name="foto_tanda_tangan" class="form-control-file">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-text text-danger font-italic">*Catatan <br> Upload File maksimal 1mb , Format file JPG, PNG, PDF</div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-12 text-right">
                                                <button type="submit" class="btn btn-success btn-lg">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
@endsection
	