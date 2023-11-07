<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Profil Lulusan Jurusan RPL</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark  shadow-sm fixed-top" style="background-color: #94AF9F;">
        <div class="container ">
            <a class="navbar-brand mr-auto" href="/">Politeknik Negeri Bengkalis | DIV Rekayasa Perangkat Lunak</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ml-auto">
                        <a class="nav-link" href="{{ route('user.home') }}">Buku</a>
                    </li>
                    <li class="nav-item ml-auto">
                        <a class="nav-link" href="{{ route('berita') }}">Berita</a>
                    </li>
                    <li class="nav-item ml-auto">
                        <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                    </li>
                    <li class="nav-item ml-auto">
                        <a class="nav-link" href="{{ route('aktivitas') }}">Aktivitas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br>


    <!-- Content -->
    <div class="container mt-4">
        <h1 class="text-center">Profil Lulusan Jurusan RPL</h1>
        <hr>

        <!-- Profil Lulusan -->
        <div class="row">
            <!-- Profil Lulusan 1 -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <img src="/image/lulusan4.jpg" class="card-img-top" alt="Foto Lulusan 1">
                    <div class="card-body">
                        <h5 class="card-title">Siti Fatimah</h5>
                        <p class="card-text">Lulusan tahun 2021 dengan ipk 3.90</p>
                        <a href="#" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Profil Lulusan 2 -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <img src="/image/lulusan1.jpg" class="card-img-top" alt="Foto Lulusan 2">
                    <div class="card-body">
                        <h5 class="card-title">Siti Aisyah</h5>
                        <p class="card-text">Lulusan tahun 2021 dengan ipk 4</p>
                        <a href="#" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Tambahkan Profil Lulusan Lainnya di sini -->

        </div>
    </div>

    <!-- Sertakan skrip JavaScript Bootstrap (JQuery dan Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>