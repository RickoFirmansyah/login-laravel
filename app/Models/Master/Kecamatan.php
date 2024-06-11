<?php

namespace App\Models\Master;

use App\Models\SlaughteringPlace;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'ref_kecamatan';
    protected $guarded = ['id'];

    public function kabKota()
    {
        return $this->belongsTo(KabupatenKota::class, 'kabupaten_kota_id', 'id');
    }

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class, 'kecamatan_id', 'id');
    }

    public function slaughtering_place(){
        return $this->hasMany(SlaughteringPlace::class, 'kecamatan_id', 'id');
    }
}
