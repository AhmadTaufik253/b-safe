@extends('admin.layouts.layout')
@section('menuMember','active')
@section('content')
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Edit Peserta</h4>
					</div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form action="{{ route('member-update', $data->id) }}" method="POST" >
                                    @csrf
                                    @method('PUT')
                                    <div class="card-header">
                                        <h4 class="card-title">Edit Data Peserta</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama" id="nama" value="{{ $data->nama }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email2">No Telepon</label>
                                            <input type="number" class="form-control" name="no_telepon" id="" value="{{ $data->no_telepon }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" name="email" id="" value="{{ $data->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat Lengkap</label>
                                            <input type="text" class="form-control" name="alamat" id="" value="{{ $data->alamat }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">No KTP</label>
                                            <input type="number" class="form-control" name="no_ktp" id="" value="{{ $data->no_ktp }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Jenis Kelamin</label>
                                            <select class="form-control" name="jenis_kelamin" id="">
                                                <option hidden>-- Pilih Jenis Kelamin --</option>
                                                <option value="laki-laki" {{ $data->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                <option value="perempuan" {{ $data->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Golongan Darah</label>
                                            <input type="text" class="form-control" name="golongan_darah" id="" value="{{ $data->golongan_darah }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tempat Lahir</label>
                                            <input type="text" class="form-control" name="tempat_lahir" id="" value="{{ $data->tempat_lahir }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tempat Lahir</label>
                                            <input type="date" class="form-control" name="tanggal_lahir" id="" value="{{ $data->tanggal_lahir }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Agama</label>
                                            <input type="text" class="form-control" name="agama" id="" value="{{ $data->agama }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Provinsi Domisili</label>
                                            <input type="text" class="form-control" name="provinsi" id="" value="{{ $data->provinsi }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kota Domisili</label>
                                            <input type="text" class="form-control" name="kota" id="" value="{{ $data->kota }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Pendidikan Terakhir</label>
                                            <input type="text" class="form-control" name="pendidikan_terakhir" id="" value="{{ $data->pendidikan_terakhir }}">
                                        </div>
                                        <div class="form-check">
                                            <label>Tipe Pendaftaran</label><br/>
                                            <label class="form-radio-label">
                                                <input class="form-radio-input" type="radio" name="tipe_pendaftaran" value="reguler" 
                                                @if($data->tipe_pendaftaran == 'reguler') checked @endif  >
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
	