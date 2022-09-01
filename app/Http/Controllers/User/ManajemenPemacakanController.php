<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category\JenisHewan;
use App\Models\Category\RasHewan;
use App\Models\Product\Adopsi;
use App\Models\Product\Pemacakan;
use App\Models\Transaksi\LaporanAdopsi;
use App\Models\Transaksi\TransaksiPemacakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class ManajemenPemacakanController extends Controller
{
   
    // public function index()
    // {
    //     $this->data['listJenisHewan'] = JenisHewan::orderBy('nama_jenis_hewan','ASC')->get();
    //     $this->data['pemacakan'] = Pemacakan::get();
    //     return view('frontend.pemacakan.list-pemacakan',$this->data);
    // }

    
    public function listPemacakan() {
        
        $this->data['listPemacakan'] = Pemacakan::get()->random()->paginate(9);
        $this->data['listJenisHewan'] = JenisHewan::orderBy('nama_jenis_hewan','ASC')->get();
        return view('frontend.pemacakan.front-end-list-pemacakan',  $this->data);
    }

    public function showPemacakan(){

        $idUser = Auth::user()->id;
        $this->data['pemacakan'] = Pemacakan::get();
        return view('frontend.profile.user.pemacakan-management', $this->data);
    }


    public function permintaanPemacakan(){

        return view('frontend.profile.user.pemacakan-permintaan');
    }

    public function create() {
        $this->data['jenisHewan'] = JenisHewan::orderBy('nama_jenis_hewan','ASC')->get();
        $this->data['rasHewan'] = RasHewan::get();
        return view('frontend.pemacakan.front-end-create-pemacakan',$this->data);
    }

    public function findRasHewan(Request $request) {
        $findRasHewan = RasHewan::select('nama_ras_hewan','id')->where('jenis_hewan_id',$request->id)
                                ->orderBy('nama_ras_hewan','ASC')->get();
        return response()->json($findRasHewan);
    }

    public function findRasHewanOnEdit(Request $request) {
        $findRasHewan = RasHewan::select('nama_ras_hewan','id')->where('jenis_hewan_id',$request->id)
                                ->orderBy('nama_ras_hewan','ASC')->get();
        return response()->json($findRasHewan);
    }

    
    public function store(Request $request)
    {
        // $pemacakanAttr = $this->validasiRequest();
        $imageSize = $request->file('image_post_pm')->getSize();
        $imageName = $request->file('image_post_pm')->getClientOriginalName();

        // $request->file('image_post_adps')->storeAs('public/post/adopsi',$imageName);
        $pathstorage = $request->file('image_post_pm')->storeAs('public/post/pemacakan',$request->nama_post_pemacakan.'-'.$imageName);

        $pemacakanAttr = $request->all();
        $getParentJenisHewan = JenisHewan::where("id", $request->jenis_hewan_id)->value("nama_jenis_hewan");
        $getParentRasHewan = RasHewan::where("id", $request->ras_hewan_id)->value("nama_ras_hewan");
        $pemacakanAttr['jenis_hewan_id'] = $request->jenis_hewan_id;
        $pemacakanAttr['nama_jenis_hewan'] =  $getParentJenisHewan;
        $pemacakanAttr['nama_ras_hewan'] = $getParentRasHewan;
        $pemacakanAttr['jenis_post'] = 'pemacakan';
        $pemacakanAttr['image_post_pm'] = $imageName;
        $pemacakanAttr['path-storage'] = $pathstorage;
        $pemacakanAttr['size-file'] = $imageSize;
        $pemacakanAttr['status_pm'] = 'aktif';
        $pemacakanAttr['owner_pemacakan_name'] = Auth::user()->name;
        $pemacakanAttr['owner-pemacakan_id'] = Auth::user()->id;
        $pemacakanAttr['kontak_pemacakan'] = $request->kontak_pemacakan;

     
         Pemacakan::create($pemacakanAttr);;
        
         return redirect()->route('profile.pemacakan')->with('success', 'Data peamacakan ' .$request->nama_post_pemacakan. ' Telah dibuat');
    }

    public function edit($id)
    {
        $this->data['jenisHewan'] =JenisHewan::orderBy('nama_jenis_hewan','ASC')->get();
        $this->data['rasHewan'] = JenisHewan::all();
        $this->data['edit'] = Pemacakan::find($id);

        return view('frontend.pemacakan.front-end-edit-pemacakan',$this->data);
    }

    
    public function update(Request $request, $id)
    {
        $imageSize = $request->file('image_post_pm')->getSize();
        $imageName = $request->file('image_post_pm')->getClientOriginalName();

        // $request->file('image_post_adps')->storeAs('public/post/adopsi',$imageName);
        $pathstorage = $request->file('image_post_pm')->storeAs('public/post/pemacakan',$request->nama_post_pemacakan.'-'.$imageName);

        $pemacakanAttr = [];
        $getParentJenisHewan = JenisHewan::where("id", $request->jenis_hewan_id)->value("nama_jenis_hewan");
        $getParentRasHewan = RasHewan::where("id", $request->ras_hewan_id)->value("nama_ras_hewan");
        $pemacakanAttr['nama_post_pemacakan'] = $request->nama_post_pemacakan;
        $pemacakanAttr['jenis_hewan_id'] = $request->jenis_hewan_id;
        $pemacakanAttr['nama_jenis_hewan'] =  $getParentJenisHewan;
        $pemacakanAttr['nama_ras_hewan'] = $getParentRasHewan;
        $pemacakanAttr['jenis_post'] = 'pemacakan';
        $pemacakanAttr['image_post_pm'] = $imageName;
        $pemacakanAttr['path-storage'] = $pathstorage;
        $pemacakanAttr['size-file'] = $imageSize;
        $pemacakanAttr['status_pm'] = 'aktif';
        $pemacakanAttr['owner_pemacakan_name'] = Auth::user()->name;
        $pemacakanAttr['owner-pemacakan_id'] = Auth::user()->id;
        $pemacakanAttr['kontak_pemacakan'] = $request->kontak_pemacakan;
        

        
        $pemacakan = Pemacakan::where("id",$id)->update($pemacakanAttr);

        if($pemacakan) {
            return redirect()->route('profile.pemacakan')->with('success','Data '.$request->nama_post_pemacakan .' telah mendapatkan update terbaru.');
        } else {
            return redirect()->route('profile.pemacakan')->with('error','Data gagal'.$request->nama_post_pemacakan .'diupdate');

        }
    }

    public function form_pengajuan_pemacakan($id) {

        if(Auth::user()) {
            $this->data['jenisHewan'] =JenisHewan::orderBy('nama_jenis_hewan','ASC')->get();
            $this->data['rasHewan'] = RasHewan::get();
            $this->data['pemacakan'] = Pemacakan::find($id);
            return view('frontend.pemacakan.front-end-form-pengajuan-pemacakan',$this->data);
        } else {
            return redirect()->route('login')->with('alert','Anda harus Login terlebih dahulu');
        }
       
    }

    public function ajukan_pemacakan($id,Request $request){
        
        $getUsername = Auth::user()->name;
        $imageName = $request->file('TM_gambar')->getClientOriginalName();
        $path = $request->file('TM_gambar')->storeAs('public/post/pemacakan/pengajuan',$request->TM_nama_pengaju.'-'.$imageName);
        
        $pengajuanAttr = $request->all();
        
        $pengajuanAttr['TM_nama_post'] = Pemacakan::where('id',$id)->value('nama_post_pemacakan');
        $pengajuanAttr['TM_nama_owner_post'] = Pemacakan::where('id',$id)->value('owner_pemacakan_name');
        $pengajuanAttr['TM_nama_pengaju'] =  Auth::user()->name;
       
        $pengajuanAttr['TM_jenis_hewan_post'] = Pemacakan::where('id',$id)->value('nama_jenis_hewan');
        $pengajuanAttr['TM_ras_hewan_post'] = Pemacakan::where('id',$id)->value('nama_ras_hewan');
       
        $pengajuanAttr['TM_jenis_hewan_pengaju'] = JenisHewan::where('id',$request->jenis_hewan_id)->value('nama_jenis_hewan');
        $pengajuanAttr['TM_ras_hewan_pengaju'] = RasHewan::where('id',$request->ras_hewan_id)->value('nama_ras_hewan');
       
        $pengajuanAttr['TM_nama_post_id'] = Pemacakan::where('id',$id)->value('id');
        $pengajuanAttr['TM_konfirmasi'] = 'belum_dikonfirmasi';
        $pengajuanAttr['TM_gambar'] =  $request->TM_nama_pengaju.'-'.$imageName;

        
       
        $savePengajuan = TransaksiPemacakan::create($pengajuanAttr);
        // dd($pengajuanAttr);

        $detailPemacakan = Pemacakan::find($id);
        if($savePengajuan){
            return redirect()->route('hewan-siapa.showPemacakan',$detailPemacakan->id)->with('success','Data permintaan pengajuan anda telah dikirim. Mohon menunggu konfirmasi');
        } else {
            return redirect()->route('hewan-siapa.showPemacakan')->with('error','Terdapat kesalahan',compact('detailPemacakan'));
        }
    }
    
   
    public function show($id)
    {
        $pemacakan = Pemacakan::find($id);

        return view('frontend.pemacakan.front-end-show-pemacakan', compact('pemacakan'));
    }

    
   

   
    public function destroy($id)
    {
        $pemacakan = Pemacakan::find($id);
        Storage::disk('public')->delete('post/pemacakan/'.$pemacakan->nama_post_pemacakan.'-'.$pemacakan->image_post_pemacakan);
        Pemacakan::where('id',$pemacakan->id)->delete();

        if($pemacakan) {
            return redirect()->route('profile.pemacakan')->with('success','Data telah dihapus');
        } else {
            return redirect()->route('profile.pemacakan')->with('error','Data gagal dihapus');

        }
    }

    public function searchPemacakan(Request $request) {
        $this->data['listPemacakan'] = Pemacakan::get()->random()->paginate(9);
        $this->data['listJenisHewan'] = JenisHewan::orderBy('nama_jenis_hewan','ASC')->get();
        $pencarian = $request->pencarian;
        

        $result = Search::add(Pemacakan::class,'nama_jenis_hewan','nama_ras_hewan','lokasi_post_pm')
                         ->get($pencarian);

       
        return view('frontend.pemacakan.front-end-search-pemacakan',compact('result'),$this->data);
    }


    public function validasiRequest() {
        return request()->validate([
        'nama_post_pemacakan'      => 'required|string|min:3',
        'deskripsi_post_pm'      => 'required|string',
        'lokasi_post_pm'         => 'required|string',
        'syarat_pemacakan'            => 'required|string',
        'path-storage'             => 'string',
        'image_post_pm'          => 'mimes:jpg,svg,jpeg,png|max:4096',
        'nama_jenis_hewan'         => 'string',
        'nama_ras_hewan'           => 'string'
        ],[
        'nama_post_pemacakan.required' => 'Judul tidak boleh kosong',
        'deskripsi_post_pm.required' => 'Deskripsikan post anda! Deskripsi tidak boleh kosong',
        'lokasi_post_pm.required' => 'Tentukan lokasi post anda',
        'syarat_pemacakan.required' => 'Syarat tidak boleh kosong',
        ]);
    }
}
