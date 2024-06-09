<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonitoringOfficer extends Model
{
    use HasFactory;
    protected $table = 'monitoring_officers';
    protected $guards = [];
    protected $fillable = ['name', 'gender', 'address', 'phone_number'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function qurban_report()
    {
        return $this->hasMany(QurbanReport::class, 'monitoring_officer_id', 'id');
    }
    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'monitoring_officer_id', 'id');
    }
}
