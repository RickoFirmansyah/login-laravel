<?php

namespace App\Models\Master;

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
}
