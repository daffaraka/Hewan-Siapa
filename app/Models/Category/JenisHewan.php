<?php

namespace App\Models\Category;

use App\Http\Controllers\Post\AdopsiController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category\RasHewan;
use App\Models\Product\Adopsi;

class JenisHewan extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nama_jenis_hewan',
        'parent_id',
    ];

    public function ChildrenRasHewan() {
        return $this->hasMany(RasHewan::class,'jenis_hewan_id');
    }

    public function PostAdopsi() {
        return $this->hasMany(Adopsi::class,'jenis_hewan_id');
    }
}
