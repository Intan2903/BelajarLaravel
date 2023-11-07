<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Form Tambah Lulusan</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark  shadow-sm fixed-top" style="background-color: #94AF9F;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="/">Politeknik Negeri Bengkalis | DIV Rekayasa Perangkat Lunak</a>

        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-4" style="margin-top: 20px;">
        <h1 class="text-center" style="margin-top: 90px;">Form Lulusan</h1>
        <hr>

        <!-- Form Tambah Berita -->
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-group">
                        <label for="judulBerita">Nama Mahasiswa:</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan nama">
                    </div>
                    <div class="form-group">
                        <label for="judulBerita">Jurusan:</label>
                        <input type="text" class="form-control" id="jurusan" placeholder="Masukkan jurusan">
                    </div>
                    <div class="form-group">
                        <label for="judulBerita">judul skripsi:</label>
                        <input type="text" class="form-control" id="judul" placeholder="Masukkan judul skripsi">
                    </div>
                    <div class="form-group">
                        <label for="judulBerita">IPK:</label>
                        <input type="text" class="form-control" id="ipk" placeholder="Masukkan ipk">
                    </div>

                    <div class="form-group">
                        <label for="gambarBerita">Gambar Lulusan</label>
                        <input type="file" class="form-control-file" id="gambarBerita">
                    </div>
                    <button type="submit" class="btn btn-primary">Input Lulusan</button>
                </form>
            </div>
        </div>
    </div>
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        flex-direction: column;
    }

    .container {
        flex: 1;
    }

    footer {
        flex-shrink: 0;
    }
    </style>
    <!-- Footer -->
    <footer class="text-white text-center pb-5" style="background-color: #94AF9F; margin-top: 20px;">
        <p>Createt with <i class="bi bi-suit-heart-fill text-danger"></i> by <a class="text-black text-white fw-bold"
                href="https://www.instagram.com/intanftikaarahma"></a>your love</p>
    </footer>

    <!-- Sertakan skrip JavaScript Bootstrap (JQuery dan Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>