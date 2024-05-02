<?php

namespace App\Models;

use App\Models\Master\KabupatenKota;
use App\Models\Master\Kecamatan;
use App\Models\Master\Kelurahan;
use App\Models\Master\Provinsi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlaughteringPlace extends Model
{
    use HasFactory;

    protected $table = 'slaughtering_places';
    protected $guards = [];
    protected $fillable=['cutting_place','address','latitude','longtitude'];


    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function type_of_place()
    {
        return $this->belongsTo(TypeOfPlace::class, 'type_of_place_id', 'id');
    }
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id', 'id');
    }
    public function kabupaten()
    {
        return $this->belongsTo(KabupatenKota::class, 'kabupaten_id', 'id');
    }
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'id');
    }
    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id', 'id');
    }
}
