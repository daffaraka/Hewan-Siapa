<?php

namespace App\Exports;

use App\Models\Transaksi\LaporanPemacakan;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanPemacakanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LaporanPemacakan::all();
    }
}
