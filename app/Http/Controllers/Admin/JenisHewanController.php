<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category\JenisHewan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Symfony\Component\HttpFoundation\Session\Session;


class JenisHewanController extends Controller
{
    
    use HasRoles;

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
        $dataJenisHewan = JenisHewan::paginate(10);
        return view('admin.jenis-hewan.jenis-hewan-index', ['data'=>$dataJenisHewan]);
    }


    public function create()
    {
        return view('admin.jenis-hewan.create-jenis-hewan');
    }

   
    public function store(Request $request)
    {
        $validator = $request->validate([
            'nama_jenis_hewan' =>'required|string|min:3',
        ]);

        JenisHewan::create($validator);

        if(validator()) {
            return redirect()->route('jenishewan.create')
                             ->with('success', 'Data '.$request->nama_jenis_hewan.' telah selesai dibuat.');
        } else {
            return redirect()->route('jenishewan.create')->with('error','Data gagal dibuat');
        }
    }



    public function edit($id)
    {
       $data = JenisHewan::find($id);
       return view('admin.jenis-hewan.edit-jenis-hewan', ['data' => $data]);
    }

   
    public function update(Request $request, $id)
    {
        $updateJenisHewan = JenisHewan::where("id",$id)->update($request->except("_token", "_method"));
        if($updateJenisHewan) {
            return redirect()->route('jenishewan.index')
                             ->with('success', 'Data telah diubah .');
        } else {
            return redirect()->route('jenishewan.edit')->with('error','Data gagal dibuat');
        }
    }

   
    public function delete($id)
    {
        $data = JenisHewan::find($id);
        $data->delete();
        if($data->delete($id)) {
            return redirect()->route('jenishewan.index')->with('success','Data telah dihapus');
        } else {
            return redirect()->route('jenishewan.index')->with('success','Data berhasil dihapus');

        }
    }
}
