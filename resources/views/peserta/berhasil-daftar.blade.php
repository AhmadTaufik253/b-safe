<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="asset/css/style.css" />
  </head>
  <body>
    <div class="container">
      <div class="row mb-4 mt-4">
        <div class="col-12 text-center">
          <img src="asset/img/logo-2.png" height="140" width="" alt="logo" />
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-12 text-center">
          <h5 class="card-title">Registrasi Pelatihan B-Safe 2024</h5>
          <h6 class="card-subtitle mb-2 text-body-secondary mt-3">Think Safe, Act Safe, Be Safe</h6>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-6 mx-auto">
          <div class="card custom-card">
            <div class="card-body">
              <div class="isi ms-4 me-4">
                <p class="mb-1" style="font-weight: bold; font-size: 14px;">Peserta</p>
                <h4 class="mb-3" style="font-weight: bold; font-size: 16px;">{{ $user->nama }}</h4>
                <p class="mb-1" style="font-weight: bold; font-size: 14px;">No Whatsapp</p>
                <h4 class="mb-3" style="font-weight: bold; font-size: 16px;">{{ $user->no_telepon }}</h4>
                <p class="mb-1" style="font-weight: bold; font-size: 14px;">Pelatihan</p>
                @if($latestPelatihan)
                  <h4 class="mb-3" style="font-weight: bold; font-size: 16px;">{{ $latestPelatihan->nama_pelatihan }}</h4>
                @else
                    <h4 class="mb-3" style="font-weight: bold; font-size: 16px;">Tidak ada pelatihan</h4>
                @endif                
                {{-- <h4 class="mb-3" style="font-weight: bold; font-size: 14px;">()</h4> --}}
            </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6 mx-auto text-center">
          <h6>Jika perlu bantuan silahkan hubungi admin kami</h6>
          <a href="https://api.whatsapp.com/send/?phone=62895337088558" target="_blank" class="btn btn-primary mt-1">Chat admin</a>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
