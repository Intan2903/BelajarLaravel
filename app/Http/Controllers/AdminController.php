<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\berita;
use App\Models\lulusan;
use App\Charts\ChartPeminjaman;
use Barryvdh\DomPDF\Facade\Pdf;



class AdminController extends Controller
{
    public function tambah()
    {
        return view('admin.tambah');
    }

    public function postTambahAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'jenisKelamin' => 'required',
            'password' => 'required|min:8|max:20|confirmed', // Perbaikan pada validasi password
            'email' => 'required|email|unique:users,email', // Perbaikan pada validasi email
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->level = 'admin';
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenisKelamin; // Perbaikan pada penamaan kolom jenis kelamin
        $user->password = Hash::make($request->password);
        $user->save();

        if ($user) {
            return back()->with('success', 'Admin baru berhasil ditambah!');
        } else {
            return back()->with('failed', 'Gagal menambah admin baru!');
}
}
public function editAdmin($id){
    $data = User::find($id);
    return view('admin.edit', compact('data'));
    }
    public function postEditAdmin(Request $request, $id) {
    $request->validate([
    'name' => 'required',
    'email' => 'required|email:dns',
     'jenisKelamin' => 'required',
    ]);
    $user = User::find($id);
    $user->name = $request->name;
    $user->email = $request->email;
     $user->jenis_kelamin = $request->jenisKelamin;
    $user->save();
    if($user){
    return back()->with('success', 'Data admin berhasil di
    update!');
    } else {
    return back()->with('failed', 'Gagal mengupdate data admin!');
    }
    }
    public function deleteAdmin($id){
    $data = User::find($id);
    $data->delete();
    if($data){
    return back()->with('success', 'Data berhasil di hapus!');
    } else {
    return back()->with('failed', 'Gagal menghapus data!');
    }
    }

    public function adminBuku(Request $request){
        $search = $request->input('search');
        $data = Buku::where(function($query) use ($search) {
        $query->where('judul_buku', 'LIKE', '%' .$search. '%');
        })->paginate(5);
        return view('admin.buku', compact('data'));
        }
        public function tambahBuku(){
        return view('admin.tambahBuku');
        }
        public function postTambahBuku(Request $request){
        $request->validate([
        'kodeBuku' => 'required',
        'judulBuku' => 'required',
        'penulis' => 'required',
        'penerbit' => 'required',
        'tahunTerbit' => 'required|date',
        'gambar' => 'required|image|max:5120',
         'deskripsi' => 'required',
         'kategori' => 'required',
        ]);
        $buku = new Buku;
        $buku->kode_buku = $request->kodeBuku;
        $buku->judul_buku = $request->judulBuku;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahunTerbit;
         $buku->deskripsi = $request-> deskripsi;
         $buku->kategori = $request-> kategori;
        if($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('images/', $filename);
        $buku->gambar = $filename;
        }
        $buku->save();
        if($buku) {
        return back()->with('success', 'Buku baru berhasil
        ditambahkan!');
        } else{
        return back()->with('failed', 'Data gagal ditambahkan!');
        }
        }
        public function editBuku($id) {
        $data = Buku::find($id);
        return view('admin.editBuku', compact('data'));
        }
        public function postEditBuku(Request $request, $id) {
        $request->validate([
        'kodeBuku' => 'required',
        'judulBuku' => 'required',
        'penulis' => 'required',
        'penerbit' => 'required',
        'tahunTerbit' => 'required',
        'gambar' => 'image|max:5120',
        'deskripsi' => 'required',
        'kategori' => 'required'
        ]);
        $buku = Buku::find($id);
        $buku->kode_buku = $request->kodeBuku;
        $buku->judul_buku = $request->judulBuku;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahunTerbit;
        $buku->deskripsi = $request->deskripsi;
        $buku->kategori = $request->kategori;
        if($request->hasFile('gambar')) {
        $filepath = 'images/'.$buku->gambar;
        if(File::exists($filepath)) {
        File::delete($filepath);
        }
        $file = $request->file('gambar');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('images/', $filename);
        $buku->gambar = $filename;
        }
        $buku->save();
        if($buku) {
        return back()->with('success', 'Buku berhasil diupdate!');
        } else{
        return back()->with('failed', 'Buku gagal diupdate!');
        }
        }
        public function deleteBuku($id) {
        $buku = Buku::find($id);
        $filepath = 'images/'.$buku->gambar;
        if(File::exists($filepath)) {
        File::delete($filepath);
        }
        $buku->delete();
        if($buku){
        return back()->with('success', 'Data buku berhasil di
        hapus!');
        } else {
        return back()->with('failed', 'Gagal menghapus data buku!');
        }
        }
        public function adminPeminjaman(Request $request, ChartPeminjaman
        $chartPeminjaman) {
        $chart = $chartPeminjaman->build();

        $search = $request->input('search');

            $data = Peminjaman::where(function($query) use ($search) {
            $query->where('id_user', 'LIKE', '%' .$search. '%');
            })->paginate(5);
            return view('admin.peminjaman', compact('data', 'chart'));
            }
            public function tambahPeminjaman() {
            return view('admin.tambahPeminjaman');
            }
            public function postTambahPeminjaman(Request $request) {
            $request->validate([
            'idUser' => 'required',
            'kodeBuku' => 'required|int',
            'tanggalPeminjaman' => 'required|date',
            'tanggalPengembalian' => 'required|date'
            ]);
            $peminjaman = new Peminjaman;
            $peminjaman->id_user = $request->idUser;
            $peminjaman->id_buku = $request->kodeBuku;
            $peminjaman->tanggal_pinjam = $request->tanggalPeminjaman;
            $peminjaman->tanggal_kembali = $request->tanggalPengembalian;
            $peminjaman->status = 'Belum Dikembalikan';
            $peminjaman->save();
            if($peminjaman) {
            return back()->with('success', 'Data peminjaman berhasil
            ditambahkan!');
            } else {
            return back()->with('failed', 'Gagal menambahkan data
            peminjaman!');
            }
            }
            public function editPeminjaman($id) {
            $data = Peminjaman::find($id);
            return view('admin/editPeminjaman', compact('data'));
            }
            public function postEditPeminjaman(Request $request, $id) {
            $request->validate([
            'idUser' => 'required',
            'kodeBuku' => 'required|int',
            'tanggalPeminjaman' => 'required',
            'tanggalPengembalian' => 'required',
            'status' => 'required'
            ]);
            $peminjaman = Peminjaman::find($id);
            $peminjaman->id_user = $request->idUser;
            $peminjaman->id_buku = $request->kodeBuku;
            $peminjaman->tanggal_pinjam = $request->tanggalPeminjaman;
            $peminjaman->tanggal_kembali = $request->tanggalPengembalian;
            $peminjaman->status = $request->status;
            $peminjaman->save();
            if($peminjaman){
            return back()->with('success', 'Data peminjaman berhasil di
            update!');
            } else {
            return back()->with('failed', 'Gagal mengupdate data
            peminjaman!');
            }
            }
            public function deletePeminjaman($id) {
            $data = Peminjaman::find($id);
            $data->delete();
            if($data) {
            return back()->with('success', 'Data peminjaman berhasil di
            hapus!');
            } else {
            return back()->with('failed', 'Gagal menghapus data
            peminjaman!');
            }
            }
            public function detailPeminjaman($id_peminjaman, $id_user, $id_buku) {
                $detailPeminjaman = Peminjaman::select('peminjaman.*', 'buku.*', 'users.*')
                    ->join('buku', 'peminjaman.id_buku', 'buku.id')
                    ->join('users', 'peminjaman.id_user', 'users.id')
                    ->where('peminjaman.id', $id_peminjaman)
                    ->where('buku.id', $id_buku)
                    ->where('users.id', $id_user)
                    ->first();
            
                if (!$detailPeminjaman) {
                    abort(404, 'Data tidak ditemukan');
                }
            
                return view('admin.detailPeminjaman', compact('detailPeminjaman'));
            }
            public function cetakDataPeminjaman() {
                $data = DB::table('peminjaman')
                ->join('users', 'users.id', '=', 'peminjaman.id_user')
                ->join('buku', 'buku.id', '=', 'peminjaman.id_buku')
                ->select('peminjaman.*', 'users.name', 'buku.judul_buku')
                ->get();
                $pdf = PDF::loadView('admin.cetakPeminjaman', ['data' => $data]);
                return $pdf->stream();
                }

                public function adminBerita(Request $request){
                    $search = $request->input('search');
                
                    $data = berita::where('judul', 'LIKE', '%' . $search . '%')->paginate(5);
                
                    return view('admin.Berita', compact('data'));
                }
                
                public function tambahberita()
                {
                    return view('admin.tambahberita');
                }
                
                public function postTambahBerita(Request $request)
                {
                    $request->validate([
                        'judul' => 'required',
                        'deskripsi' => 'required',
                        'isi' => 'required',
                        'foto' => 'required|image|max:5120',
                    ]);
                
                    $Berita = new Berita();
                    $Berita->judul = $request->judul;
                    $Berita->deskripsi = $request->deskripsi;
                    $Berita->isi = $request->isi;
                
                    if ($request->hasFile('foto')) {
                        $file = $request->file('foto');
                        $extension = $file->getClientOriginalExtension();
                        $filename = time() . '.' . $extension;
                        $file->move('images/', $filename);
                        $Berita->foto = $filename;
                    }
                
                    $Berita->save();
                
                    if ($Berita) {
                        return back()->with('success', 'Berita baru berhasil ditambahkan!');
                    } else {
                        return back()->with('failed', 'Data gagal ditambahkan!');
                    }
                }
                
                public function editberita($id)
                {
                    $data = Berita::find($id);
                    return view('admin.editberita', compact('data'));
                }
                
                public function postEditBerita(Request $request, $id)
                {
                    $request->validate([
                        'judul' => 'required',
                        'deskripsi' => 'required',
                        'isi' => 'required',
                        'foto' => 'image|max:5120',
                    ]);
                
                    $Berita = Berita::find($id);
                    $Berita->judul = $request->judul;
                    $Berita->deskripsi = $request->deskripsi;
                    $Berita->isi = $request->isi;
                
                    if ($request->hasFile('foto')) {
                        $filepath = 'images/' . $Berita->gambar;
                        if (File::exists($filepath)) {
                            File::delete($filepath);
                        }
                        $file = $request->file('foto');
                        $extension = $file->getClientOriginalExtension();
                        $filename = time() . '.' . $extension;
                        $file->move('images/', $filename);
                        $Berita->foto = $filename;
                    }
                
                    $Berita->save();
                
                    if ($Berita) {
                        return back()->with('success', 'Berita berhasil diupdate!');
                    } else {
                        return back()->with('failed', 'Berita gagal diupdate!');
                    }
                }
                
                public function deleteberita($id)
                {
                    $Berita = Berita::find($id);
                    $filepath = 'images/' . $Berita->gambar;
                    if (File::exists($filepath)) {
                        File::delete($filepath);
                    }
                    $Berita->delete();
                
                    if ($Berita) {
                        return back()->with('success', 'Data Berita berhasil dihapus!');
                    } else {
                        return back()->with('failed', 'Gagal menghapus data Berita!');
                    }
                }
                
                public function lulusan(Request $request){
                    $search = $request->input('search');
                
                    $data = lulusan::where('nama', 'LIKE', '%' . $search . '%')->paginate(5);
                
                    return view('admin.lulusan', compact('data'));
                }
                public function tambahlulusan()
                {
                    return view('admin.tambahlulusan');
                }
                public function postTambahLulusan(Request $request)
                {
                    $request->validate([
                        'foto' => 'required|image|max:5120',
                        'nama' => 'required',
                        'jurusan' => 'required',
                        'ipk' => 'required'
                    ]);
                
                    $lulusan = new lulusan();
                    $lulusan->nama = $request->nama;
                    $lulusan->jurusan = $request->jurusan;
                    $lulusan->ipk = $request->ipk;
                
                    if ($request->hasFile('foto')) {
                        $file = $request->file('foto');
                        $extension = $file->getClientOriginalExtension();
                        $filename = time() . '.' . $extension;
                        $file->move('images/', $filename);
                        $lulusan->foto = $filename;
                    }
                
                    $lulusan->save();
                
                    if ($lulusan) {
                        return back()->with('success', 'Lulusan baru berhasil ditambahkan!');
                    } else {
                        return back()->with('failed', 'Data gagal ditambahkan!');
                    }
                }
                public function editLulusan($id)
{
    $data = lulusan::find($id);
    return view('admin.editlulusan', compact('data'));
}

public function postEditLulusan(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'jurusan' => 'required',
        'ipk' => 'required',
        'foto' => 'image|nullable|max:5120',
    ]);

    $lulusan = lulusan::find($id);
    $lulusan->nama = $request->nama;
    $lulusan->jurusan = $request->jurusan;
    $lulusan->ipk = $request->ipk;

    if ($request->hasFile('foto')) {
        $filepath = 'images/' . $lulusan->foto;
        if (File::exists($filepath)) {
            File::delete($filepath);
        }
        $file = $request->file('foto');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('images/', $filename);
        $lulusan->foto = $filename;
    }

    $lulusan->save();

    if ($lulusan) {
        return back()->with('success', 'Data lulusan berhasil diupdate!');
    } else {
        return back()->with('failed', 'Data lulusan gagal diupdate!');
    }
}

public function deleteLulusan($id)
{
    $lulusan = Lulusan::find($id);
    $filepath = 'images/' . $lulusan->foto;
    if (File::exists($filepath)) {
        File::delete($filepath);
    }
    $lulusan->delete();

    if ($lulusan) {
        return back()->with('success', 'Data lulusan berhasil dihapus!');
    } else {
        return back()->with('failed', 'Gagal menghapus data lulusan!');
    }
}
}
                