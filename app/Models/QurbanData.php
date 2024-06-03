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


    public function qurbanReport() {
        return $this->belongsTo(QurbanReport::class, 'qurban_report_id', 'id');
    }
    public function typeOfQurban()
    {
        return $this->belongsTo(TypeOfQurban::class, 'type_of_qurban_id', 'id');
    }
}
