<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category\JenisHewan;
use App\Models\Category\RasHewan;
use App\Models\Product\Adopsi;
use App\Models\Product\Pemacakan;
use App\Models\Transaksi\LaporanAdopsi;
use App\Models\Transaksi\TransaksiAdopsi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;


class FrontEndController extends Controller
{
   
    public function index()
    {
        $this->data['getRandomAdopsi'] = Adopsi::get()->random(2);
        // dd($adopsi);
        return view('frontend.hewansiapa',$this->data);
    }

   
    public function search(Request $request) {

        $pencarian = $request->pencarian;
       
        $result = Search::add(Adopsi::class,'nama_jenis_hewan','nama_ras_hewan','lokasi_post_adps')
            ->add(Pemacakan::class,'nama_jenis_hewan','nama_ras_hewan','lokasi_post_pm')
        ->get($pencarian);

        
        return view('frontend.search',compact('result'));
    }
   
}
