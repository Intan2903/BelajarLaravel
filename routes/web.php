<?php
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
/*
|-----------------------------------------------------------------------
---
| Web Routes
|-----------------------------------------------------------------------
---
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
return view('home');
});

Route::get('/auth/login', [LoginRegisterController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [LoginRegisterController::class, 'register'])->name('auth.register');


 Route::middleware(['guest'])->group(function () {
Route::get('/', function () {
        return view('home');
    });

    Route::get('/auth/login', [LoginRegisterController::class, 'login'])->name('auth.login');
    Route::get('/auth/register', [LoginRegisterController::class, 'register'])->name('auth.register');
});

   Route::group(['middleware' => ['auth', 'checklevel:admin']], function () {
   Route::get('/admin/home', [LoginRegisterController::class, 'adminHome'])->name('admin.home');
   Route::get('/admin/tambahberita', [LoginRegisterController::class, 'tambahberita'])->name('tambahberita');
   Route::get('/admin/inputlulusan', [LoginRegisterController::class, 'inputlulusan'])->name('inputlulusan');
   Route::post('/postBerita', [LoginRegisterController::class, 'postBerita'])->name('postBerita');
   Route::post('/postLulusan', [LoginRegisterController::class, 'postLulusan'])->name('postLulusan');
   

   Route::get('/admin/tambah', [AdminController::class, 'tambah'])->name('admin.tambah');
   Route::get('/editAdmin/{id}', [AdminController::class, 'editAdmin'])->name('editAdmin');
   Route::get('/deleteAdmin/{id}', [AdminController::class,'deleteAdmin'])->name('deleteAdmin');

   Route::get('/admin/buku', [AdminController::class, 'adminBuku'])->name('admin.buku');
   Route::get('/admin/tambahBuku', [AdminController::class,'tambahBuku'])->name('admin.tambahBuku');
   Route::get('/admin/editBuku/{id}', [AdminController::class,'editBuku'])->name('admin.editBuku');
   Route::get('/admin/deleteBuku/{id}', [AdminController::class,'deleteBuku'])->name('admin.deleteBuku');

   Route::get('/admin/peminjaman', [AdminController::class, 'adminPeminjaman'])->name('admin.peminjaman');
   Route::get('/admin/tambahPeminjaman', [AdminController::class, 'tambahPeminjaman'])->name('admin.tambahPeminjaman');
   Route::get('/admin/editPeminjaman/{id}', [AdminController::class, 'editPeminjaman'])->name('admin.editPeminjaman');
   Route::get('/admin/deletePeminjaman/{id}', [AdminController::class, 'deletePeminjaman'])->name('admin.deletePeminjaman');
   Route::get('/admin/detailPeminjaman/{id_peminjaman}/{id_user}/{id_buku}',[AdminController::class, 'detailPeminjaman'])->name('admin.detailPeminjaman');
   Route::get('/admin/cetakPeminjaman', [AdminController::class,'cetakDataPeminjaman'])->name('admin.cetakDataPeminjaman');

   Route::get('/admin/Berita', [AdminController::class, 'adminBerita'])->name('admin.Berita');
   Route::get('/admin/tambahberita', [AdminController::class, 'tambahberita'])->name('admin.tambahberita');
   Route::get('/admin/editberita/{id}', [AdminController::class, 'editberita'])->name('admin.editberita');
   Route::get('/admin/deleteberita/{id}', [AdminController::class, 'deleteberita'])->name('admin.deleteberita');

   Route::get('/admin/lulusan', [AdminController::class, 'lulusan'])->name('admin.lulusan');
   Route::get('/admin/tambahLulusan', [AdminController::class, 'tambahLulusan'])->name('admin.tambahLulusan');
   Route::get('/admin/editlulusan/{id}', [AdminController::class, 'editlulusan'])->name('admin.editlulusan');
   Route::get('/admin/deletelulusan/{id}', [AdminController::class, 'deletelulusan'])->name('admin.deletelulusan');


});

Route::group(['middleware' => ['auth', 'checklevel:user']], function () {
   Route::get('/user/home', [LoginRegisterController::class, 'userHome'])->name('user.home');
   Route::get('/profile', function () {return view('profile');})->name('profile');
   Route::get('/aktivitas', function () {return view('aktivitas');})->name('aktivitas');
   Route::get('/berita', function () {return view('berita');})->name('berita');
   Route::get('/lulusan', function () {return view('lulusan');})->name('lulusan');
   Route::get('/home', function () {return view('home');})->name('home');

   Route::get('/user/lihatberita', [LoginRegisterController::class, 'userberita'])->name('user.lihatberita');
   //  Route::get('/user/lulusan', [otherController::class, 'lulusan'])->name('user.lulusan');
   //  Route::get('/user/aktifitas', [otherController::class, 'aktifitas'])->name('user.aktifitas');

  
});

Route::post('/postRegister', [LoginRegisterController::class, 'postRegister'])->name('postRegister');
Route::post('/postLogin', [LoginRegisterController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');


Route::post('/tambahAdmin', [AdminController::class, 'postTambahAdmin'])->name('postTambahAdmin');
Route::post('/postEditAdmin/{id}', [AdminController::class,'postEditAdmin'])->name('postEditAdmin');

Route::post('/postTambahBuku', [AdminController::class,'postTambahBuku'])->name('postTambahBuku');
Route::post('/postEditBuku/{id}', [AdminController::class,'postEditBuku'])->name('postEditBuku');

Route::post('/postTambahPeminjaman', [AdminController::class, 'postTambahPeminjaman'])->name('postTambahPeminjaman');
Route::post('/postEditPeminjaman/{id}', [AdminController::class, 'postEditPeminjaman'])->name('postEditPeminjaman');

Route::post('/postTambahBerita', [AdminController::class, 'postTambahBerita'])->name('postTambahBerita');
Route::post('/postEditBerita/{id}', [AdminController::class, 'postEditBerita'])->name('postEditBerita');

Route::post('/postTambahLulusan', [AdminController::class, 'postTambahLulusan'])->name('postTambahLulusan');
Route::post('/postEditLulusan/{id}', [AdminController::class, 'postEditLulusan'])->name('postEditLulusan');