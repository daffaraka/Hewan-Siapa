<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product\Adopsi;
use App\Models\Product\Pemacakan;
use App\Models\Transaksi\LaporanAdopsi;
use App\Models\Transaksi\LaporanPemacakan;
use App\Models\Transaksi\TransaksiAdopsi;
use App\Models\Transaksi\TransaksiPemacakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
   
    public function index()
    {
        $this->data['user'] = Auth::user();
        return view('frontend.profile.user.profile',$this->data);
    }


    public function showAdopsi(){

        $idUser = Auth::user()->id;
        $this->data['adopsi'] = Adopsi::where('owner-adopsi_id',$idUser)->get();
        // dd($this->data);
        return view('frontend.profile.user.adopsi-management',$this->data);
    }


    public function permintaanAdopsi(){
        $namaAnda = Auth::user()->name;
        $this->permintaan['permintaanAdopsi'] = TransaksiAdopsi::where('TA_nama_owner_post',$namaAnda)->whereIn('TA_konfirmasi',['belum_dikonfirmasi'])->get();
        return view('frontend.profile.user.adopsi-permintaan',$this->permintaan);
    }

    public function viewKonfirmasiAdopsi($id){
        $konfirmasiPermintaan = TransaksiAdopsi::find($id);
        return view('frontend.profile.user.adopsi-konfirmasi',compact('konfirmasiPermintaan'));
    }

    
    // Pengajuan anda
    public function viewPengajuanAdopsi() {
        $namaAnda = Auth::user()->name;
        $this->data['statusPengajuan'] = TransaksiAdopsi::where('TA_nama_pengaju',$namaAnda)->get();
        return view('frontend.profile.user.adopsi-pengajuan-anda',$this->data);
    }

    
    public function TerimaAdopsi($id,Request $request){
      
        $laporan = $request->all();
        $laporan['LTA_nama_post'] = TransaksiAdopsi::where('id',$id)->value('TA_nama_post');
        $laporan['LTA_nama_owner_post'] = TransaksiAdopsi::where('id',$id)->value('TA_nama_owner_post');
        $laporan['LTA_nama_pengaju'] = TransaksiAdopsi::where('id',$id)->value('TA_nama_pengaju');
        $laporan['LTA_jenis_hewan'] = TransaksiAdopsi::where('id',$id)->value('TA_jenis_hewan');
        $laporan['LTA_ras_hewan'] = TransaksiAdopsi::where('id',$id)->value('TA_ras_hewan');
        $laporan['LTA_type_post'] = 'adopsi';
        $laporan['LTA_alamat_pengaju'] = TransaksiAdopsi::where('id',$id)->value('TA_alamat_pengaju');
        $laporan['LTA_contact_pengaju'] = TransaksiAdopsi::where('id',$id)->value('TA_contact_pengaju');
        $laporan['LTA_alasan_memilih'] = TransaksiAdopsi::where('id',$id)->value('TA_alasan_memilih');
        $laporan['post_id'] = TransaksiAdopsi::where('id',$id)->value('TA_nama_post_id');
        $laporan['LTA_konfirmasi'] = 'diterima';

        // dd($laporan);
        LaporanAdopsi::create($laporan);

        DB::table('transaksi_adopsi')->where('id',$id)->update([
            'TA_konfirmasi' => 'diterima'
        ]);
        // DB::table('laporan_transaksi_adopsi')->where('id',$id)->insert([
        //     'LTA_konfirmasi' => 'diterima'
        // ]);
        
        return redirect()->route('profile.permintaanAdopsi')->with('success','Anda telah memberi konfirmasi. Tunggu follow up kedepannya.');

    }

    // Detail pengjuan anda
    public function detailPengajuanAnda($id) {
        $detailPengajuan = TransaksiAdopsi::find($id);
        return view('frontend.profile.user.adopsi-detail-pengajuan-anda',compact('detailPengajuan'));
    }

    public function deletePermintaanAdopsi($id,Request $request) {

        $namaAnda = Auth::user()->name;
        $this->permintaan['permintaanAdopsi'] = TransaksiAdopsi::where('TA_nama_owner_post',$namaAnda)->whereIn('TA_konfirmasi',['belum_dikonfirmasi'])->get();
  

        $laporan = $request->all();
        $laporan['LTA_nama_post'] = TransaksiAdopsi::where('id',$id)->value('TA_nama_post');
        $laporan['LTA_nama_owner_post'] = TransaksiAdopsi::where('id',$id)->value('TA_nama_owner_post');
        $laporan['LTA_nama_pengaju'] = TransaksiAdopsi::where('id',$id)->value('TA_nama_pengaju');
        $laporan['LTA_jenis_hewan'] = TransaksiAdopsi::where('id',$id)->value('TA_jenis_hewan');
        $laporan['LTA_ras_hewan'] = TransaksiAdopsi::where('id',$id)->value('TA_ras_hewan');
        $laporan['LTA_type_post'] = 'adopsi';
        $laporan['LTA_alamat_pengaju'] = TransaksiAdopsi::where('id',$id)->value('TA_alamat_pengaju');
        $laporan['LTA_contact_pengaju'] = TransaksiAdopsi::where('id',$id)->value('TA_contact_pengaju');
        $laporan['LTA_alasan_memilih'] = TransaksiAdopsi::where('id',$id)->value('TA_alasan_memilih');
        $laporan['post_id'] = TransaksiAdopsi::where('id',$id)->value('TA_nama_post_id');
        $laporan['LTA_konfirmasi'] = 'ditolak';

        DB::table('transaksi_adopsi')->where('id',$id)->update([
            'TA_konfirmasi' => 'ditolak'
        ]);
        
        LaporanAdopsi::create($laporan);

       
        return redirect()->route('profile.permintaanAdopsi',$this->permintaan)->with('alert','Data telah dihapus');
    }




    //  <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<....................... Pemacakannn ...............>>>>>>>>>>>>>>>>>>>>>>>>>>>
    //  <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<....................... Pemacakannn ...............>>>>>>>>>>>>>>>>>>>>>>>>>>>
    //  <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<....................... Pemacakannn ...............>>>>>>>>>>>>>>>>>>>>>>>>>>>
    //  <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<....................... Pemacakannn ...............>>>>>>>>>>>>>>>>>>>>>>>>>>>


    public function showPemacakan(){
        // untuk lihat detail pemacakan milik anda
        $idUser = Auth::user()->id;
        $this->data['pemacakan'] = Pemacakan::where('owner-pemacakan_id',$idUser)->get();
        return view('frontend.profile.user.pemacakan-management',$this->data);
    }


    public function permintaanPemacakan(){
        $namaAnda = Auth::user()->name;
        $this->permintaan['permintaanPemacakan'] = TransaksiPemacakan::where('TM_nama_owner_post',$namaAnda)->whereIn('TM_konfirmasi',['belum_dikonfirmasi'])->get();
        return view('frontend.profile.user.pemacakan-permintaan', $this->permintaan);
    }

    public function viewKonfirmasiPemacakan($id){
        $konfirmasiPermintaan = TransaksiPemacakan::find($id);
        return view('frontend.profile.user.pemacakan-konfirmasi',compact('konfirmasiPermintaan'));
    }

     // Pengajuan anda
     public function viewPengajuanPemacakan() {
        $namaAnda = Auth::user()->name;
        $this->data['statusPengajuan'] = TransaksiPemacakan::where('TM_nama_pengaju',$namaAnda)->get();
        
        return view('frontend.profile.user.pemacakan-pengajuan-anda',$this->data);
    }
    
    // Ketika di klik terima 

    public function TerimaPemacakan($id,Request $request){

        $laporan = $request->all();

        $laporan['LTP_nama_post'] = TransaksiPemacakan::where('id',$id)->value('TM_nama_post');
        $laporan['LTP_nama_owner_post'] = TransaksiPemacakan::where('id',$id)->value('TM_nama_owner_post');
        $laporan['LTP_jenis_hewan_post'] = TransaksiPemacakan::where('id',$id)->value('TM_jenis_hewan_post');
        $laporan['LTP_ras_hewan_post'] = TransaksiPemacakan::where('id',$id)->value('TM_ras_hewan_post');
        $laporan['LTP_type_post'] = 'pemacakan';

        $laporan['LTP_nama_pengaju_pemacakan'] = TransaksiPemacakan::where('id',$id)->value('TM_nama_pengaju');
        $laporan['LTP_jenis_hewan_pengaju'] = TransaksiPemacakan::where('id',$id)->value('TM_jenis_hewan_pengaju');
        $laporan['LTP_ras_hewan_pengaju'] = TransaksiPemacakan::where('id',$id)->value('TM_ras_hewan_pengaju');
        $laporan['LTP_alamat_pengaju'] = TransaksiPemacakan::where('id',$id)->value('TM_alamat_pengaju');
        $laporan['LTP_contact_pengaju'] = TransaksiPemacakan::where('id',$id)->value('TM_contact_pengaju');
        $laporan['LTP_alasan_memilih'] = TransaksiPemacakan::where('id',$id)->value('TM_alasan_memilih');
        $laporan['LTP_konfirmasi'] = 'diterima';
        
        $laporan['post_id'] = TransaksiPemacakan::where('id',$id)->value('TM_nama_post_id');
       
        LaporanPemacakan::create($laporan);

        DB::table('transaksi_pemacakan')->where('id',$id)->update([
            'TM_konfirmasi' => 'diterima'
        ]);
        // DB::table('laporan_transaksi_pemacakan')->where('id',$id)->insert([
        //     'LTP_konfirmasi' => 'diterima'
        // ]);
        
        return redirect()->route('profile.permintaanPemacakan')->with('success','Anda telah memberi konfirmasi. Tunggu follow up kedepannya.');

    }

    public function detailPengajuanPemacakanAnda($id) {
        $detailPengajuan = TransaksiPemacakan::find($id);
        return view('frontend.profile.user.Pemacakan-detail-pengajuan-anda',compact('detailPengajuan'));
    }

    public function deletePermintaanPemacakan($id,Request $request) {

        $namaAnda = Auth::user()->name;
        $this->permintaan['permintaanPemacakan'] = TransaksiPemacakan::where('TM_nama_owner_post',$namaAnda)->whereIn('TM_konfirmasi',['belum_dikonfirmasi'])->get();

        $laporan = $request->all();
        $laporan['LTP_nama_post'] = TransaksiPemacakan::where('id',$id)->value('TM_nama_post');
        $laporan['LTP_nama_owner_post'] = TransaksiPemacakan::where('id',$id)->value('TM_nama_owner_post');
        $laporan['LTP_jenis_hewan_post'] = TransaksiPemacakan::where('id',$id)->value('TM_jenis_hewan_post');
        $laporan['LTP_ras_hewan_post'] = TransaksiPemacakan::where('id',$id)->value('TM_ras_hewan_post');

        $laporan['LTP_type_post'] = 'Pemacakan';

        $laporan['LTP_nama_pengaju_pemacakan'] = TransaksiPemacakan::where('id',$id)->value('TM_nama_pengaju');
        $laporan['LTP_jenis_hewan_pengaju'] = TransaksiPemacakan::where('id',$id)->value('TM_jenis_hewan_pengaju');
        $laporan['LTP_ras_hewan_pengaju'] = TransaksiPemacakan::where('id',$id)->value('TM_ras_hewan_pengaju');
        $laporan['LTP_alamat_pengaju'] = TransaksiPemacakan::where('id',$id)->value('TM_alamat_pengaju');
        $laporan['LTP_contact_pengaju'] = TransaksiPemacakan::where('id',$id)->value('TM_contact_pengaju');
        $laporan['LTP_alasan_memilih'] = TransaksiPemacakan::where('id',$id)->value('TM_alasan_memilih');
        $laporan['LTP_konfirmasi'] = 'ditolak';
        $laporan['post_id'] = TransaksiPemacakan::where('id',$id)->value('TM_nama_post_id');
      
      
   
    
        DB::table('transaksi_Pemacakan')->where('id',$id)->update([
            'TM_konfirmasi' => 'ditolak'
        ]);


        LaporanPemacakan::create($laporan);
        
        return redirect()->route('profile.permintaanPemacakan',$this->permintaan)->with('alert','Anda telah menolak salah satu permintaan pemacakan');
    }

    
}
