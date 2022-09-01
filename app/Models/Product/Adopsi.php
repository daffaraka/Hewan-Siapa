<?php

namespace App\Models\Product;

use App\Models\Category\RasHewan;
use App\Models\Category\JenisHewan;
use App\Models\TransaksiAdopsi;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Adopsi extends Model
{
    use HasFactory;

    protected $table = 'post_adopsi';

   

    protected $fillable = [
        'nama_post_adopsi',
        'jenis_post',
        'deskripsi_post_adps',
        'lokasi_post_adps',
        'syarat_adopsi',
        'image_post_adps',
        'status_adopsi',
        'jenis_hewan_id',
        'ras_hewan_id',
        'nama_jenis_hewan',
        'nama_ras_hewan',
        'user_id',
        'path-storage',
        'owner-adopsi_id',
        'owner-adopsi-name',
        // 'color',
        'size-file',
        // 'size-hewan',
        // 'umur-hewan',
        'kontak_adopsi'
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

    public function ParentJenisHewan() {
        return $this->belongsTo(JenisHewan::class,'jenis_hewan_id','id');
    }
    
    public function ParentRasHewan() {
        return $this->belongsTo(RasHewan::class,'ras_hewan_id','id');
    }

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function TransaksiAdopsi(){
        return $this->hasMany(TransaksiAdopsi::class);
    }

   
}
