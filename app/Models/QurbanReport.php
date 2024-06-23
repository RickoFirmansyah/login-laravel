<?php

namespace App\Models;

use App\Models\QurbanData;
use App\Models\Master\Year;
use App\Models\Documentation;
use App\Models\MonitoringOfficer;
use App\Models\SlaughteringPlace;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QurbanReport extends Model
{
    use HasFactory;

    protected $table = 'qurban_reports';
    protected $guards = [];
    protected $fillable = [
        'monitoring_officer_id',
        'slaughtering_place_id',
        'year_id',
        'date',
        'created_by',
        'update_by'
    ];


    public function year() {
        return $this->belongsTo(Year::class, 'year_id', 'id');
    }
    public function monitoring_officer() {
        return $this->belongsTo(MonitoringOfficer::class, 'monitoring_officer_id', 'id');
    }
    public function slaughteringPlace() {
        return $this->belongsTo(SlaughteringPlace::class, 'slaughtering_place_id', 'id');
    }
    public function qurbanData()
    {
        return $this->hasMany(QurbanData::class, 'qurban_report_id', 'id');
    }
    public function documentation()
    {
        return $this->hasMany(Documentation::class, 'qurban_report_id', 'id');
    }
}
