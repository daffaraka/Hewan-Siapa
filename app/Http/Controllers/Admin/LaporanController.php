<?php

namespace App\Http\Controllers\Admin;

use App\Exports\LaporanAdopsiExport;
use App\Exports\LaporanPemacakanExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Exports\UsersExport;
use App\Models\Transaksi\LaporanAdopsi;
use App\Models\Transaksi\LaporanPemacakan;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function laporanAdopsi(){
        $this->data['laporanAdopsi'] = LaporanAdopsi::get();

        return view('admin.dashboard.laporan.laporanAdopsi',$this->data);
    }
    public function laporanPemacakan(){
        $this->data['laporanPemacakan'] = LaporanPemacakan::get();

        return view('admin.dashboard.laporan.laporanPemacakan',$this->data);
    }

    public function exportAdopsi(){
        return Excel::download(new LaporanAdopsiExport, 'laporanAdopsi.xlsx');
    }
    public function exportPemacakan(){
        return Excel::download(new LaporanPemacakanExport, 'laporanPemacakan.xlsx');
    }
}
