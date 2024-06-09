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

    public function monitoringOfficers()
    {
        return $this->belongsTo(MonitoringOfficer::class, 'monitoring_officer_id');
    }
}
