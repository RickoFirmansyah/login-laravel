<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;
    protected $table = 'year';
    protected $guards = [];

    public function qurban_report() {
        return $this->hasMany(QurbanReport::class, 'year_id', 'id');
    }
}
