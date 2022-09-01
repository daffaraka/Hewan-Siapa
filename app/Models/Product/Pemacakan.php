<?php

namespace App\Models\Product;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Search;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;


class Pemacakan extends Model
{
    use HasFactory;

    protected $table = 'post_pemacakan';

    protected $fillable = [
        'nama_post_pemacakan',
        'owner_pemacakan_name',
        'owner-pemacakan_id',
        'nama_jenis_hewan',
        'jenis_hewan_id',
        'nama_ras_hewan', 
        'ras_hewan_id',
        'jenis_post',
        'deskripsi_post_pm',
        'lokasi_post_pm',
        'syarat_pemacakan',
        'image_post_pm',
        'status_pm',
        'user_id',
        'path-storage',
        'color',
        'size-file',
        'size-hewan',
        'umur-hewan-pm',
        'kontak_pemacakan'
    ];

    public static function warnaHewan() {
        return [
            'hitam' => 'Hitam',
            'putih' => 'Putih',
            'coklat' => 'Coklat',
            'orange' => 'Orange'
        ];
    }

    public static function sizeHewan() {
        return [
            'kecil' => 'Kecil',
            'sedang' => 'Sedang',
            'Besar' => 'Besar',
        ];
    }

    public static function umurHewan() {
        return [
            'kitten' => 'Kitten',
            'dewasa' => 'Dewasa'
        ];
    }

    public function JenisHewan() {
        return $this->belongsTo(JenisHewan::class,'jenis_hewan_id','id');
    }
    public function ParentRasHewan() {
        return $this->belongsTo(RasHewan::class,'ras_hewan_id','id');
    }

    public function User() {
        $this->belongsTo(User::class);
    }

   
}
