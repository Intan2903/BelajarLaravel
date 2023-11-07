<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Aktivitas Mahasiswa Jurusan RPL</title>
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
    <br>
    <br>
    <br>

    <!-- Content -->
    <div class="container mt-4">
        <h1 class="text-center">Aktivitas Mahasiswa Jurusan Teknik Informatika</h1>
        <hr>

        <!-- Aktivitas Mahasiswa -->
        <div class="row">
            <!-- Aktivitas 1 -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <img src="/image/aktivitas1.jpeg" class="card-img-top" alt="Foto Aktivitas 1">
                    <div class="card-body">
                        <h5 class="card-title">Pertandingan robotic</h5>
                        <p class="card-text">Pertandingan robot adalah kompetisi di mana tim atau individu memprogram
                            dan mengendalikan robot untuk bersaing dalam berbagai tugas atau tantangan. Robot-robot ini
                            bisa beragam, mulai dari robot humanoid yang meniru gerakan manusia hingga kendaraan otonom
                            yang dirancang untuk mengatasi medan sulit. Peserta dalam pertandingan ini harus memiliki
                            pengetahuan dalam pemrograman, desain mekanik, dan pemahaman tentang teknologi sensor.</p>
                        <a href="/img/a.PNG" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Aktivitas 2 -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <img src="/image/aktivitas3.jpeg" class="card-img-top" alt="Foto Aktivitas 2">
                    <div class="card-body">
                        <h5 class="card-title">Pertandingan olahraga</h5>
                        <p class="card-text">Selain mengadakan Pertandingan yang berhubungan dengan IT, jurusan Teknik
                            Informatiuka juga sering mengadakan pertandingan olahraga. Pertandingan olahraga
                            mempromosikan semangat persaingan yang sehat, kebugaran fisik, keterampilan teknis, dan
                            kerja sama tim. Mereka juga menjadi ajang hiburan dan hiburan bagi penonton, dengan
                            penggemar yang mendukung tim atau atlet favorit mereka. </p>
                        <a href="#" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Tambahkan Aktivitas Lainnya di sini -->

        </div>
    </div>

    <!-- Sertakan skrip JavaScript Bootstrap (JQuery dan Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>