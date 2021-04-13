<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// FRONTEND
// Navbar
Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/product', 'HomeController@product')->name('product');
Route::get('/listUmkm', 'HomeController@listUmkm')->name('listUmkm');
Route::get('/detailProduct/{product}', 'HomeController@detailProduct')->name('detailProduct');

Route::prefix('umkm')->group(function () {
    Route::middleware(['umkm_belum_login'])->group(function () {
        Route::get('/', 'Umkm\DashboardController@index')->name('login');
        Route::get('register-umkm', 'Umkm\DashboardController@register')->name('register-umkm');
        Route::post('aksiregister-umkm', 'Umkm\DashboardController@registerAdmin')->name('aksiregister-umkm');
        Route::post('aksilogin-umkm', 'Umkm\DashboardController@loginAdmin')->name('aksilogin-umkm');
    });

    Route::middleware(['umkm_sudah_login'])->group(function () {
        Route::get('dashboard-umkm', 'Umkm\DashboardController@dashboard')->name('dashboard-umkm');
        Route::get('logout-umkm', 'Umkm\DashboardController@logout')->name('logout-umkm');
        //Profile
        Route::get('profile-umkm', 'Umkm\ProfileController@index')->name('profile-umkm');
        
        Route::put('profile-umkm/profile/{umkm}', 'Umkm\ProfileController@profileUpdate')->name('profile-umkm.profile');
        Route::put('profile-umkm/pemilik/{umkm}', 'Umkm\ProfileController@pemilikUpdate')->name('profile-umkm.pemilik');
        Route::put('profile-umkm/akun/{umkm}', 'Umkm\ProfileController@akunUpdate')->name('profile-umkm.akun');
        //cari kota
        Route::post('profile-umkm/carikota', 'Umkm\ProfileController@carikota');

        // PRODUCT-UMKM
        Route::get('product-umkm', 'Umkm\ProductController@index')->name('product-umkm');
        Route::post('product-umkm', 'Umkm\ProductController@store')->name('product-store');
        Route::put('product/{barang}', 'Umkm\ProductController@update')->name('product-update');
        Route::delete('product/{barang}', 'Umkm\ProductController@destroy')->name('product.delete');
        
        Route::post('cari_data_produk', 'Umkm\ProductController@cari_data_produk')->name('cari_data_produk');
        
        // GAMBAR-PRODUCT
        Route::post('product.gambar', 'Umkm\GambarController@store')->name('product.gambar');
        
        // Data Barang
        Route::get('barang/{barang}', 'Backend\BarangController@edit')->name('barang.edit');
    });
});



// BACKEND
Route::prefix('backend')->group(function () {
    Route::middleware(['belum_login'])->group(function () {
        Route::get('/', 'Backend\DashboardController@index')->name('/');
        Route::get('register', 'Backend\DashboardController@register')->name('register');
        Route::post('aksiregister', 'Backend\DashboardController@registerAdmin')->name('aksiregister');
        Route::post('aksilogin', 'Backend\DashboardController@loginAdmin')->name('aksilogin');
    });

    Route::middleware(['sudah_login'])->group(function () {
        Route::get('dashboard', 'Backend\DashboardController@dashboard')->name('dashboard');
        Route::get('logout', 'Backend\DashboardController@logout')->name('logout');

        // Admin
        Route::get('admin', 'Backend\AdminController@index')->name('admin');
        Route::get('admin.create', 'Backend\AdminController@create')->name('admin.create');
        Route::post('admin', 'Backend\AdminController@store')->name('admin.store');
        Route::get('admin/{admin}', 'Backend\AdminController@edit')->name('admin.edit');
        Route::put('admin/{admin}', 'Backend\AdminController@update')->name('admin.update');
        Route::delete('admin/{admin}', 'Backend\AdminController@destroy')->name('admin.delete');

        // Jenis UMKM
        Route::get('jenis', 'Backend\JenisController@index')->name('jenis');
        Route::get('jenis.create', 'Backend\JenisController@create')->name('jenis.create');
        Route::post('jenis', 'Backend\JenisController@store')->name('jenis.store');
        Route::get('jenis/{jenis}', 'Backend\JenisController@edit')->name('jenis.edit');
        Route::put('jenis/{jenis}', 'Backend\JenisController@update')->name('jenis.update');
        Route::delete('jenis/{jenis}', 'Backend\JenisController@destroy')->name('jenis.delete');

        // Data UMKM
        Route::get('umkm', 'Backend\UmkmController@index')->name('umkm');
        Route::get('umkm.create', 'Backend\UmkmController@create')->name('umkm.create');
        Route::post('umkm', 'Backend\UmkmController@store')->name('umkm.store');
        Route::get('umkm/{umkm}', 'Backend\UmkmController@edit')->name('umkm.edit');
        Route::put('umkm/{umkm}', 'Backend\UmkmController@update')->name('umkm.update');
        Route::delete('umkm/{umkm}', 'Backend\UmkmController@destroy')->name('umkm.delete');
        // cari kota
        Route::post('umkm/carikota', 'Backend\UmkmController@carikota');

        //aktivasi
        Route::post('umkm/aktif', 'Backend\UmkmController@aktif');
        Route::post('umkm/mati', 'Backend\UmkmController@mati');

        // Kategori Barang
        Route::get('kategori', 'Backend\KategoriController@index')->name('kategori');
        Route::get('kategori.create', 'Backend\KategoriController@create')->name('kategori.create');
        Route::post('kategori', 'Backend\KategoriController@store')->name('kategori.store');
        Route::get('kategori/{kategori}', 'Backend\KategoriController@edit')->name('kategori.edit');
        Route::put('kategori/{kategori}', 'Backend\KategoriController@update')->name('kategori.update');
        Route::delete('kategori/{kategori}', 'Backend\KategoriController@destroy')->name('kategori.delete');

        // Sub Kategori Barang
        Route::get('sub', 'Backend\SubController@index')->name('sub');
        Route::get('sub.create', 'Backend\SubController@create')->name('sub.create');
        Route::post('sub', 'Backend\SubController@store')->name('sub.store');
        Route::get('sub/{sub}', 'Backend\SubController@edit')->name('sub.edit');
        Route::put('sub/{sub}', 'Backend\SubController@update')->name('sub.update');
        Route::delete('sub/{sub}', 'Backend\SubController@destroy')->name('sub.delete');

        // Data Barang
        Route::get('barang', 'Backend\BarangController@index')->name('barang');
        Route::get('barang.create', 'Backend\BarangController@create')->name('barang.create');
        Route::post('barang', 'Backend\BarangController@store')->name('barang.store');
        Route::get('barang/{barang}', 'Backend\BarangController@edit')->name('barang.edit');
        Route::put('barang/{barang}', 'Backend\BarangController@update')->name('barang.update');
        Route::delete('barang/{barang}', 'Backend\BarangController@destroy')->name('barang.delete');
        Route::post('barang/carisub', 'Backend\BarangController@carisub');


        // Data Gambar
        Route::get('gambar', 'Backend\GambarController@index')->name('gambar');
        Route::get('gambar.create', 'Backend\GambarController@create')->name('gambar.create');
        Route::post('gambar', 'Backend\GambarController@store')->name('gambar.store');
        Route::get('gambar/{gambar}', 'Backend\GambarController@edit')->name('gambar.edit');
        Route::put('gambar/{gambar}', 'Backend\GambarController@update')->name('gambar.update');
        Route::delete('gambar/{gambar}', 'Backend\GambarController@destroy')->name('gambar.delete');

        // Data Slider
        Route::get('slider', 'Backend\SliderController@index')->name('slider');
        Route::get('slider.create', 'Backend\SliderController@create')->name('slider.create');
        Route::post('slider', 'Backend\SliderController@store')->name('slider.store');
        Route::get('slider/{slider}', 'Backend\SliderController@edit')->name('slider.edit');
        Route::put('slider/{slider}', 'Backend\SliderController@update')->name('slider.update');
        Route::delete('slider/{slider}', 'Backend\SliderController@destroy')->name('slider.delete');

        //Data Iklan
        Route::get('iklan', 'Backend\IklanController@index')->name('iklan');
        Route::get('iklan.create', 'Backend\IklanController@create')->name('iklan.create');
        Route::post('iklan', 'Backend\IklanController@store')->name('iklan.store');
        Route::get('iklan/{iklan}', 'Backend\IklanController@edit')->name('iklan.edit');
        Route::put('iklan/{iklan}', 'Backend\IklanController@update')->name('iklan.update');
        Route::delete('iklan/{iklan}', 'Backend\IklanController@destroy')->name('iklan.delete');
    });
});
