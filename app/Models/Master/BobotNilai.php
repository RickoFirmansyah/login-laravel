<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BobotNilai extends Model
{
    use HasFactory;
    protected $table = 'ref_bobot_nilai';
    protected $guarded = ['id'];
}
