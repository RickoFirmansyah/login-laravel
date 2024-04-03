<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'value',
        'description',
    ];

    public function siteIdentity(): Builder
    {
        return $this->where('type', 'site-identity');
    }

    public function hero(): Builder
    {
        return $this->where('type', 'hero');
    }

    public function profile(): Builder
    {
        return $this->where('type', 'profile');
    }
}
