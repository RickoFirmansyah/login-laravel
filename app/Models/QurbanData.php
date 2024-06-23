<?php

namespace App\Models;

use App\Models\QurbanReport;
use App\Models\Master\TypeOfQurban;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QurbanData extends Model
{
    use HasFactory;
    
    protected $table = 'qurban_data';
    protected $guards = [];
    protected $fillable=['qurban_report_id','type_of_qurban_id','gender','weight','disease','price','created_by','update_by'];


    public function qurbanReport() {
        return $this->belongsTo(QurbanReport::class, 'qurban_report_id', 'id');
    }
    public function typeOfQurban()
    {
        return $this->belongsTo(TypeOfQurban::class, 'type_of_qurban_id', 'id');
    }
}
