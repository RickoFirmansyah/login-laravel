<?php

namespace App\Models\Master;

use App\Models\Rpl\Register;
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

    public function register(){
        return $this->hasMany(Register::class, 'provinsi_id', 'id');
    }
}
