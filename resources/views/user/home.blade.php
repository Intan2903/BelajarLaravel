<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.mi
n.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top" style="background-color: #94AF9F;">
        <div class="container">
            <a class="navbar-brand" href="/">Politeknik Negeri Bengkalis | D-IV Rekayasa Perangkat Lunak</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.home') }}" style="color: white;">Buku</a>
                </li>
                <!-- <li class="nav-item" style="margin-left: 30px">
                            <a class="nav-link" href="{{ route('admin.buku') }}" style="color: white;">Buku</a>
                        </li> -->
                <li class="nav-item" style="margin-left: 30px">
                    <a class="nav-link" href="{{ route('user.lihatberita') }}" style="color: white;">Berita</a>
                </li>
                <!-- <li class="nav-item" style="margin-left: 30px">
                            <a class="nav-link" href="{{ route('admin.peminjaman') }}"
                                style="color: white;">Peminjaman</a>
                        </li>
                        <li class="nav-item" style="margin-left: 30px">
                            <a class="nav-link" href="{{ route('admin.lulusan') }}" style="color: white;">Lulusan</a>
                        </li> -->
            </ul>
        </div>
    </nav>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min
.css">
        <title>Homepage</title>
    </head>

    <body>
        <nav class="navbar navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="/">Politeknik Negeri Bengkalis
                    | D-IV Rakayasa Perangkat Lunak</a>
            </div>
        </nav>
        <div class="container">
            <div class="row mt-3">
                <div class="col">
                    <h4 class="text-secondary">Selamat Datang {{
Auth::user()->name }}</h4>
                </div>
                <div class="col"></div>
                <div class="col-1"><a href="{{ route('logout') }}" style="text-decoration: none">
                        <p class="text-end text-black fw-semibold">Logout</p>
                    </a></div>
            </div>
            <div class="row mt-5 mb-5">
                <div class="col"></div>
                <div class="col-6">
                    <form action="" method="GET">
                        @csrf
                        <div class="input-group">
                            <input type="search" name="search" class="formcontrol rounded" placeholder="Cari nama buku"
                                aria-label="Search" aria-describedby="searchaddon" />
                            <button type="submit" class="btn btn-outlineprimary">search</button>
                        </div>
                    </form>
                </div>
                <div class="col"></div>
            </div>
            @foreach ($data as $buku)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2"><img style="width: 150px" src="{{ asset('images/' . $buku->gambar) }}"
                                alt="cover buku"></div>
                        <div class="col-2">
                            <p class="fw-bold">Judul</p>
                            <p class="fw-bold">Penulis</p>
                            <p class="fw-bold">Penerbit</p>
                            <p class="fw-bold">Tahun Terbit</p>
                            <p class="fw-bold">Deskripsi Buku</p>
                        </div>
                        <div class="col-8">
                            <p>{{ $buku->judul_buku }}</p>
                            <p>{{ $buku->penulis }}</p>
                            <p>{{ $buku->penerbit }}</p>
                            <p>{{ $buku->tahun_terbit }}</p>
                            <p>{{ $buku->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{ $data->links() }}
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundl
e.min.js"></script>
    </body>

    <hmtl>

    </html>