<?php

namespace App\Exports;

use App\Models\Transaksi\LaporanAdopsi;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanAdopsiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LaporanAdopsi::all();
    }
}
