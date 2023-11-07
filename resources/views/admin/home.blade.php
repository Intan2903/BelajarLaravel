<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Homepage</title>
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


    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <h4 class="text-secondary">Selamat Datang {{ Auth::user()->name }}</h4>
            </div>
            <div class="col"></div>
            <div class="col-1"><a href="{{ route('logout') }}" style="text-decoration: none">
                    <p class="text-end text-black fw-semibold">Logout</p>
                </a></div>
        </div><br><br>
        <a href="{{ url('/admin/tambahberita') }}" class="btn btn-primary">Input berita</a>
        <a href="{{ url('/admin/inputlulusan') }}" class="btn btn-primary">Input lulusan</a>
    </div>

    <div class="container mt-3">
        @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible fade 
show" role="alert">
            <strong>Berhasil!</strong> {{ Session::get('success') 
}}
            <button type="button" class="btn-close" data-bsdismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (Session::get('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bsdismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
    <div class="row mt-4">
        <div class="col"></div>
        <div class="col-6">
            <form action="{{ route('admin.home') }}" method="GET">
                @csrf
                <div class="input-group">
                    <input type="search" name="search" class="formcontrol rounded" placeholder="Cari nama admin"
                        aria-label="Search" aria-describedby="searchaddon" />
                    <button type="submit" class="btn btn-outline-primary">
                        search</button>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
    <div class="row mt-5">
        <div class="col"></div>
        <div class="col"></div>
        <div class="col-2">
            <a class="btn btn-success" href="{{ route('admin.tambah') 
}}" style="text-decoration: none; margin-left: 30px">Tambah
                Data +</a>
        </div>
    </div>
    <table class="table" style="margin-top: 10px">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($data as $index => $userAdmin)
            <tr>
                <td>{{ $index + $data->firstItem() }}</td>
                <td scope="row">{{ $userAdmin->name }}</td>
                <td>{{ $userAdmin->email }}</td>
                <td>{{ $userAdmin->jenis_kelamin }}</td>
                <td>{{ $userAdmin->level }}</td>
                <td>
                    <a class="btn btn-outline-warning" href="/editAdmin/{{ $userAdmin->id }}">Edit</a>
                    <a class="btn btn-outline-danger" href="/deleteAdmin/{{ $userAdmin->id }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table><br>
    {{ $data->links() }}
    </div><br><br><br>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>