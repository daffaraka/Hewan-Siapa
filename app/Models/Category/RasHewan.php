<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RasHewan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nama_ras_hewan',
        'jenis_hewan_id',
        'parent_ras_jenis_hewan'
    ];


    public function ParentJenisHewan() {
        return $this->belongsTo(JenisHewan::class,'jenis_hewan_id','id');
    }

    public function PostAdopsi() {
        return $this->hasMany(Adopsi::class,'ras_hewan_id');
    }

    // public static function NamaJenisHewan($request) {
    //     return JenisHewan::where('id',$request->nama_jenis_hewan)->pluck('nama_jenis_hewan');
    // }

}
