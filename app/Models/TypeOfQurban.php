<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfQurban extends Model
{
    use HasFactory;

    protected $table = 'type_of_qurbans';
    protected $guards = [];
    protected $fillable=['type_of_animal'];


    public function qurban_data() {
        return $this->hasMany(QurbanData::class, 'type_of_qurban_id', 'id');
    }
}
