<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hasil Pendaftaran Praktikum Progdas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <header class="text-center py-4 bg-primary text-white shadow-sm">
    <h2>Hasil Pendaftaran Praktikum Progdas</h2>
  </header>

  <div class="wrapper my-4">
    <div class="container bg-white p-4 rounded-4 shadow-lg" style="max-width: 700px;">
      <h3 class="text-center mb-4 text-primary fw-semibold">Data Anda</h3>

      <table class="table table-borderless">
        <tr>
          <td>
            <?php
            $nama = $_POST['nama'];
            $jk   = $_POST['jk'];

            if ($jk === "laki") {
              echo "Selamat datang mas $nama";
            } else {
              echo "Selamat datang mbak $nama";
            }
            ?>
          </td>
        </tr>
        <tr>
          <td>Nama Lengkap</td>
          <td>: <?php echo $_POST['nama']; ?></td>
        </tr>

        <tr>
          <td>NIM</td>
          <td>: <?php echo $_POST['nim']; ?></td>
        </tr>

        <tr>
          <td>Angkatan</td>
          <td>: <?php echo $_POST['angkatan']; ?></td>
        </tr>
      </table>

      <div class="text-center mt-4">
        <a href="index.php" class="btn btn-secondary px-4">Kembali</a>
      </div>

    </div>
  </div>

  <footer class="text-center py-3 bg-light border-top mt-5">
    <p class="mb-0 text-secondary small">© 2025 Kampus Kita | Dibuat untuk Praktikum Progdas</p>
  </footer>

</body>

</html>