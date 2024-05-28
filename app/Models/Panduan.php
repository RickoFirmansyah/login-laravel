<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panduan extends Model
{
    use HasFactory;

    protected $table = 'panduan_unduhan';
    protected $guards = [];
    // protected $fillable=['user_id','type_of_place_id','cutting_place','address','latitude','longitude','type_of_place_id','kabupaten_id',
    // 'kecamatan_id','created_by','update_by','provinsi_id','keluarahan_id'
    // ];


    // public function user() {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }
    // public function type_of_place()
    // {
    //     return $this->belongsTo(TypeOfPlace::class, 'type_of_place_id', 'id');
    // }
    // public function provinsi()
    // {
    //     return $this->belongsTo(Provinsi::class, 'provinsi_id', 'id');
    // }
    // public function kabupaten()
    // {
    //     return $this->belongsTo(KabupatenKota::class, 'kabupaten_id', 'id');
    // }
    // public function kecamatan()
    // {
    //     return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'id');
    // }
    // public function kelurahan()
    // {
    //     return $this->belongsTo(Kelurahan::class, 'kelurahan_id', 'id');
    // }
}
