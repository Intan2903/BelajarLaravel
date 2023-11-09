<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Berita</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top" style="background-color: #94AF9F;">
        <div class="container">
            <a class="navbar-brand" href="/">Politeknik Negeri Bengkalis | D-IV Rekayasa Perangkat Lunak</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.home') }}" style="color: white;">Home</a>
                </li>
                <li class="nav-item" style="margin-left: 30px">
                    <a class="nav-link" href="{{ route('admin.buku') }}" style="color: white;">Buku</a>
                </li>
                <li class="nav-item" style="margin-left: 30px">
                    <a class="nav-link" href="{{ route('admin.Berita') }}" style="color: white;">Berita</a>
                </li>
                <li class="nav-item" style="margin-left: 30px">
                    <a class="nav-link" href="{{ route('admin.peminjaman') }}" style="color: white;">Peminjaman</a>
                </li>
                <li class="nav-item" style="margin-left: 30px">
                    <a class="nav-link" href="{{ route('admin.lulusan') }}" style="color: white;">Lulusan</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container" style="margin-top: 120px">
        <div class="row mt-3">
            <div class="col">
                <h4 class="text-secondary">Selamat Datang {{ Auth::user()->name }}</h4>
            </div>
            <div class="col"></div>
            <div class="col-1"><a href="{{ route('logout') }}" style="text-decoration: none">
                    <p class="text-end text-black fw-semibold">Logout</p>
                </a></div>
        </div>

        <div class="container mt-3">
            @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (Session::get('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> {{ Session::get('failed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>

        <div class="row mt-4">
            <div class="col"></div>
            <div class="col-6">
                <form action="{{ route('admin.Berita') }}" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="search" name="search" class="form-control rounded" placeholder="Cari judul berita"
                            aria-label="Search" aria-describedby="search-addon" />
                        <button type="submit" class="btn btn-outline-primary">Search</button>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>

        <div class="row mt-5">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col-2">
                <a class="btn btn-success" href="{{ route('admin.tambahberita') }}"
                    style="text-decoration: none; margin-left: 30px">Tambah Data +</a>
            </div>
        </div>

        <table class="table" style="margin-top: 10px">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">judul</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">isi</th>
                    <th scope="col">Foto</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($data as $index => $Berita)
                <tr>
                    <td scope="row">{{ $index + $data->firstItem() }}</td>
                    <td>{{ $Berita->judul }}</td>
                    <td>{{ $Berita->deskripsi }}</td>
                    <td>{{ $Berita->isi }}</td>
                    <td>
                        <img style="width: 50px" src="{{
asset('/images/' . $Berita->foto) }}" alt="cover berita">
                    </td>
                    <td>
                        <a class="btn btn-outline-warning" href="{{ route('admin.editberita', $Berita->id) }}">Edit</a>
                        <a class="btn btn-outline-danger"
                            href="{{ route('admin.deleteberita', $Berita->id) }}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>