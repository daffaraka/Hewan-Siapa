<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanAdopsi extends Model
{
    use HasFactory;

    protected $table = 'laporan_transaksi_adopsi';
    protected $fillable = [
        'LTA_nama_post',
        'LTA_nama_owner_post',
        'LTA_nama_pengaju',
        'LTA_jenis_hewan',
        'LTA_ras_hewan',
        'LTA_type_post',
        'LTA_alamat_pengaju',
        'LTA_contact_pengaju',
        'LTA_alasan_memilih',
        'LTA_konfirmasi',
        'post_id'
    ];
}
