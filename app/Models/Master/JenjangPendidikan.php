<?php

namespace App\Models\Master;

use App\Models\Akademik\ProgramStudi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenjangPendidikan extends Model
{
    use HasFactory;
    protected $table = 'ref_jenjang_pendidikan';
    protected $guarded = ['id'];

    public function prodi() {
        return $this->hasMany(ProgramStudi::class, 'jenjang_pendidikan_id', 'id');
    }

}
