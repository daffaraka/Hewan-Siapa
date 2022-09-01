<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\JenisHewanController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\RasHewanController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\ManajemenAdopsiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Post\AdopsiController;
use App\Http\Controllers\Admin\Post\PemacakanController;
use App\Http\Controllers\User\FrontEndController;
use App\Http\Controllers\User\ManajemenPemacakanController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

Route::get('/', function () {
    return redirect()->route('hewan-siapa.index');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::get('/home', function() {
//     return view('home');
// });

Route::group(['middleware' => ['role:admin|super admin']], function () {
    Route::prefix('hewan-siapa/admin')->group(function () {
        Route::get('dashboard-admin', [DashboardController::class,'dashboard'])->name('dashboard.admin');
       
        // Route::resource('jenishewan', JenisHewanController::class);
        Route::get('jenishewan', [JenisHewanController::class,'index'])->name('jenishewan.index');
        Route::get('jenishewan/create', [JenisHewanController::class,'create'])->name('jenishewan.create');
        Route::post('jenishewan/store', [JenisHewanController::class,'store'])->name('jenishewan.store');
        Route::get('jenishewan/{id}/edit', [JenisHewanController::class,'edit'])->name('jenishewan.edit');
        Route::post('jenishewan/{id}/update', [JenisHewanController::class,'update'])->name('jenishewan.update');
        Route::get('jenishewan/delete/{id}', [JenisHewanController::class,'delete'])->name('jenishewan.delete');
    
    
        // Route::resource('rashewan', RasHewanController::class);
        Route::get('/rashewan',[RasHewanController::class,'index'])->name('rashewan.index');
        Route::get('/rashewan/create', [RasHewanController::class,'create'])->name('rashewan.create');
        Route::post('/rashewan/store', [RasHewanController::class,'store'])->name('rashewan.store');
        Route::get('rashewan/{id}/edit', [RasHewanController::class,'edit'])->name('rashewan.edit');
        Route::post('rashewan/{id}/update', [RasHewanController::class,'update'])->name('rashewan.update');
        Route::get('rashewan/delete/{id}', [RasHewanController::class,'delete'])->name('rashewan.delete');
        Route::get('rashewan/search', [RasHewanController::class,'pencarianDataRasHewan'])->name('rashewan.search');
    
        // Route untuk adopsi
        Route::get('/adopsi',[AdopsiController::class,'index'])->name('adopsi.index');
        Route::get('/adopsi/create', [AdopsiController::class,'create'])->name('adopsi.create');
        Route::post('/adopsi/store', [AdopsiController::class,'store'])->name('adopsi.store');
        Route::get('adopsi/{id}/edit', [AdopsiController::class,'edit'])->name('adopsi.edit');
        Route::post('adopsi/{id}/update', [AdopsiController::class,'update'])->name('adopsi.update');
        Route::get('adopsi/delete/{id}', [AdopsiController::class,'delete'])->name('adopsi.delete');
        Route::get('adopsi/search', [AdopsiController::class,'pencarianDataAdopsi'])->name('adopsi.search');
        Route::get('adopsi/create/findRasHewan', [AdopsiController::class,'findRasHewan'])->name('adopsi.findRasHewan');
        Route::get('adopsi/{id}/edit/findRasHewanOnEdit', [AdopsiController::class,'findRasHewanOnEdit'])->name('adopsi.findRasHewanOnEdit');
    
        // Route::get('rashewan/search', [AdopsiController::class,'pencarian'])->name('adopsi.search');
    
        Route::resource('user', UserController::class);
        Route::resource('roles', RoleController::class);

        Route::resource('pemacakan', PemacakanController::class);
        Route::get('pemacakan/create/findRasHewan', [PemacakanController::class,'findRasHewan']);

        Route::get('laporanAdopsi',[LaporanController::class,'laporanAdopsi'])->name('laporan.adopsi');
        Route::get('laporanPemacakan',[LaporanController::class,'laporanPemacakan'])->name('laporan.pemacakan');
        Route::get('exportAdopsi',[LaporanController::class,'exportAdopsi'])->name('laporan.exportAdopsi');
        Route::get('exportPemacakan',[LaporanController::class,'exportPemacakan'])->name('laporan.exportPemacakan');
    });
});


Route::get('hewan-siapa',[FrontEndController::class,'index'])->name('hewan-siapa.index');
Route::get('hewan-siapa/search', [FrontEndController::class,'search'])->name('search');


Route::get('hewan-siapa/list-adopsi',[ManajemenAdopsiController::class,'listAdopsi'])->name('hewan-siapa.listAdopsi');
Route::get('hewan-siapa/create-adopsi',[ManajemenAdopsiController::class,'create'])->name('hewan-siapa.createAdopsi');
Route::post('hewan-siapa/store-adopsi',[ManajemenAdopsiController::class,'store'])->name('hewan-siapa.storeAdopsi');
Route::get('hewan-siapa/showAdopsi/{id}',[ManajemenAdopsiController::class,'show'])->name('hewan-siapa.showAdopsi');
Route::get('hewan-siapa/{id}/edit-adopsi',[ManajemenAdopsiController::class,'edit'])->name('hewan-siapa.editAdopsi');
Route::post('hewan-siapa/{id}/update-adopsi', [ManajemenAdopsiController::class,'update'])->name('hewan-siapa.updateAdopsi');
Route::get('hewan-siapa/{id}/form-pengajuan-adopsi',[ManajemenAdopsiController::class,'form_pengajuan_adopsi'])->name('hewan-siapa.form-pengajuan-adopsi');
Route::post('hewan-siapa/{id}/ajukan-adopsi',[ManajemenAdopsiController::class,'ajukan_adopsi'])->name('hewan-siapa.ajukan-adopsi');
Route::get('hewan-siapa/{id}/faq-adopsi',[ManajemenAdopsiController::class,'faq'])->name('hewan-siapa.faqAdopsi');
Route::get('hewan-siapa/create/findRasHewan', [ManajemenAdopsiController::class,'findRasHewan'])->name('adopsi.findRasHewan');
Route::get('hewan-siapa/{id}/edit/findRasHewanOnEdit', [ManajemenAdopsiController::class,'findRasHewanOnEdit'])->name('adopsi.findRasHewanOnEdit');
Route::get('hewan-siapa/deleteAdopsi/{id}', [ManajemenAdopsiController::class,'destroy'])->name('hewan-siapa.deleteAdopsi');
Route::get('hewan-siapa/searchAdopsi', [ManajemenAdopsiController::class,'searchAdopsi'])->name('hewan-siapa.searchAdopsi');


Route::get('hewan-siapa/list-pemacakan',[ManajemenPemacakanController::class,'listPemacakan'])->name('hewan-siapa.listPemacakan');
Route::get('hewan-siapa/create-pemacakan',[ManajemenPemacakanController::class,'create'])->name('hewan-siapa.createPemacakan');
Route::post('hewan-siapa/store-pemacakan',[ManajemenPemacakanController::class,'store'])->name('hewan-siapa.storePemacakan');
Route::get('hewan-siapa/pemacakan/{id}',[ManajemenPemacakanController::class,'show'])->name('hewan-siapa.showPemacakan');//->middleware('role:user|admin|super admin');
Route::get('hewan-siapa/{id}/edit-pemacakan',[ManajemenPemacakanController::class,'edit'])->name('hewan-siapa.editPemacakan');
Route::post('hewan-siapa/{id}/update-pemacakan', [ManajemenPemacakanController::class,'update'])->name('hewan-siapa.updatePemacakan');
Route::get('hewan-siapa/{id}/form-pengajuan-pemacakan',[ManajemenPemacakanController::class,'form_pengajuan_pemacakan'])->name('hewan-siapa.form-pengajuan-Pemacakan');
Route::post('hewan-siapa/{id}/ajukan-pemacakan',[ManajemenPemacakanController::class,'ajukan_pemacakan'])->name('hewan-siapa.ajukan-Pemacakan');
Route::get('hewan-siapa/{id}/faq-pemacakan',[ManajemenPemacakanController::class,'faq'])->name('hewan-siapa.faqPemacakan');
Route::get('hewan-siapa/create-pemacakan/findRasHewan', [ManajemenPemacakanController::class,'findRasHewan'])->name('hewan-siapa.findRasHewan');
Route::get('hewan-siapa/{id}/edit-pemacakan/findRasHewanOnEdit', [ManajemenPemacakanController::class,'findRasHewanOnEdit'])->name('hewan-siapa.findRasHewanOnEdit');
Route::get('hewan-siapa/deletePemacakan/{id}', [ManajemenPemacakanController::class,'destroy'])->name('hewan-siapa.deletePemacakan');
Route::get('hewan-siapa/searchPemacakan', [ManajemenPemacakanController::class,'searchPemacakan'])->name('hewan-siapa.searchPemacakan');



Route::group(['middleware' => ['role:user|admin|super admin']], function () {
    Route::prefix('hewan-siapa/user')->group(function () {
        Route::get('profile', [ProfileController::class,'index'])->name('profile.dashboard');
        Route::get('edit-profile',[ProfileController::class,'edit'])->name('profile.edit');
        Route::post('/{id}/update',[ProfileController::class,'update'])->name('profile.update');
     
        //  Pemacakan
        Route::get('pemacakan', [ProfileController::class,'showPemacakan'])->name('profile.pemacakan');
        Route::get('permintaan-pemacakan/', [ProfileController::class,'permintaanPemacakan'])->name('profile.permintaanPemacakan');
        Route::get('permintaan-pemacakan/konfirmasiPemacakan/{id}', [ProfileController::class,'viewKonfirmasiPemacakan'])->name('profile.konfirmasiPemacakan');
        Route::post('permintaan-pemacakan/konfirmasiPemacakan/beriKonfirmasi/{id}', [ProfileController::class,'terimaPemacakan'])->name('profile.terimaPemacakan');
        Route::get('permintaan-pemacakan/delete/konfirmasiPemacakan/{id}', [ProfileController::class,'deletePermintaanPemacakan'])->name('profile.deletePermintaanPemacakan');       
        Route::get('pengajuan-pemacakan-anda', [ProfileController::class,'viewPengajuanPemacakan'])->name('profile.pengajuanPemacakan');


        // Adopsi
        Route::get('adopsi', [ProfileController::class,'showAdopsi'])->name('profile.adopsi');
        Route::get('permintaan-adopsi', [ProfileController::class,'permintaanAdopsi'])->name('profile.permintaanAdopsi');
        Route::get('permintaan-adopsi/konfirmasiAdopsi/{id}', [ProfileController::class,'viewKonfirmasiAdopsi'])->name('profile.konfirmasiAdopsi');
        Route::post('permintaan-adopsi/konfirmasiAdopsi/beriKonfirmasi/{id}', [ProfileController::class,'TerimaAdopsi'])->name('profile.TerimaAdopsi');
        Route::get('permintaan-adopsi/delete/konfirmasiAdopsi/{id}',[ProfileController::class,'deletePermintaanAdopsi'])->name('profile.deletePermintaanAdopsi');
        Route::get('pengajuan-adopsi-anda',[ProfileController::class,'viewPengajuanAdopsi'])->name('profile.pengajuanAdopsi');
        Route::get('pengajuan-adopsi-anda/detail/{id}',[ProfileController::class,'detailPengajuanAnda'])->name('profile.detailPengajuanAnda');
    });
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// require __DIR__.'/auth.php';
