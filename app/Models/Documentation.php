<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
{
    use HasFactory;

    protected $table = 'documentations';
    protected $guards = [];
    protected $fillable=['photo','caption'];


    public function qurban_report() {
        return $this->belongsTo(QurbanReport::class, 'qurban_report_id', 'id');
    }
    
}
