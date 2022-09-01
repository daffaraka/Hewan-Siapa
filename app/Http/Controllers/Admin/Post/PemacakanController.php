<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category\JenisHewan;
use App\Models\Category\RasHewan;
use App\Models\Product\Adopsi;
use App\Models\Product\Pemacakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemacakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['pemacakan'] = Pemacakan::paginate(10);

        return view('admin.dashboard.pemacakan.pemacakan-index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $pemacakanAttr['owner-pemacakan-name'] = Auth::user()->name;
        $pemacakanAttr['owner-pemacakan_id'] = Auth::user()->id;

     
        Pemacakan::create($pemacakanAttr);;

        return redirect()->route('pemacakan.index')->with('success', 'Data peamacakan ' .$request->nama_post_pemacakan. ' Telah dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
