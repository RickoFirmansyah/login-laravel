<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QurbanReport extends Model
{
    use HasFactory;

    protected $table = 'qurban_reports';
    protected $guards = [];
    protected $fillable=['date'];


    public function year() {
        return $this->belongsTo(Year::class, 'year_id', 'id');
    }
    public function monitoring_officer() {
        return $this->belongsTo(MonitoringOfficer::class, 'monitoring_officer_id', 'id');
    }
    public function slaughtering_place() {
        return $this->belongsTo(SlaughteringPlace::class, 'slaughtering_place_id', 'id');
    }
    public function qurban_data()
    {
        return $this->hasMany(QurbanData::class, 'qurban_report_id', 'id');
    }
    public function documentation()
    {
        return $this->hasMany(Documentation::class, 'qurban_report_id', 'id');
    }
}
