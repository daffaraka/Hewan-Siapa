<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category\RasHewan;
use App\Models\Category\JenisHewan;
use Illuminate\Support\Facades\Auth;

class RasHewanController extends Controller
{
   
    public function __construct()
    {
        $this->middleware(['role:admin|super admin']);
        if(Auth::guard('web')){
            return redirect()->route('dashboard.admin');
        } else {
            return redirect()->route('login');
        }
    }

    public function index()
    {
       
        $this->data['jenisHewan'] = JenisHewan::orderBy('nama_jenis_hewan','ASC')->get();
        $this->data['RasHewan'] = RasHewan::paginate(5);
        $this->data['sortDataByName'] = RasHewan::latest('nama_ras_hewan');

        return view('admin.rashewan.ras-hewan-index',$this->data);
    }


      
    public function store(Request $request,JenisHewan $id)
    {   

        $getParentOption = JenisHewan::where("id", $request->jenis_hewan_id)->value("nama_jenis_hewan");
        

        $request->validate([
            'nama_ras_hewan'        => 'required|string|min:3',
            'jenis_hewan_id'        => 'required|string|',
        ], [
            'nama_ras_hewan.required' => 'Ras Hewan tidak boleh kosong',
            ]
        );

        $rasHewans = new RasHewan();
        
        $rasHewans->nama_ras_hewan = $request->nama_ras_hewan;
        $rasHewans->jenis_hewan_id = $request->jenis_hewan_id;
        $rasHewans->parent_ras_jenis_hewan = $getParentOption;

        $rasHewans->save();
        $savedRasHewan =  $rasHewans->save();
        // return dd($rasHewans);

        if($savedRasHewan) {
            return redirect()->route('rashewan.index')
                             ->with('success', 'Data ras hewan '.$request->nama_ras_hewan .' dari hewan berjenis '.$getParentOption. '  telah selesai dibuat.');
        } else {
            return redirect()->route('rashewan.index')->with('error','Data gagal dibuat');
        }
    }

 
    public function edit($id)
    {
        $rasHewan = RasHewan::find($id);
        return view('admin.rashewan.edit-ras-hewan',['rasHewan' => $rasHewan]);
    }

  
    public function update(Request $request, $id)
    {
        $updateRasHewan = RasHewan::where("id",$id)->update($request->except("_token", "_method"));
        if($updateRasHewan) {
            return redirect()->route('rashewan.index')
                             ->with('success', 'Data telah diubah .');
        } else {
            return redirect()->route('rashewan.edit')->with('error','Data gagal dibuat');
        }
    }


    public function pencarianDataRasHewan(Request $request) {
        $kataKunci = $request->pencarian;
        $this->data['jenisHewan'] = JenisHewan::where('parent_id',0)->get();
        $hasilpencarian = RasHewan::where('nama_ras_hewan','LIKE', '%'.$kataKunci.'%')
                                    ->orWhere('parent_ras_jenis_hewan','LIKE', '%'.$kataKunci.'%')
                                    ->with('ParentJenisHewan')->get();

        return view('admin.rashewan.ras-hewan-index',$this->data,)->with(compact('hasilpencarian'));
    }
  
    public function delete($id)
    {
        $data = RasHewan::where('id',$id)->delete();
        if($data) {
            return redirect()->route('rashewan.index')->with('success','Data telah dihapus');
        } else {
            return redirect()->route('rashewan.index')->with('error','Data gagal dihapus');

        }
    }
}
