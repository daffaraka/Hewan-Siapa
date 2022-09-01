<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Models\Category\JenisHewan;
use App\Models\Category\RasHewan;
use App\Models\Product\Adopsi;
use App\Models\Transaksi\LaporanAdopsi;
use App\Models\Transaksi\TransaksiAdopsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class ManajemenAdopsiController extends Controller
{
   

    public function index()
    {
        $this->data['getRandomAdopsi'] = Adopsi::get()->random(3);
 
        return view('frontend.hewansiapa',$this->data);
    }

    public function listAdopsi() {
        
        $this->data['listAdopsi'] = Adopsi::get()->random()->paginate(9);
        $this->data['listJenisHewan'] = JenisHewan::orderBy('nama_jenis_hewan','ASC')->get();
    
        return view('frontend.adopsi.front-end-list-adopsi',  $this->data);
    }

 
    public function create()
    {
        $this->data['jenisHewan'] =JenisHewan::orderBy('nama_jenis_hewan','ASC')->get();
        $this->data['rasHewan'] = RasHewan::get();
        
        return view('frontend.adopsi.front-end-create-adopsi',$this->data);
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
        // dd($request->all());
        $adopsiAttr = $this->validasiRequest();
        $imageSize = $request->file('image_post_adps')->getSize();
        $imageName = $request->file('image_post_adps')->getClientOriginalName();

        // $request->file('image_post_adps')->storeAs('public/post/adopsi',$imageName);
        $pathstorage = $request->file('image_post_adps')->storeAs('public/post/adopsi',$request->nama_post_adopsi.'-'.$imageName);

        $adopsiAttr = $request->all();
       
        $getParentJenisHewan = JenisHewan::where("id", $request->jenis_hewan_id)->value("nama_jenis_hewan");
        $getParentRasHewan = RasHewan::where("id", $request->ras_hewan_id)->value("nama_ras_hewan");
        $adopsiAttr['nama_jenis_hewan'] =  $getParentJenisHewan;
        $adopsiAttr['nama_ras_hewan'] = $getParentRasHewan;
        $adopsiAttr['jenis_post'] = 'adopsi';
        $adopsiAttr['image_post_adps'] = $imageName;
        $adopsiAttr['path-storage'] = $pathstorage;
        $adopsiAttr['size'] = $imageSize;
        $adopsiAttr['color'] = $request->color;
        $adopsiAttr['size-hewan'] = $request->size_hewan;
        $adopsiAttr['status_adopsi'] = 'aktif';
        $adopsiAttr['owner-adopsi_id'] = Auth::user()->id;
        $adopsiAttr['owner-adopsi-name'] = Auth::user()->name;

        // dd($adopsiAttr);
        $storedPost =  Adopsi::create($adopsiAttr);;
       

       
      if($storedPost)
      {
         return redirect()->route('profile.adopsi')->with('success','Data '.$request->nama_post_adopsi .' telah selesai dibuat.');
      }
    }

    public function edit($id)
    {
        $this->data['jenisHewan'] =JenisHewan::orderBy('nama_jenis_hewan','ASC')->get();
        $this->data['rasHewan'] = JenisHewan::all();
        $this->data['edit'] = Adopsi::find($id);

        return view('frontend.adopsi.front-end-edit-adopsi',$this->data);
    }

   
    public function update(Request $request, $id, Adopsi $adopsi)
    {
        $this->data['edit'] = Adopsi::find($id);
        $this->data['jenisHewan'] =JenisHewan::orderBy('nama_jenis_hewan','ASC')->get();
        $this->data['rasHewan'] = JenisHewan::all();
        
        $imageSize = $request->file('image_post_adps')->getSize();
        $imageName = $request->file('image_post_adps')->getClientOriginalName();

        $pathstorage = $request->file('image_post_adps')->storeAs('public/post/adopsi',$request->nama_post_adopsi.'-'.$imageName);

        $adopsiAttr =[];
        $getParentJenisHewan = JenisHewan::where("id", $request->jenis_hewan_id)->value("nama_jenis_hewan");
        $getParentRasHewan = RasHewan::where("id", $request->ras_hewan_id)->value("nama_ras_hewan");
        $adopsiAttr['nama_post_adopsi'] = $request->nama_post_adopsi;
        $adopsiAttr['nama_jenis_hewan'] =  $getParentJenisHewan;
        $adopsiAttr['nama_ras_hewan'] = $getParentRasHewan;
        $adopsiAttr['jenis_post'] = 'adopsi';
        $adopsiAttr['image_post_adps'] = $imageName;
        $adopsiAttr['path-storage'] = $pathstorage;
        $adopsiAttr['size-file'] = $imageSize;
        $adopsiAttr['status_adopsi'] = 'aktif';
        $adopsiAttr['owner-adopsi_id'] = Auth::user()->id;
        $adopsiAttr['owner_adopsi_name'] = Auth::user()->name;
        $adopsiAttr['kontak_adopsi'] = $request->kontak_adopsi;
       

        $updateAttr = Adopsi::where("id",$id)->update($adopsiAttr);

        if($updateAttr) {
            return redirect()->route('profile.adopsi')->with('success', 'Data '.$request->nama_post_adopsi.' telah di update');
        }
    }

  
    public function show($id)
    {

        $detailAdopsi = Adopsi::find($id);
        return view('frontend.adopsi.front-end-show-adopsi',compact('detailAdopsi'));
       
    }

    public function form_pengajuan_adopsi($id) {

        if(Auth::user()) {
            $this->data['adopsi'] = Adopsi::find($id);
            return view('frontend.adopsi.front-end-pengajuan-adopsi-anda',$this->data);
        } else {
            return redirect()->route('login')->with('alert','Anda harus Login terlebih dahulu');
        }
       
    }

    public function ajukan_adopsi($id,Request $request){
        
      
        $pengajuanAttr = $request->all();
        $pengajuanAttr['TA_nama_post'] = Adopsi::where('id',$id)->value('nama_post_adopsi');
        $pengajuanAttr['TA_nama_owner_post'] = Adopsi::where('id',$id)->value('owner_adopsi_name');
        $pengajuanAttr['TA_nama_pengaju'] =  Auth::user()->name;
        $pengajuanAttr['TA_jenis_hewan'] = Adopsi::where('id',$id)->value('nama_jenis_hewan');
        $pengajuanAttr['TA_ras_hewan'] = Adopsi::where('id',$id)->value('nama_ras_hewan');
        $pengajuanAttr['TA_nama_post_id'] = Adopsi::where('id',$id)->value('id');
        $pengajuanAttr['TA_konfirmasi'] = 'belum_dikonfirmasi';

        $savePengajuan = TransaksiAdopsi::create($pengajuanAttr);

        $detailAdopsi = Adopsi::find($id);
        if($savePengajuan){
            return redirect()->route('hewan-siapa.showAdopsi',$detailAdopsi->id)->with('success','Data permintaan pengajuan anda telah dikirim.
                                                                                                                                  Mohon menunggu konfirmasi');
        } else {
            return redirect()->route('hewan-siapa.showAdopsi')->with('error','Terdapat kesalahan',compact('detailAdopsi'));
        }
    }
    
  
   
    public function destroy($id)
    {
        $adopsi = Adopsi::find($id);
        Storage::disk('public')->delete('post/adopsi/'.$adopsi->nama_post_adopsi.'-'.$adopsi->image_post_adps);
        Adopsi::where('id',$adopsi->id)->delete();

        if($adopsi) {
            return redirect()->route('profile.adopsi')->with('success','Data telah dihapus');
        } else {
            return redirect()->route('profile.adopsi')->with('error','Data gagal dihapus');

        }
    }

    public function searchAdopsi(Request $request) {
        $this->data['listAdopsi'] = Adopsi::get()->random()->paginate(9);
        $this->data['listJenisHewan'] = JenisHewan::orderBy('nama_jenis_hewan','ASC')->get();

        $pencarian = $request->pencarian;
       
        $result = Search::add(Adopsi::class,'nama_jenis_hewan','nama_ras_hewan','lokasi_post_adps')
                         ->get($pencarian);

        
        return view('frontend.adopsi.front-end-search-adopsi',compact('result'),$this->data);
    }

    public function validasiRequest() {
        return request()->validate([
        'nama_post_adopsi'      => 'required|string|min:3',
        'owner-adopsi_name'     => 'string',
        'owner-adopsi_id'       => 'integer',
        'deskripsi_post_adps'   => 'required|string',
        'lokasi_post_adps'      => 'required|string',
        'syarat_adopsi'         => 'required|string',
        'path-storage'          => 'string',
        'image_post_adps'       => 'mimes:jpg,svg,jpeg,png|max:4096',
        'nama_jenis_hewan'      => 'string',
        'nama_ras_hewan'        => 'string'
        ],[
        'nama_post_adopsi.required' => 'Judul tidak boleh kosong',
        'deskripsi_post_adps.required' => 'Deskripsikan post anda! Deskripsi tidak boleh kosong',
        'lokasi_post_adps.required' => 'Tentukan lokasi post anda',
        'syarat_adopsi.required' => 'Syarat tidak boleh kosong',
        ]);
    }
   
}
