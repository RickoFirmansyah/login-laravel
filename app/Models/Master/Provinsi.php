<?php

namespace App\Models\Master;

use App\Models\Rpl\Register;
use App\Models\SlaughteringPlace;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    protected $table = 'ref_provinsi';
    protected $guarded = ['id'];

    public function kabKota() {
        return $this->hasMany(KabupatenKota::class, 'provinsi_id', 'id');
    }

    public function slaughtering_place(){
        return $this->hasMany(SlaughteringPlace::class, 'provinsi_id', 'id');
    }
}
