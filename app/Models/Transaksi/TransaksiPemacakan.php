<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPemacakan extends Model
{
    use HasFactory;

    protected $table = 'transaksi_pemacakan';

    protected $fillable = [
        'TM_nama_post' ,
        'TM_jenis_hewan_post' ,
        'TM_ras_hewan_post' ,
        'TM_nama_post_id' ,
        'TM_nama_owner_post' ,
        'TM_nama_pengaju' ,
        'TM_jenis_hewan_pengaju' ,
        'TM_ras_hewan_pengaju' ,
        'TM_alamat_pengaju' ,
        'TM_contact_pengaju' ,
        'TM_alasan_memilih' ,
        'TM_gambar' ,
        'TM_konfirmasi',
        'jenis_hewan_id',
        'ras_hewan_id'
    ];
}
