<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Form Pendaftaran Praktikum Progdas</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="css/style.css">
</head>

<body>
     <header class="text-center py-4 bg-primary text-white shadow-sm">
          <h2>Form Pendaftaran Praktikum Progdas</h2>
          <p class="lead mb-0">Isi data berikut untuk mengikuti kegiatan</p>
     </header>

     <div class="wrapper my-4">
          <div class="container bg-white p-4 rounded-4 shadow-lg" style="max-width: 700px;">
               <h3 class="text-center mb-4 text-primary fw-semibold">Data Peserta</h3>
               <form action="hasil.php" method="post" id="form">

                    <div class="mb-3">
                         <label for="nama" class="form-label fw-semibold">Nama Lengkap</label>
                         <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama Anda" required>
                    </div>

                    <div class="mb-3">
                         <label for="nim" class="form-label fw-semibold">NIM</label>
                         <input type="text" id="nim" name="nim" class="form-control" placeholder="Masukkan NIM Anda" required>
                    </div>
                    <div class="mb-3">
                         <label for="angkatan" class="form-label fw-semibold">Angkatan</label>
                         <select id="angkatan" name="angkatan" class="form-select" required>
                              <option selected disabled>Pilih Angkatan</option>
                              <option value="2025">2025</option>
                              <option value="2024">2024</option>
                              <option value="2023">2023</option>
                              <option value="2022">2022</option>
                              <option value="2021">2021</option>
                              <option value="2020">2020</option>
                         </select>
                    </div>
                    <div class="mb-3">
                         <label class="form-label fw-semibold">Jenis Kelamin</label>
                         <div class="form-check">
                              <input class="form-check-input" type="radio" name="jk" value="laki" id="jk1" required>
                              <label class="form-check-label" for="jk1">Laki-laki</label>
                         </div>
                         <div class="form-check">
                              <input class="form-check-input" type="radio" name="jk" value="perempuan" id="jk2" required>
                              <label class="form-check-label" for="jk2">Perempuan</label>
                         </div>
                    </div>
                    <div class="text-end">
                         <button type="submit" name="Submit" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">
                              Kirim Data
                         </button>
                    </div>
               </form>
          </div>
     </div>
     <footer class="text-center py-3 bg-light border-top mt-5">
          <p class="mb-0 text-secondary small">© 2025 Kampus Kita | Dibuat untuk Praktikum Progdas</p>
     </footer>
</body>

</html>