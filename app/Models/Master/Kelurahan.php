<?php

namespace App\Models\Master;

use App\Models\Master\Kecamatan;
use App\Models\SlaughteringPlace;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelurahan extends Model
{
    use HasFactory;
    protected $table = 'ref_kelurahan';
    protected $guarded = ['id'];

    public function kabKota()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'id');
    }
    public function slaughtering_place(){
        return $this->hasMany(SlaughteringPlace::class, 'kelurahan', 'id');
    }
}
