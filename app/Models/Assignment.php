<?php

namespace App\Models;

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

    public function monitoringOfficer()
    {
        return $this->belongsTo(MonitoringOfficer::class);
    }

    public function slaughteringPlace()
    {
        return $this->belongsTo(SlaughteringPlace::class);
    }
}
