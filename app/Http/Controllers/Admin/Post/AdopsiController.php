<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category\JenisHewan;
use App\Models\Category\RasHewan;
use App\Models\Product\Adopsi;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class AdopsiController extends Controller
{
 
    public function index()
    {
        $this->data['adopsi'] = Adopsi::paginate(10);
        // return dd($this->data['adopsi']);
        
        // return dd( $this->data);
        return view('admin.dashboard.adopsi.index-adopsi', $this->data);
    }

  
    public function create()
    {
        $this->data['jenisHewan'] =JenisHewan::orderBy('nama_jenis_hewan','ASC')->get();
        $this->data['rasHewan'] = JenisHewan::all();
        
        return view('admin.dashboard.adopsi.create-adopsi',$this->data);
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
        $adopsiAttr['owner-adopsi_id'] = Auth::user()->id;
        $adopsiAttr['owner-adopsi_name'] = Auth::user()->name;

        $storedPost =  Adopsi::create($adopsiAttr);;
        return dd($adopsiAttr);

       
      if($storedPost)
      {
         return redirect()->route('adopsi.index')->with('success','Data '.$request->nama_post_adopsi .' telah selesai dibuat.');
      }
    }

  
    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $adopsi = Adopsi::find($id);
        $jenisHewan = JenisHewan::orderBy('nama_jenis_hewan','ASC')->get();
        $rasHewan = JenisHewan::all();

        return view('admin.dashboard.adopsi.edit-adopsi',
        [
            
            'adopsi'=>$adopsi,
            'jenisHewan'=>$jenisHewan,
            'rasHewan'=>$rasHewan
        ]);
    }

    public function update(Request $request, Adopsi $adopsi, $id)
    {
        $getParentJenisHewan = JenisHewan::where("id", $request->jenis_hewan_id)->value("nama_jenis_hewan");
        $getParentRasHewan = RasHewan::where("id", $request->ras_hewan_id)->value("nama_ras_hewan");

        $imageSize = $request->file('image_post_adps')->getSize();
        $imageName = $request->file('image_post_adps')->getClientOriginalName();
        $pathstorage = $request->file('image_post_adps')->storeAs('public/post/adopsi',$request->nama_post_adopsi.'-'.$imageName);
       
        $adopsiAttr = $this->validasiRequest();
       
        $adopsiAttr = $request->all();
        $adopsiAttr['nama_jenis_hewan'] =  $getParentJenisHewan;
        $adopsiAttr['nama_ras_hewan'] = $getParentRasHewan;
        $adopsiAttr['image_post_adps'] = $imageName;
        $adopsiAttr['path-storage'] = $pathstorage;
        $adopsiAttr['size'] = $imageSize;
        $adopsiAttr['owner-adopsi_id'] = Auth::user()->name;
        
        $delete = Adopsi::find($id);
     

        if ($request->file('image_post_adps')) {
            Storage::disk('public')->delete('/post/adopsi/'.$delete->nama_post_adopsi.'-'.$delete->image_post_adps);
        }

        $adopsi = Adopsi::find($id)->update($adopsiAttr);

        return dd($adopsi);
        // if ($request->file('image_post_adps')) {
        //     Storage::disk('public')->delete('/post/adopsi/'.$request->nama_post_adopsi.'-'.$request->image_post_adps);
        // }

        // // $adopsi->save($adopsiAttr);
        // return dd($adopsiAttr);
        // return dd($adopsiAttr);
      
      

        if($adopsi) {
            return redirect()->route('adopsi.index')->with('success','Data '.$request->nama_post_adopsi .' telah mendapatkan update terbaru.');
        } else {
            return redirect()->route('adopsi.index')->with('error','Data gagal'.$request->nama_post_adopsi .'diupdate');

        }

    }

    
   
    public function delete($id, Adopsi $adopsi)
    {   
      
        $adopsi = Adopsi::find($id);
        Storage::disk('public')->delete('post/adopsi/'.$adopsi->nama_post_adopsi.'-'.$adopsi->image_post_adps);
        Adopsi::where('id',$adopsi->id)->delete();

        if($adopsi) {
            return redirect()->route('adopsi.index')->with('success','Data telah dihapus');
        } else {
            return redirect()->route('adopsi.index')->with('error','Data gagal dihapus');

        }
    }

    public function pencarianDataAdopsi(Request $request) {
        $kataKunci = $request->pencarian;
        $hasilPencarian = Adopsi::where('nama_post_adopsi','LIKE', '%'.$kataKunci.'%')
                                    ->orWhere('jenis_post','LIKE', '%'.$kataKunci.'%')
                                    ->orWhere('deskripsi_post_adps','LIKE', '%'.$kataKunci.'%')
                                    ->orWhere('lokasi_post_adps','LIKE', '%'.$kataKunci.'%')
                                    ->orWhere('syarat_adopsi','LIKE', '%'.$kataKunci.'%')
                                    ->orWhere('status_adopsi','LIKE', '%'.$kataKunci.'%')
                                    ->orWhere('nama_jenis_hewan','LIKE', '%'.$kataKunci.'%')
                                    ->orWhere('nama_ras_hewan','LIKE', '%'.$kataKunci.'%')
                                    ->with('ParentJenisHewan','ParentRasHewan')
                                    ->get();

        // return dd($hasilPencarian);

        return view('admin.dashboard.adopsi.hasil-pencarian', compact('hasilPencarian'));
    }

    public function validasiRequest() {
        return request()->validate([
        'nama_post_adopsi'      => 'required|string|min:3',
        'deskripsi_post_adps'   => 'required|string',
        'lokasi_post_adps'      => 'required|string',
        'syarat_adopsi'         => 'required|string',
        'status_adopsi'         => 'required|string',
        'path-storage'          => 'string',
        'image_post_adps'       => 'mimes:jpg,svg,jpeg,png|max:4096',
        'nama_jenis_hewan'      => 'string',
        'nama_ras_hewan'        => 'string'
        ],[
        'nama_post_adopsi.required' => 'Judul tidak boleh kosong',
        'deskripsi_post_adps.required' => 'Deskripsikan post anda! Deskripsi tidak boleh kosong',
        'lokasi_post_adps.required' => 'Tentukan lokasi post anda',
        'syarat_adopsi.required' => 'Syarat tidak boleh kosong',
        'status_adopsi.required' => 'Tentukan status adopsi',
        ]);
    }

}
