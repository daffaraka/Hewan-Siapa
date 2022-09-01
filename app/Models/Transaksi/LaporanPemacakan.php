<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPemacakan extends Model
{
    use HasFactory;
    protected $table = 'laporan_transaksi_pemacakan';
    protected $fillable = [

        'LTP_nama_post',
        'LTP_nama_owner_post',
        'LTP_jenis_hewan_post',
        'LTP_ras_hewan_post',
        'LTP_type_post',
        
        'LTP_nama_pengaju_pemacakan',
        'LTP_jenis_hewan_pengaju',
        'LTP_ras_hewan_pengaju',
        'LTP_alamat_pengaju',
        'LTP_contact_pengaju',
        'LTP_gambar_hewan_pengaju',
        'LTP_alasan_memilih',
        'LTP_konfirmasi',
        'post_id',
    ];
}
