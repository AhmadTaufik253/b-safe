<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/css/style.css">
  </head>
  <body>
    
    <div class="container">
      <div class="row mt-4">
        <div class="col-12 text-center">
          <img src="asset/img/logo.jpg" height="140" height="" width="" alt="logo">
        </div>
      </div>
      <div class="row mt-4 mb-4">
        <div class="col-12">
          <div class="card custom-card">
            <div class="card-body">
              <div class="judul text-center mb-4">
                <h5 class="card-title">Registrasi Pelatihan B-Safe 2024</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Think Safe, Act Safe, Be Safe</h6>
              </div>
              <div class="isi ms-4 me-4">
                <form action="{{ route('register-store') }}" method="POST">
                    @csrf
                  <div class="mb-3">
                    <label for="nama_peserta" class="form-label">Nama Peserta</label>
                    <input type="text" name="nama" class="form-control" id="nama_peserta" required>
                  </div>
                  <div class="mb-3">
                    <label for="no_whatsapp" class="form-label">No Whatsapp</label>
                    <input type="number" name="no_telepon" class="form-control" id="no_whatsapp" required>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label" aria-describedby="pelatihan">Pilih Pelatihan</label>
                    <select class="form-select" >
                      <option hidden>-- Silahkan Pilih Pelatihan -- </option>
                      <option value=""></option>
                    </select>
                    <div id="pelatihan" class="form-text text-danger">*Pastikan dan cek kembali nama pelatihan dan tanggal pelatihan yang anda akan ikuti</div>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Bundling Pelatihan</label>
                    <select class="form-select">
                      <option hidden>-- Silahkan Pilih Bundling Pelatihan -- </option>
                      <option value=""></option>
                    </select>
                  </div>
                  <div class="row mt-4">
                    <div class="col-12 text-end">
                      <button type="submit" class="btn btn-primary">Daftar Pelatihan</button>
                      {{-- <a href="/berhasil" class="btn btn-primary">Daftar Pelatihan</a> --}}
                    </div>
                  </div>
                </form>
              </div>
              <div class="footer mt-4">
                <div class="row">
                  <div class="col-6">
                    <h6>PT. BINA SELAMAT VERITAS</h6>
                    <P>Graha Rimah Hobi, <br> Jl. Kemang 1 No.11 Lantai 4 Bang Jakarta Selatan
                    </P>
                  </div>
                  <div class="col-6 d-flex justify-content-end">
                    <div class="ps-1" style="width: 35%;">
                      <h6>(021) 22718846 (office)</h6>
                      <h6>081212142606 (Fast Respone)</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>