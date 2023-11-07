<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark shadow -sm fixed top " style="background-color: #94AF9F;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="/">Politeknik Negeri Bengkalis | DIV Rekayasa Perangkat Lunak</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
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
    <div class="container" style="margin-top: 150px">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-secondary">Selamat Datang!</h1>
                <h4 class="text-secondary">
                    Diperpustakaan Politeknik Negri Bengkalis</h4>
                <h6 class="mt-3">
                    Silahkan
                    <a href="{{ route('auth.login') }}" style=text-decoration: none">masuk</a>
                    atau <a href="{{ route('auth.register') }}" style=text-decoration: none">Daftar</a>
                    jika belum punya akun
                </h6>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- Footer -->
    <footer class="text-white text-center pb-5 shadow -sm fixed bottom"
        style="background-color: #94AF9F; margin-top: 20px;">
        <p>Create with <i class="bi bi-suit-heart-fill text-danger"></i> by <a class="text-black text-white fw-bold"
                href="https://www.instagram.com/intanftikaarahma"></a>your love</p>
    </footer>

    <!-- Sertakan skrip JavaScript Bootstrap (JQuery dan Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <style>
    body {
        background-image: url('');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    }
    </style>
</body>

</html>