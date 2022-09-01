<?php

namespace App\Models\Transaksi;

use App\Models\Product\Adopsi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiAdopsi extends Model
{
    protected $table = 'transaksi_adopsi';

    protected $fillable = [
        'TA_nama_post',
        'TA_nama_post_id',
        'TA_nama_owner_post',
        'TA_nama_pengaju',
        'TA_jenis_hewan',
        'TA_ras_hewan',
        'TA_alamat_pengaju',
        'TA_contact_pengaju',
        'TA_alasan_memilih',
        'TA_konfirmasi'

    ];

    use HasFactory;

    public function PostId(){
        return $this->belongsTo(Adopsi::class);
    }
}
