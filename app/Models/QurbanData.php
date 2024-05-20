<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QurbanData extends Model
{
    use HasFactory;
    
    protected $table = 'qurban_data';
    protected $guards = [];
    protected $fillable=['gender','weight','disease','price'];


    public function qurban_report() {
        return $this->belongsTo(QurbanReport::class, 'qurban_report_id', 'id');
    }
    public function type_of_qurban()
    {
        return $this->belongsTo(TypeOfQurban::class, 'type_of_qurban_id', 'id');
    }
}
