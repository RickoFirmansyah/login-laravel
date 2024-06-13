<?php

namespace App\Models;

use App\Models\Master\SlaughteringPlace;
use App\Models\Master\MonitoringOfficer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'monitoring_officer_id',
        'slaughtering_place_id',
        'jumlah_penugasan',
    ];

    public function monitoringOfficers()
    {
        return $this->belongsTo(MonitoringOfficer::class, 'monitoring_officer_id');
    }

    public function slaughteringPlace()
    {
       return $this->belongsTo(SlaughteringPlace::class, 'slaughtering_place_id');
    }
}
